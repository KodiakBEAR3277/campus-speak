const searchInput = document.getElementById("searchInput");
  const filterCategory = document.getElementById("filterCategory");
  const filterStatus = document.getElementById("filterStatus");

  function filterTable() {
    let searchValue = searchInput.value.toLowerCase();
    let categoryValue = filterCategory.value.toLowerCase();
    let statusValue = filterStatus.value.toLowerCase();

    let table = document.getElementById("table22");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
      let cells = rows[i].getElementsByTagName("td");
      if (cells.length > 0) {
        let id = cells[0].textContent.toLowerCase();
        let category = cells[1].textContent.toLowerCase();
        let description = cells[2].textContent.toLowerCase();
        let date = cells[3].textContent.toLowerCase();
        let status = cells[4].textContent.toLowerCase();

        // Match logic
        let matchesSearch =
          id.includes(searchValue) ||
          category.includes(searchValue) ||
          description.includes(searchValue) ||
          date.includes(searchValue) ||
          status.includes(searchValue);

        let matchesCategory = categoryValue === "" || category.includes(categoryValue);
        let matchesStatus = statusValue === "" || status.includes(statusValue);

        if (matchesSearch && matchesCategory && matchesStatus) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }
  }

  searchInput.addEventListener("keyup", filterTable);
  filterCategory.addEventListener("change", filterTable);
  filterStatus.addEventListener("change", filterTable);