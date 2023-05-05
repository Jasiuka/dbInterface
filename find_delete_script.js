document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete-btn");
  // SEARCH FEATURE VARIABLES
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

  const tbodyDarbuotojai = document.querySelector(".table-darbuotojai-data");
  const tbodyPilotai = document.querySelector(".table-pilotai-data");
  const tbodyLektuvai = document.querySelector(".table-lektuvai-data");
  const tbodyOroUostai = document.querySelector(".table-orouostai-data");
  const tbodyBilietai = document.querySelector(".table-bilietai-data");
  const tbodyKeleiviai = document.querySelector(".table-keleiviai-data");
  const tbodySkrydziai = document.querySelector(".table-skrydziai-data");

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
        if (table === "darbuotojai") {
          tbodyDarbuotojai.innerHTML = "";
          data.forEach((dataObject) => {
            const newRow = document.createElement("tr");
            Object.values(dataObject).forEach((element) => {
              const newDataElement = document.createElement("td");
              newDataElement.textContent = element;
              newRow.appendChild(newDataElement);
            });
            const deleteTD = document.createElement("td");
            const deleteBtnHTML = `
            <button class="delete-btn" data-id="${
              Object.values(dataObject)[0]
            }" data-table="${table}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                  </button>
                  `;
            deleteTD.innerHTML = deleteBtnHTML;
            newRow.appendChild(deleteTD);
            tbodyDarbuotojai.appendChild(newRow);
          });
        }

        // Display the search results to the user
        // data.forEach((dataObject) => {
        //   Object.values(dataObject).forEach((element) => {
        //     if (tbodyDarbuotojai.classList.toString().includes(table)) {
        //       const html = `<td>${element}</td>`;
        //       console.log(html);
        //     }
        //   });
        // });
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
      console.log(id);
      console.log(tableName);

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
