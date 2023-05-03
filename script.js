document.addEventListener("DOMContentLoaded", function () {
  const pridejimas_select = document.querySelector(
    ".select-element__pridejimas"
  );
  const pridejimas_btn = document.querySelector(".form-prideti__btn");

  const visiPridejimoInputuBoxai = document.querySelectorAll(
    ".duomenu-pridejimas__inputai-box"
  );

  pridejimas_select.addEventListener("change", (e) => {
    const value = e.target.value;

    if (value === "darbuotojai") {
      showInputs("darbuotojai", visiPridejimoInputuBoxai);
    }
    if (value === "pilotai") {
      showInputs("pilotai", visiPridejimoInputuBoxai);
    }
    if (value === "bilietai") {
      showInputs("bilietai", visiPridejimoInputuBoxai);
    }
    if (value === "lektuvai") {
      showInputs("lektuvai", visiPridejimoInputuBoxai);
    }
    if (value === "orouostai") {
      showInputs("orouostai", visiPridejimoInputuBoxai);
    }
    if (value === "keleiviai") {
      showInputs("keleiviai", visiPridejimoInputuBoxai);
    }
    if (value === "skrydziai") {
      showInputs("skrydziai", visiPridejimoInputuBoxai);
    }
    if (value === "none") {
      showInputs("none", visiPridejimoInputuBoxai);
      pridejimas_btn.classList.add("hide");
    }
  });

  function showInputs(inputName, allInputsBoxes) {
    allInputsBoxes.forEach((element) => {
      if (element.classList.contains(`duomenu-pridejimas__${inputName}`)) {
        element.classList.remove("hide");
        pridejimas_btn.classList.remove("hide");
      } else {
        element.classList.add("hide");
      }
    });
  }
});
