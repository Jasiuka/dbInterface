<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/prideti_style.css" rel="stylesheet">
    <link href="styles/bendri_style.css" rel="stylesheet">
    <link href="styles/base_style.css" rel="stylesheet">
    <script src="add_script.js"></script>
    <title>Duomenų bazės valdymas</title>
</head>
<body>
<ul class="main-tabs">
      <li>
        <a
          class="menu__btn"
          href="http://localhost/Savarankiskas/perziureti.php"
          >Peržiūrėti</a
        >
      </li>
      <li>
        <a class="menu__btn menu__btn-open" href="http://localhost/Savarankiskas/prideti.php"
          >Pridėti</a
        >
      </li>
    </ul>
          <div class="duomenu-pridejimas-main tab-box">
            <h2 class="tab-box__header">Duomenų Pridėjimas</h2>
            <p class="tab-box__text">Pasirinkitę lentelę į kurią norite pridėti duomenų</p>
            <form id="prideti-forma" method="post" action="prideti_submit.php">
            <select name="lentele-prideti" class="select-element select-element__pridejimas">
              <option value="none" >Pasirinkite lentelę</option>
              <option value="darbuotojai">Darbuotojai</option>
              <option value="pilotai">Pilotai</option>
              <option value="bilietai">Bilietai</option>
              <option value="lektuvai">Lektuvai</option>
              <option value="orouostai">Oro Uostai</option>
              <option value="keleiviai">Keleiviai</option>
              <option value="skrydziai">Skrydžiai</option>
              <option value="reisai">Reisai</option>
              <option value="bagazai">Bagažai</option>
              <option value="registracijos">Registracijos</option>
            </select>
               <!-- -------------------------------------------------------------------------------- -->
              <!-- ---------------------------------Darbuotojai-------------------------------------------- -->
              <!-- -------------------------------------------------------------------------------- -->
            <div class="duomenu-pridejimas__inputai">
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__darbuotojai hide">
                <div class="darbuotojo-kodas__box input__box ">
                  <input type="number" id="darbuotojo-kodas__input" name="darbuotojo-kodas" />
                  <label class="pridejimas__label" for="darbuotojo-kodas__input">Darbuotojo kodas</label>
                </div>
                <div class="darbuotojo-vardas__box input__box">
                <input type="text" id="darbuotojo-vardas__input" name="darbuotojo-vardas" />
                  <label class="pridejimas__label" for="darbuotojo-vardas__input">Darbuotojo vardas</label>
                </div>
                <div class="darbuotojo-pavarde__box input__box">
                <input type="text" id="darbuotojo-pavarde__input" name="darbuotojo-pavarde" />
                  <label class="pridejimas__label" for="darbuotojo-pavarde__input">Darbuotojo pavardė</label>
                </div>
                <div class="darbuotojo-gimimo-data__box input__box">
                <input type="date" id="darbuotojo-gimimo-data__input" name="darbuotojo-gimimo-data" />
                  <label class="pridejimas__label" for="darbuotojo-gimimo-data__input">Darbuotojo gimimo data</label>
                </div>
                <div class="darbuotojo-pareigos__box input__box">
                <input type="text" id="darbuotojo-pareigos__input" name="darbuotojo-pareigos" />
                  <label class="pridejimas__label" for="darbuotojo-pareigos__input">Darbuotojo pareigos</label>
                </div>
                <div class="darbuotojo-darbo-vieta__box input__box">
                <input type="text" id="darbuotojo-vieta__input" name="darbuotojo-vieta" />
                  <label class="pridejimas__label" for="darbuotojo-vieta__input">Darbuotojo darbo vieta</label>
                </div>
              </div>
                <!-- -------------------------------------------------------------------------------- -->
              <!-- ---------------------------------Pilotai-------------------------------------------- -->
              <!-- -------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__pilotai hide">
                <div class="piloto-kodas__box input__box">
                <input type="number" id="piloto-kodas__input" name="piloto-kodas" />
                  <label class="pridejimas__label" for="piloto-kodas__input">Piloto kodas</label>
                </div>
                <div class="piloto-vardas__box input__box">
                <input type="text" id="piloto-vardas__input" name="piloto-vardas" />
                  <label class="pridejimas__label" for="piloto-vardas__input">Piloto vardas</label>
                </div>
                <div class="piloto-pavarde__box input__box">
                <input type="text" id="piloto-pavarde__input" name="piloto-pavarde" />
                  <label class="pridejimas__label" for="piloto-pavarde__input">Piloto pavarde</label>
                </div>
                <div class="piloto-laipsnis__box input__box">
                <input type="text" id="piloto-laipsnis__input" name="piloto-laipsnis" />
                  <label class="pridejimas__label" for="piloto-laipsnis__input">Piloto laipsnis</label>
                </div>
                <div class="piloto-licenzija__box input__box">
                <input type="text" id="piloto-licenzija__input" name="piloto-licenzija" />
                  <label class="pridejimas__label" for="piloto-licenzija__input">Piloto licenzija</label>
                </div>
                <div class="piloto-stazas__box input__box">
                <input type="number" id="piloto-stazas__input" name="piloto-stazas" />
                  <label class="pridejimas__label" for="piloto-stazas__input">Piloto stažas</label>
                </div>
              </div>
                <!-- -------------------------------------------------------------------------------- -->
              <!-- ---------------------------------Bilietai-------------------------------------------- -->
              <!-- -------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__bilietai hide">
                <div class="bilieto-numeris__box input__box">
                <input type="number" id="bilieto-numeris__input" name="bilieto-numeris" />
                  <label class="pridejimas__label" for="bilieto-numeris__input">Bilieto numeris</label>
                </div>
                <div class="bilieto-skrydis__box input__box">
                <input type="number" id="bilieto-skrydis__input" name="bilieto-skrydis" />
                  <label class="pridejimas__label" for="bilieto-skrydis__input">Bilieto skrydis</label>
                </div>
                <div class="bilieto-kaina__box input__box">
                <input type="number" id="bilieto-kaina__input" name="bilieto-kaina" />
                  <label class="pridejimas__label" for="bilieto-kaina__input">Bilieto kaina</label>
                </div>
                <div class="bilieto-vieta__box input__box">
                <input type="text" id="bilieto-vieta__input" name="bilieto-vieta" />
                  <label class="pridejimas__label" for="bilieto-vieta__input">Bilieto vieta</label>
                </div>
                <div class="bilieto-keleivis__box input__box">
                <input type="number" id="bilieto-keleivis__input" name="bilieto-keleivis" />
                  <label class="pridejimas__label" for="bilieto-keleivis__input">Bilieto keleivis</label>
                </div>
              </div>
                <!-- -------------------------------------------------------------------------------- -->
              <!-- ---------------------------------Lektuvai-------------------------------------------- -->
              <!-- -------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__lektuvai hide">
                <div class="lektuvo-kodas__box input__box">
                <input type="number" id="lektuvo-kodas__input" name="lektuvo-kodas" />
                  <label class="pridejimas__label" for="lektuvo-kodas__input">Lektuvo kodas</label>
                </div>
                <div class="lektuvo-modelis__box input__box">
                <input type="text" id="lektuvo-modelis__input" name="lektuvo-modelis" />
                  <label class="pridejimas__label" for="lektuvo-modelis__input">Lektuvo modelis</label>
                </div>
                <div class="lektuvo-gamintojas__box input__box">
                <input type="text" id="lektuvo-gamintojas__input" name="lektuvo-gamintojas" />
                  <label class="pridejimas__label" for="lektuvo-gamintojas__input">Lektuvo gamintojas</label>
                </div>
                <div class="lektuvo-metai__box input__box">
                <input type="date" id="lektuvo-metai__input" name="lektuvo-metai" />
                  <label class="pridejimas__label" for="lektuvo-metai__input">Lektuvo metai</label>
                </div>
                <div class="lektuvo-lokacija__box input__box">
                <input type="text" id="lektuvo-lokacija__input" name="lektuvo-lokacija" />
                  <label class="pridejimas__label" for="lektuvo-lokacija__input">Lektuvo lokacija</label>
                </div>
                <div class="lektuvo-vietos__box input__box">
                <input type="number" id="lektuvo-vietos__input" name="lektuvo-vietos" />
                  <label class="pridejimas__label" for="lektuvo-vietos__input">Lektuvo vietų skaičius</label>
                </div>
                <div class="lektuvo-atstumas__box input__box">
                <input type="number" id="lektuvo-atstumas__input" name="lektuvo-atstumas" />
                  <label class="pridejimas__label" for="lektuvo-atstumas__input">Lektuvo skrydžio atstumas</label>
                </div>
                <div class="lektuvo-statusas__box input__box">
                <input type="text" id="lektuvo-statusas__input" name="lektuvo-statusas" />
                  <label class="pridejimas__label" for="lektuvo-statusas__input">Lektuvo statusas</label>
                </div>
                <div class="lektuvo-apziura__box input__box">
                <input type="date" id="lektuvo-apziura__input" name="lektuvo-apziura" />
                  <label class="pridejimas__label" for="lektuvo-apziura__input">Lektuvo kita apžiūra</label>
                </div>
              </div>
                <!-- -------------------------------------------------------------------------------- -->
              <!-- ---------------------------------Oro Uostai-------------------------------------------- -->
              <!-- -------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__orouostai hide">
                <div class="orouosto-kodas__box input__box">
                <input type="number" id="orouosto-kodas__input" name="orouostai-kodas" />
                  <label class="pridejimas__label" for="orouosto-kodas__input">Oro uosto kodas</label>
                </div>
                <div class="orouosto-valstybe__box input__box">
                <input type="text" id="orouosto-valstybe__input"  name="orouostai-valstbe" />
                  <label class="pridejimas__label" for="orouosto-valstybe__input">Oro uosto valstybė</label>
                </div>
                <div class="orouosto-miestas__box input__box">
                <input type="text" id="orouosto-miestas__input"  name="orouostai-miestas" />
                  <label class="pridejimas__label" for="orouosto-miestas__input">Oro uosto miestas</label>
                </div>
                <div class="orouosto-iata__box input__box">
                <input type="text" id="orouosto-iata__input"  name="orouostai-iata" />
                  <label class="pridejimas__label" for="orouosto-iata__input">Oro uosto IATA kodas</label>
                </div>
                <div class="orouosto-icao__box input__box">
                <input type="text" id="orouosto-icao__input"  name="orouostai-icao" />
                  <label class="pridejimas__label" for="orouosto-icao__input">Oro uosto ICAO kodas</label>
                </div>
                <div class="orouosto-platuma__box input__box">
                <input type="number" id="orouosto-plautuma__input"  name="orouostai-platuma" />
                  <label class="pridejimas__label" for="orouosto-plautuma__input">Oro uosto plautumos koordinatės</label>
                </div>
                <div class="orouosto-ilguma__box input__box">
                <input type="number" id="orouosto-ilguma__input"  name="orouostai-ilguma" />
                  <label class="pridejimas__label" for="orouosto-ilguma__input">Oro uosto ilgumos koordinatės</label>
                </div>
              </div>
               <!-- -------------------------------------------------------------------------------- -->
              <!-- ---------------------------------Keleiviai-------------------------------------------- -->
              <!-- -------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__keleiviai hide">
                <div class="keleivio-kodas__box input__box">
                <input type="number" id="keleivio-kodas__input" name="keleivio-kodas" />
                  <label class="pridejimas__label" for="keleivio-kodas__input">Keleivio kodas</label>
                </div>
                <div class="keleivio-vardas__box input__box">
                <input type="text" id="keleivio-vardas__input" name="keleivio-vardas" />
                  <label class="pridejimas__label" for="keleivio-vardas__input">Keleivio vardas</label>
                </div>
                <div class="keleivio-pavarde__box input__box">
                <input type="text" id="keleivio-pavarde__input" name="keleivio-pavarde" />
                  <label class="pridejimas__label" for="keleivio-pavarde__input">Keleivio pavardė</label>
                </div>
                <div class="keleivio-pastas__box input__box">
                <input type="email" id="keleivio-pastas__input" name="keleivio-pastas" />
                  <label class="pridejimas__label" for="keleivio-pastas__input">Keleivio El paštas</label>
                </div>
                <div class="keleivio-bagazas__box input__box">
                <input type="number" id="keleivio-bagazas__input" name="keleivio-bagazas" />
                  <label class="pridejimas__label" for="keleivio-bagazas__input">Keleivio bagažo numeris</label>
                </div>
                <div class="keleivio-registracija__box input__box">
                <input type="number" id="keleivio-registracija__input" name="keleivio-registracija" />
                  <label class="pridejimas__label" for="keleivio-registracija__input">Keleivio registracijos numeris</label>
                </div>
              </div>
              <!-- -------------------------------------------------------------------------------- -->
              <!-- ---------------------------------Skrydžiai-------------------------------------------- -->
              <!-- -------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__skrydziai hide">
                <div class="skrydzio-numeris__box input__box" name="skrydzio-numeris">
                <input type="number" id="skrydzio-numeris__input" />
                  <label class="pridejimas__label" for="skrydzio-numeris__input">Skrydžio numeris</label>
                </div>
                <div class="skrydzio-lektuvas__box input__box">
                <input type="number" id="skrydzio-lektuvas__input" name="skrydzio-lektuvas" />
                  <label class="pridejimas__label" for="skrydzio-lektuvas__input">Skrydžio lektuvas</label>
                </div>
                <div class="skrydzio-reisas__box input__box">
                <input type="number" id="skrydzio-reisas__input" name="skrydzio-reisas" />
                  <label class="pridejimas__label" for="skrydzio-reisas__input">Skrydžio reiso numeris</label>
                </div>
                <div class="skrydzio-vietos__box input__box">
                <input type="number" id="skrydzio-vietos__input" name="skrydzio-vietos" />
                  <label class="pridejimas__label" for="skrydzio-vietos__input">Skrydžio vietos</label>
                </div>
                <div class="skrydzio-pakilimo-data__box input__box">
                <input type="date" id="skrydzio-pakilimo-data__input" name="skrydzio-pakilimo-data" />
                  <label class="pridejimas__label" for="skrydzio-pakilimo-data__input">Skrydžio pakilimo data</label>
                </div>
                <div class="skrydzio-nusileidimo-data__box input__box">
                <input type="date" id="skrydzio-nusileidimo-data__input" name="skrydzio-nusileidimo-data" />
                  <label class="pridejimas__label" for="skrydzio-nusileidimo-data__input">Skrydžio nusileidimo data</label>
                </div>
                <div class="skrydzio-kapitonas__box input__box">
                <input type="number" id="skrydzio-kapitonas__input" name="skrydzio-kapitonas" />
                  <label class="pridejimas__label" for="skrydzio-kapitonas__input">Skrydžio kapitonas</label>
                </div>
                <div class="skrydzio-pagalbinis__box input__box">
                <input type="number" id="skrydzio-pagalbinis__input" name="skrydzio-pagalbinis" />
                  <label class="pridejimas__label" for="skrydzio-pagalbinis__input">Skrydžio pagalbinis pilotas</label>
                </div>
              </div>
              <!-- ------------------------------------------------------------------------------------------- -->
              <!-- -----------------------------------Bagažai-------------------------------------------------- -->
              <!-- ------------------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__bagazai hide">
                <div class="bagazo-numeris__box input__box" name="bagazo-numeris">
                <input type="number" id="bagazo-numeris__input" />
                  <label class="pridejimas__label" for="bagazo-numeris__input">Bagažo kodas</label>
                </div>
                <div class="bagazo-svoris__box input__box">
                <input type="number" id="bagazo-svoris__input" name="bagazo-svoris" />
                  <label class="pridejimas__label" for="bagazo-svoris__input">Bagažo svoris</label>
                </div>
                <div class="bagazo-skrydis__box input__box">
                <input type="number" id="bagazo-skrydis__input" name="bagazo-skrydis" />
                  <label class="pridejimas__label" for="bagazo-skrydis__input">Bagažo skrydis</label>
                </div>
              </div>
              <!-- ------------------------------------------------------------------------------------------- -->
              <!-- -----------------------------------Registracijos-------------------------------------------------- -->
              <!-- ------------------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__registracijos hide">
                <div class="registracijos-numeris__box input__box" name="registracijos-numeris">
                <input type="number" id="registracijos-numeris__input" />
                  <label class="pridejimas__label" for="registracijos-numeris__input">Registracijos kodas</label>
                </div>
                <div class="dokumento-tipas__box input__box">
                <input type="select" id="dokumento-tipas__input" name="dokumento-tipas" />
                  <label class="pridejimas__label" for="dokumento-tipas__input">Dokumento tipas</label>
                </div>
                <div class="dokumento-numeris__box input__box">
                <input type="number" id="dokumento-numeris__input" name="dokumento-numeris" />
                  <label class="pridejimas__label" for="dokumento-numeris__input">Dokumento numeris</label>
                </div>
                <div class="asmens-kodas__box input__box">
                <input type="number" id="asmens-kodas__input" name="asmens-kodas" />
                  <label class="pridejimas__label" for="asmens-kodas__input">Asmens kodas</label>
                </div>
                <div class="registracijos-gimdata__box input__box">
                <input type="date" id="registracijos-gimdata__input" name="registracijos-gimdata" />
                  <label class="pridejimas__label" for="registracijos-gimdata__input">Asmens gimimo data</label>
                </div>
                <div class="registracijos-isdavimas__box input__box">
                <input type="text" id="registracijos-isdavimas__input" name="registracijos-isdavimas" />
                  <label class="pridejimas__label" for="registracijos-isdavimas__input">Valstybė išdavusi dokumentą</label>
                </div>
                <div class="registracijos-pilietybe__box input__box">
                <input type="text" id="registracijos-pilietybe__input" name="registracijos-pilietybe" />
                  <label class="pridejimas__label" for="registracijos-pilietybe__input">Asmens pilietybė</label>
                </div>
              </div>
              <!-- ------------------------------------------------------------------------------------------- -->
              <!-- -----------------------------------Reisai-------------------------------------------------- -->
              <!-- ------------------------------------------------------------------------------------------- -->
              <div class="duomenu-pridejimas__inputai-box duomenu-pridejimas__reisai hide">
                <div class="reiso-numeris__box input__box" name="reiso-numeris">
                <input type="number" id="reiso-numeris__input" />
                  <label class="pridejimas__label" for="reiso-numeris__input">Reiso numeris</label>
                </div>
                <div class="reiso-isvykimo-oro-uostas__box input__box">
                <input type="number" id="reiso-isvykimo-oro-uostas__input" name="reiso-isvykimo-oro-uostas" />
                  <label class="pridejimas__label" for="reiso-isvykimo-oro-uostas__input">Reiso išvykimo oro uosto kodas</label>
                </div>
                <div class="reiso-atvykimo-oro-uostas__box input__box">
                <input type="number" id="reiso-atvykimo-oro-uostas__input" name="reiso-atvykimo-oro-uostas" />
                  <label class="pridejimas__label" for="reiso-atvykimo-oro-uostas__input">Reiso atvykimo oro uosto kodas</label>
                </div>
                <div class="reiso-isvykimo-laikas__box input__box">
                <input type="time" id="reiso-isvykimo-laikas__input" name="reiso-isvykimo-laikas" />
                  <label class="pridejimas__label" for="reiso-isvykimo-laikas__input">Reiso išvykimo laikas</label>
                </div>
                <div class="reiso-atvykimo-laikas__box input__box">
                <input type="time" id="reiso-atvykimo-laikas__input" name="reiso-atvykimo-laikas" />
                  <label class="pridejimas__label" for="reiso-atvykimo-laikas__input">Reiso atvykimo laikas</label>
                </div>
                <div class="reiso-trukme__box input__box">
                <input type="number" id="reiso-trukme__input" name="reiso-trukme" />
                  <label class="pridejimas__label" for="reiso-trukme__input">Reiso trukmė</label>
                </div>
              </div>
              <input type="submit" value="Pridėti" class="form__btn form-prideti__btn hide"/>
            </form>      
            </div>
          </div>
</body>
</html>