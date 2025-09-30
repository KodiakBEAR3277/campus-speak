
  // Category Filter
  document.getElementById("filterCategory").addEventListener("change", function () {
    let value = this.value.toLowerCase();
    filterTable(1, value); // Category is column index 1
  });

  // Status Filter
  document.getElementById("filterStatus").addEventListener("change", function () {
    let value = this.value.toLowerCase();
    filterTable(4, value); // Status is column index 4
  });

  function filterTable(columnIndex, filterValue) {
    let table = document.getElementById("table22");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
      let cell = rows[i].getElementsByTagName("td")[columnIndex];
      if (cell) {
        let text = cell.textContent || cell.innerText;
        if (filterValue === "" || text.toLowerCase().includes(filterValue)) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }
  }
