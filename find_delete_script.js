document.addEventListener("DOMContentLoaded", function () {
  // SEARCH FEATURE VARIABLES
  const selectPerziuretiElement = document.querySelector(
    ".select-element-perziureti"
  );

  const activeTable = document.getElementsByTagName("table");
  const paieskosSelectai = document.querySelectorAll(".paieska-select");
  const paieskosBox = document.querySelector(".paieska-box");
  let editMode = false;

  const paieskosInput = document.querySelector(".paieska-input");
  const paieskaBtn = document.querySelector(".paieska-btn");

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

  // SEARCH FUNCIONALITY
  paieskaBtn.addEventListener("click", () => {
    const value = paieskosInput.value.toLowerCase().trim();
    const matchedRows = [];
    tableBody.innerHTML = "";

    // const activeTable = document.getElementsByTagName("table");
    const tableBody = activeTable[0].tBodies[0];
    const rows = [...activeTable[0].rows];
    rows.forEach((row) => {
      Array.from(row.cells).forEach((cell) => {
        if (cell.textContent.toLowerCase().trim().includes(value)) {
          matchedRows.push(row.outerHTML);
        } else {
          return;
        }
      });
    });
    tableBody.innerHTML = matchedRows.join("");
  });

  // DELETE AND EDIT FUNCIONALITY
  activeTable[0].addEventListener("click", (e) => {
    const target = e.target;

    // DELETE
    if (
      target.classList.contains("trash-icon") ||
      target.classList.contains("delete-btn")
    ) {
      const confirmed = window.confirm("Ar tikrai norite ištrinti?");
      if (confirmed) {
        const clickedButton = target.closest("button");
        const id = clickedButton.getAttribute("data-id");
        const tableName = clickedButton.getAttribute("data-table");

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "istrinti.php");
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        xhr.onload = function () {
          // Refresh the page or update the table with the new data to reflect the deletion
          location.reload();
        };
        xhr.send("id=" + id + "&table=" + tableName);
      } else {
        return;
      }
    }

    // EDIT
    if (
      (target.classList.contains("edit-btn") ||
        target.classList.contains("edit-icon")) &&
      !editMode
    ) {
      editMode = true;

      const editableRow = target.closest("tr");
      for (let i = 1; i < Array.from(editableRow.cells).length - 2; i++) {
        const cell = Array.from(editableRow.cells)[i];
        const cellValue = Array.from(editableRow.cells)[i].innerHTML;
        const newInputElement = document.createElement("input");
        newInputElement.value = cellValue;
        cell.innerHTML = "";
        cell.appendChild(newInputElement);
      }
      const button = target.closest("button");
      button.classList.add("edit-mode");
      button.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon edit-mode">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
      </svg>
      `;

      // editMode = false;
    }
    // IF Clicked again on edit button --- to save
    else if (
      (target.classList.contains("edit-btn") ||
        target.classList.contains("edit-icon")) &&
      editMode &&
      target.classList.contains("edit-mode")
    ) {
      const editedRow = target.closest("tr");
      console.log(editMode);

      // Variables for send request
      const clickedButton = target.closest("button");
      const id = clickedButton.getAttribute("data-id");
      const tableName = clickedButton.getAttribute("data-table");
      const values = [];

      // loop through row cells and get input values, then push values to array of values and send values and tableName with id of row to php.
      values.push(id);
      for (let i = 1; i < Array.from(editedRow.cells).length - 2; i++) {
        const cell = Array.from(editedRow.cells)[i];
        const inputValue = cell.querySelector("input").value;
        values.push(inputValue);
        cell.innerHTML = inputValue;

        // create an object with the data to be sent
      }

      const data = {
        id: id,
        tableName: tableName,
        values: values,
      };

      // send request to php to update database data
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "redaguoti.php");
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onload = function () {
        if (xhr.status === 200) {
          // Request succeeded
          const response = JSON.parse(xhr.responseText);
          console.log(response);
          editMode = false;
        } else {
          // Request failed
          console.error("Error: " + xhr.status);
          editMode = false;
        }
      };
      xhr.send(JSON.stringify(data));
    }
    // IF Clicked another edit button when one row is already in edit -- alert
    else if (
      (target.classList.contains("edit-btn") ||
        target.classList.contains("edit-icon")) &&
      editMode &&
      !target.classList.contains("edit-mode")
    ) {
      console.log(editMode);
      alert(
        "Jūs negalite pasirinkti dar vieno lauko redagavimui. Pirmiausia baikite redagavimą pirmojo lauko."
      );
    }
    // DETAILED VIEW
    if (
      target.classList.contains("more-btn") ||
      target.classList.contains("more-icon")
    ) {
      const clickedButton = target.closest("button");
      const id = clickedButton.getAttribute("data-id");
      const tableName = clickedButton.getAttribute("data-table");

      const data = {
        tableName: tableName,
        id: id,
      };

      const xhr = new XMLHttpRequest();
      xhr.open("POST", "issami-submit.php");
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onload = function () {
        if (xhr.status === 200) {
          // Request succeeded
          const response = JSON.parse(xhr.responseText);

          document.querySelector(
            ".perziureti-daugiau__box--outer"
          ).style.zIndex = 1;
          document.querySelector(
            ".perziureti-daugiau__box--outer"
          ).style.opacity = 1;

          const boxHeader = document.querySelector(
            ".perziureti-daugiau__box--header"
          );

          console.log(response);

          const { LektuvoKodas, Modelis, SkrydzioAtstumas, Statusas } =
            response[0][0];
          const {
            PilotoKodas: kPilotoKodas,
            Vardas: kVardas,
            Pavarde: kPavarde,
          } = response[1][0];
          const {
            PilotoKodas: pPilotoKodas,
            Vardas: pVardas,
            Pavarde: pPavarde,
          } = response[2][0];
          const { ReisoNumeris, IsvykimoLaikas, AtvykimoLaikas, Trukme } =
            response[3][0];
          const { PakilimoData, NusileidimoData, LaisvosVietos } =
            response[4][0];

          const {
            Miestas: iMiestas,
            Valstybe: iValstybe,
            KodasIATA: iKodasIATA,
          } = response[6][0];
          const {
            Miestas: aMiestas,
            Valstybe: aValstybe,
            KodasIATA: aKodasIATA,
          } = response[7][0];

          const { Miestas, Valstybe, KodasIATA } = response[5][0];

          const dataBox = document.querySelector(
            ".perziureti-daugiau__box--data"
          );
          boxHeader.textContent = `Skrydžio numeriu ${id} informacija`;
          const html = `
          <div>
            <div class="left-side">
          
              <h2>Skrydis</h2>
              <br>
              <h3>Skrydžio numeris: ${id}</h3>
              <h3>Likusios laisvos vietos: ${LaisvosVietos}</h3>
             <h3>Pakilimo data: ${PakilimoData}</h3>
              <h3>Nusileidimo data: ${NusileidimoData}</h3>
            </div>
              <br>
             <br>
              <div>
             <h2>Skrydžio pilotai</h2>
              <br>
              <h3>Kapitonas: ${kVardas} ${kPavarde}. Piloto kodas: ${kPilotoKodas} </h3>
              <h3>Pagalbinis pilotas: ${pVardas} ${pPavarde}. Piloto kodas: ${pPilotoKodas} </h3>
              </div>
            </div>
          <br>
          <br>
          <div class="right-side">
          
            <div>
              <h2>Lektuvas</h2>
             <br>
             <h3>Lektuvo kodas: ${LektuvoKodas}</h3>
             <h3>Modelis: ${Modelis}</h3>
             <h3>Dabartinė lektuvo lokacija: ${KodasIATA}  ${Miestas},${Valstybe}</h3>
             <h3>Kiek lektuvas gali nuskristi nesipildęs kuro: ${SkrydzioAtstumas} km</h3>
             <h3>Lektuvo dabartinis statusas: ${Statusas}</h3>
           </div>
            <br>
            <br>
            <div>
             <h2>Reisas</h2>
              <br>
              <h3>Reiso numeris: ${ReisoNumeris}</h3>
              <h3>Išvykimo oro uostas: ${iKodasIATA}     ${iMiestas},${iValstybe}</h3>
              <h3>Išvykimo laikas: ${IsvykimoLaikas.slice(0, 5)}</h3>
              <h3>Atvykimo oro uostas: ${aKodasIATA}     ${aMiestas},${aValstybe}</h3>
              <h3>Atvykimo laikas: ${AtvykimoLaikas.slice(0, 5)}</h3>
              <h3>Kelionės trukmė: ${Trukme} min</h3>
            </div>

          </div>
          
          `;
          dataBox.innerHTML = html;
        } else {
          // Request failed
          console.error("Error: " + xhr.status);
        }
      };
      xhr.send(JSON.stringify(data));
    }
  });

  const detailedViewOuterBox = document.querySelector(
    ".perziureti-daugiau__box--outer"
  );
  detailedViewOuterBox.addEventListener("click", (e) => {
    const target = e.target;
    if (
      target.classList.contains("perziureti-daugiau__box--outer") ||
      target.classList.contains("perziureti-daugiau__box--close")
    ) {
      detailedViewOuterBox.style.opacity = 0;
      detailedViewOuterBox.style.zIndex = -50;
    }
  });
});
