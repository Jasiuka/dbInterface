document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete-btn");
  const selectPerziuretiElement = document.querySelector(
    ".select-element-perziureti"
  );
  const paieskosSelectai = document.querySelectorAll(".paieska-select");
  const paieskosBox = document.querySelector(".paieska-box");
  const paieskosInputOptions = document.querySelectorAll(
    ".paieskos-input-option"
  );
  const paieskosInput = document.querySelector(".paieska-input");
  const paieskaBtn = document.querySelector(".paieska-btn");
  let column;

  // SEARCH FUNCTIONALITY

  selectPerziuretiElement.addEventListener("change", (e) => {
    const value = e.target.value;

    if (value !== "none") {
      paieskosBox.classList.remove("hide");
      paieskosSelectai.forEach((selectas) => {
        if (selectas.classList.contains(`paieska-select-${value}`)) {
          selectas.classList.remove("hide");
        } else {
          selectas.classList.add("hide");
        }
      });
    } else {
      paieskosBox.classList.add("hide");
      return;
    }
  });

  paieskosSelectai.forEach((selectas) => {
    selectas.addEventListener("change", () => {
      const selectedOption = selectas.querySelector("option:checked");
      const Input_type = selectedOption.dataset.type;
      paieskosInput.type = Input_type;
      column = selectedOption.value;
    });
  });

  paieskaBtn.addEventListener("click", () => {
    const value = paieskosInput.value;
    const table = selectPerziuretiElement.value;
    const chosenColumn = column;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "paieska_func.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      const data = JSON.parse(xhr.responseText);
      if (data.length > 0) {
        // Display the search results to the user
        data.forEach((row) => {
          console.log(row);
        });
      } else {
        console.log("No results found.");
      }
    };
    xhr.send(
      "criteria=" + value + "&table=" + table + "&column=" + chosenColumn
    );
  });

  // DELETE FUNCTIONALITY
  deleteButtons.forEach((button) =>
    button.addEventListener("click", () => {
      const id = button.getAttribute("data-id");
      const tableName = button.getAttribute("data-table");

      const xhr = new XMLHttpRequest();
      xhr.open("POST", "istrinti.php");
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function () {
        // Refresh the page or update the table with the new data to reflect the deletion
        location.reload();
      };
      xhr.send("id=" + id + "&table=" + tableName);
    })
  );
});
