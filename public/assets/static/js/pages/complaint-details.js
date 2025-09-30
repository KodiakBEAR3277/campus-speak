(function() {
    function select(selector) {
        return document.querySelector(selector);
    }

    function updateBadgeClasses(element, urgencyOrStatus, type) {
        if (!element) return;
        var value = String(urgencyOrStatus || '').toLowerCase();
        element.classList.remove('bg-success', 'bg-warning', 'bg-danger', 'bg-secondary');
        if (type === 'urgency') {
            if (value === 'high') element.classList.add('bg-danger');
            else if (value === 'medium') element.classList.add('bg-warning');
            else element.classList.add('bg-success');
        } else if (type === 'status') {
            if (value === 'resolved') element.classList.add('bg-success');
            else if (value === 'in review') element.classList.add('bg-warning');
            else element.classList.add('bg-danger');
        } else {
            element.classList.add('bg-secondary');
        }
    }

    function populateForm(data) {
        select('#editTitle').value = data.title || '';
        select('#editCategory').value = data.category || 'Other';
        select('#editUrgency').value = data.urgency || 'Low';
        select('#editDescription').value = data.description || '';
    }

    function applyEditsToView(data) {
        var titleEl = select('#complaint-title');
        var categoryEl = select('#complaint-category');
        var urgencyEl = select('#complaint-urgency');
        var descriptionEl = select('#complaint-description');

        if (titleEl) titleEl.textContent = data.title;
        if (categoryEl) categoryEl.textContent = data.category;
        if (urgencyEl) {
            urgencyEl.textContent = 'Urgency: ' + data.urgency;
            updateBadgeClasses(urgencyEl, data.urgency, 'urgency');
        }
        if (descriptionEl) descriptionEl.textContent = data.description;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var initial = window.COMPLAINT || {};
        var editBtn = select('#btnEditComplaint');
        var saveBtn = select('#btnSaveComplaint');

        if (editBtn) {
            editBtn.addEventListener('click', function() {
                populateForm(initial);
            });
        }

        if (saveBtn) {
            saveBtn.addEventListener('click', function() {
                var updated = {
                    id: initial.id,
                    title: select('#editTitle').value.trim(),
                    category: select('#editCategory').value,
                    urgency: select('#editUrgency').value,
                    description: select('#editDescription').value.trim(),
                };

                // Optimistic UI update
                applyEditsToView(updated);

                // If you later add an API, replace the below with fetch to save server-side
                try {
                    var modalEl = document.getElementById('editComplaintModal');
                    if (modalEl && window.bootstrap) {
                        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                        modal.hide();
                    }
                } catch (e) {}

                // Keep local state in sync for subsequent edits
                window.COMPLAINT = Object.assign({}, initial, updated);
            });
        }
    });
})();


