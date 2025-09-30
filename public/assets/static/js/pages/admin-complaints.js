(function() {
    function q(sel, ctx){ return (ctx||document).querySelector(sel); }
    function qa(sel, ctx){ return Array.prototype.slice.call((ctx||document).querySelectorAll(sel)); }

    function updateBulkButtons() {
        var checked = qa('.row-check:checked');
        q('#bulkAssign').disabled = checked.length === 0;
        q('#bulkResolve').disabled = checked.length === 0;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var selectAll = q('#selectAll');
        if (selectAll) {
            selectAll.addEventListener('change', function() {
                qa('.row-check').forEach(function(cb){ cb.checked = selectAll.checked; });
                updateBulkButtons();
            });
        }
        qa('.row-check').forEach(function(cb){
            cb.addEventListener('change', updateBulkButtons);
        });

        // Respond modal
        var respondModalEl = q('#respondModal');
        var respondModal;
        qa('.btn-respond').forEach(function(btn){
            btn.addEventListener('click', function(){
                if (window.bootstrap) {
                    respondModal = bootstrap.Modal.getOrCreateInstance(respondModalEl);
                    respondModal.show();
                    respondModalEl.setAttribute('data-complaint-id', btn.getAttribute('data-id'));
                }
            });
        });
        var sendBtn = q('#btnSendResponse');
        if (sendBtn) {
            sendBtn.addEventListener('click', function(){
                var id = respondModalEl.getAttribute('data-complaint-id');
                var message = q('#responseText').value.trim();
                var assignee = q('#assignTo').value;
                if (!message) { return; }
                // Mock success: close modal and clear
                if (respondModal) respondModal.hide();
                q('#responseText').value = '';
            });
        }

        // Resolve actions (mock)
        qa('.btn-resolve').forEach(function(btn){
            btn.addEventListener('click', function(){
                var row = btn.closest('tr');
                var badge = q('.badge', row);
                if (badge) { badge.className = 'badge bg-success'; badge.textContent = 'Resolved'; }
            });
        });

        // Filters (mock client-side filter)
        q('#btnFilter') && q('#btnFilter').addEventListener('click', function(){
            var term = (q('#search').value || '').toLowerCase();
            var cat = q('#filterCategory').value;
            var status = q('#filterStatus').value;
            qa('#adminComplaintsTable tbody tr').forEach(function(tr){
                var text = tr.textContent.toLowerCase();
                var okTerm = !term || text.indexOf(term) !== -1;
                var okCat = !cat || text.indexOf(cat.toLowerCase()) !== -1;
                var okStatus = !status || text.indexOf(status.toLowerCase()) !== -1;
                tr.style.display = (okTerm && okCat && okStatus) ? '' : 'none';
            });
        });
    });
})();



