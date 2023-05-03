<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="styles/base_style.css" rel="stylesheet"/>
    <link href="styles/bendri_style.css" rel="stylesheet"/>
    <link href="styles/perziureti_style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duomenų bazės valdymas</title>
</head>
<body>
<ul class="main-tabs">
      <li>
        <a
          class="menu__btn menu__btn-open"
          href="http://localhost/Savarankiskas/perziureti.php"
          >Peržiūrėti</a
        >
      </li>
      <li>
        <a class="menu__btn" href="http://localhost/Savarankiskas/prideti.php"
          >Pridėti</a
        >
      </li>
      <li>
        <a class="menu__btn" href="http://localhost/Savarankiskas/istrinti.php"
          >Ištrinti</a
        >
      </li>
    </ul>
<div class="duomenu-perziurejimas-main tab-box">
          <h2 class="tab-box__header">Duomenų peržiūrėjimas</h2>
          <p class="tab-box__text">Pasirinkitę lentelę kurios duomenis norite peržiūrėti</p>
          <form method="post" id="forma" action="perziureti.php">
            <select name="lentele" class="select-element">
              <option value="darbuotojai">Darbuotojai</option>
              <option value="pilotai">Pilotai</option>
              <option value="bilietai">Bilietai</option>
              <option value="lektuvai">Lektuvai</option>
              <option value="orouostai">Oro Uostai</option>
              <option value="keleiviai">Keleiviai</option>
              <option value="skrydziai">Skrydžiai</option>
            </select>
            <button type="submit" class="form__btn form-perziureti__btn">Peržiūrėti</button>
          </form>
          <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['lentele'])) {
              // connect to DB
              $host = "localhost";
              $user = "root";
              $password = "";
              $database = "aviakompanija";
              $conn = mysqli_connect($host, $user, $password, $database);
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }
              
              // get data from DB by table name
              $table_name = $_POST['lentele'];
              $sql = "SELECT * FROM $table_name";
              $result = mysqli_query($conn, $sql);

              if ($table_name == "darbuotojai") { ?>
                <table class="table-darbuotojai">
            <tr class="table-head">
              <th>Darbuotojo kodas</th>
              <th>Vardas</th>
              <th>Pavardė</th>
              <th>Gimimo data</th>
              <th>Pareigos</th>
              <th>Darbo vieta</th>
            </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $row['DarbuotojoKodas'] ?></td>
                <td><?= $row['Vardas'] ?></td>
                <td><?= $row['Pavarde'] ?></td>
                <td><?= $row['GimimoData'] ?></td>
                <td><?= $row['Pareigos'] ?></td>
                <td><?= $row['DarboVieta'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
          <?php } ?>
          <!-- If table pilotai -->
          <?php if ($table_name == "pilotai") { ?>
                <table class="table-pilotai">
            <tr>
              <th>Piloto kodas</th>
              <th>Vardas</th>
              <th>Pavardė</th>
              <th>Licenzijos Tipas</th>
              <th>Stažas (metais)</th>
            </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $row['PilotoKodas'] ?></td>
                <td><?= $row['Vardas'] ?></td>
                <td><?= $row['Pavarde'] ?></td>
                <td><?= $row['LicenzijosTipas'] ?></td>
                <td><?= $row['Stazas'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
          <?php } ?>
          <!-- If table keleiviai -->
          <?php if ($table_name == "keleiviai") { ?>
                <table class="table-keleiviai">
            <tr>
              <th>Keleivio Kodas</th>
              <th>Vardas</th>
              <th>Pavardė</th>

            </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $row['KeleivioKodas'] ?></td>
                <td><?= $row['Vardas'] ?></td>
                <td><?= $row['Pavarde'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
          <?php } ?>
          <!-- If table lektuvai -->
          <?php if ($table_name == "lektuvai") { ?>
                <table class="table-lektuvai">
            <tr>
              <th>Lektuvo kodas</th>
              <th>Modelis</th>
              <th>Gamintojas</th>
              <th>Pagaminimo metai</th>
              <th>Dabartinė lokacija</th>
              <th>Vietų skaičius</th>
              <th>Skrydžio atstumas</th>
              <th>Statusas</th>
              <th>Sekanti apžiūra</th>


            </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $row['LektuvoKodas'] ?></td>
                <td><?= $row['Modelis'] ?></td>
                <td><?= $row['Gamintojas'] ?></td>
                <td><?= $row['PagaminimoMetai'] ?></td>
                <td><?= $row['DabartineLokacija'] ?></td>
                <td><?= $row['VietuSkaicius'] ?></td>
                <td><?= $row['SkrydzioAtstumas'] ?></td>
                <td><?= $row['Statusas'] ?></td>
                <td><?= $row['SekantiApziura'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
          <?php } ?>
          <!-- If table skrydziai -->
          <?php if ($table_name == "skrydziai") { ?>
                <table class="table-skrydziai">
            <tr>
              <th>Skrydžio numeris</th>
              <th>Lektuvas</th>
              <th>Laisvos vietos</th>
              <th>Pakilimo laikas</th>
              <th>Pakilimo data</th>
              <th>Nusileidimo laikas</th>
              <th>Nusileidimo data</th>
              <th>Pilotas - Kapitonas</th>
              <th>Pilotas - Pagalabinis</th>
              <th>Pakilimo oro uostas</th>
              <th>Nusileidimo oro uostas</th>

            </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $row['SkrydzioNumeris'] ?></td>
                <td><?= $row['Lektuvas'] ?></td>
                <td><?= $row['LaisvosVietos'] ?></td>
                <td><?= $row['PakilimoLaikas'] ?></td>
                <td><?= $row['PakilimoData'] ?></td>
                <td><?= $row['NusileidimoLaikas'] ?></td>
                <td><?= $row['NusileidimoData'] ?></td>
                <td><?= $row['PilotasKapitonas'] ?></td>
                <td><?= $row['PilotasPagalbinis'] ?></td>
                <td><?= $row['PakilimoOroUostas'] ?></td>
                <td><?= $row['NusileidimoOroUostas'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
          <?php } ?>
          <!-- If talbe orouostai -->
          <?php if ($table_name == "orouostai") { ?>
                <table class="table-orouostai">
            <tr class="table-head">
              <th>Oro uosto kodas</th>
              <th>Valstybė</th>
              <th>Miestas</th>
              <th>IATA</th>
              <th>ICAO</th>
              <th>Platumos koordinatės</th>
              <th>Ilgumos koordinatės</th>


            </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $row['OroUostoKodas'] ?></td>
                <td><?= $row['Valstybe'] ?></td>
                <td><?= $row['Miestas'] ?></td>
                <td><?= $row['KodasIATA'] ?></td>
                <td><?= $row['KodasICAO'] ?></td>
                <td><?= $row['PlatumosKoordinates'] ?></td>
                <td><?= $row['IlgumosKoordinates'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
          <?php } ?>
          <!-- If table bilietai -->
          <?php if ($table_name == "bilietai") { ?>
                <table class="table-bilietai">
            <tr>
              <th>Bilieto numeris</th>
              <th>Skrydis</th>
              <th>Kaina (eur)</th>
              <th>Vieta lektuve</th>
              <th>Keleivis</th>

            </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= $row['BilietoNumeris'] ?></td>
                <td><?= $row['Skrydis'] ?></td>
                <td><?= $row['Kaina'] ?></td>
                <td><?= $row['VietaLektuve'] ?></td>
                <td><?= $row['Keleivis'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
          <?php } ?>
              <?php
              // Close the database connection
              mysqli_close($conn);
            }
          ?>
      </div>
          </div>
</body>
</html>