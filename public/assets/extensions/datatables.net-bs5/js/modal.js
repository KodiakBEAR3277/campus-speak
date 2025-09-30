document.addEventListener("DOMContentLoaded", () => {
  const complaintModal = document.getElementById("complaintModal");

  complaintModal.addEventListener("show.bs.modal", event => {
    const button = event.relatedTarget; // the clicked button

    // Fill basic fields
    document.getElementById("modal-id").textContent = button.dataset.id;
    document.getElementById("modal-title").textContent = button.dataset.title;
    document.getElementById("modal-category").textContent = button.dataset.category;
    document.getElementById("modal-date").textContent = button.dataset.date;
    document.getElementById("modal-status").textContent = button.dataset.status;
    document.getElementById("modal-urgency").textContent = button.dataset.urgency;
    document.getElementById("modal-description").textContent = button.dataset.description;

    // Admin responses
    const responses = JSON.parse(button.dataset.responses || "[]");
    const responsesContainer = document.getElementById("modal-responses");
    responsesContainer.innerHTML = "";
    responses.forEach(r => {
      responsesContainer.innerHTML += `
        <div class="border p-2 mb-2">
          <strong>${r.from}</strong>
          <p>${r.message}</p>
          <small>${r.time}</small>
        </div>
      `;
    });

    // Status timeline
    const timeline = JSON.parse(button.dataset.timeline || "[]");
    const timelineContainer = document.getElementById("modal-timeline");
    timelineContainer.innerHTML = "";
    timeline.forEach(t => {
      timelineContainer.innerHTML += `
        <li>${t.date ? "✅" : "⭕"} ${t.label} ${t.date ? "– " + t.date : ""}</li>
      `;
    });
  });
});