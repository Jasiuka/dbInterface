<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="styles/base_style.css" rel="stylesheet"/>
    <link href="styles/bendri_style.css" rel="stylesheet"/>
    <link href="styles/perziureti_style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="find_delete_script.js"></script>
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
    </ul>
<div class="duomenu-perziurejimas-main tab-box">
          <h2 class="tab-box__header">Duomenų peržiūrėjimas, paieška ir ištrinimas</h2>
          <p class="tab-box__text">Pasirinkite lentelę kurios duomenis norite peržiūrėti, ištrinti ar surasti.</p>
          <form method="post" id="forma" class="perziureti-forma" action="perziureti.php">
            <div class="perziureti-box">
              <select name="lentele" class="select-element select-element-perziureti" >
                <option value="none">Pasirinkite lentelę</option>
                <option value="darbuotojai">Darbuotojai</option>
                <option value="pilotai">Pilotai</option>
                <option value="bilietai">Bilietai</option>
                <option value="lektuvai">Lektuvai</option>
                <option value="orouostai">Oro Uostai</option>
                <option value="keleiviai">Keleiviai</option>
                <option value="skrydziai">Skrydžiai</option>
                <option value="reisai">Reisai</option>
                <option value="registracijos">Registracijos</option>
                <option value="bagazai">Bagažai</option>
              </select>
              <button type="submit" class="form__btn form-perziureti__btn">Peržiūrėti</button>
            </div>
            <div class="paieska-box">
              <div class="paieskos-input-box">
                <label for="paieskos-input">Paieškos raktažodis</label>
                <input name="paieskos-input" type="text" class="paieska-input" />
              </div>
              <button class="form__btn paieska-btn" type="button">Ieškoti</button>
            </div>
          </form>
          <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['lentele'])) {
              // connect to DB
              $host = "localhost";
              $user = "root";
              $password = "";
              $database = "aviakompanija";
              $conn = mysqli_connect($host, $user, $password, $database, 3308);
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }
              
              // get data from DB by table name
              $table_name = $_POST['lentele'];
              $sql = "SELECT * FROM $table_name";
              $result = mysqli_query($conn, $sql);

              if ($table_name == "darbuotojai") { ?>
                <table class="table-darbuotojai">
                  <thead class="table-head">
                    <tr class="table-head-row">
                      <th>Darbuotojo kodas</th>
                      <th>Vardas</th>
                      <th>Pavardė</th>
                      <th>Gimimo data</th>
                      <th>Pareigos</th>
                      <th>Darbo vieta</th>
                    </tr>
                  </thead>
            <tbody class="table-darbuotojai-data">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    
                  <tr >
                    <td><?= $row['DarbuotojoKodas'] ?></td>
                    <td><?= $row['Vardas'] ?></td>
                    <td><?= $row['Pavarde'] ?></td>
                    <td><?= $row['GimimoData'] ?></td>
                    <td><?= $row['Pareigos'] ?></td>
                    <td><?= $row['DarboVieta'] ?></td>
                    <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['DarbuotojoKodas']; ?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                  </button></td>
                  <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['DarbuotojoKodas']; ?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            
          </table>
          <?php } ?>
          <!-- If table pilotai -->
          <?php if ($table_name == "pilotai") { ?>
                <table class="table-pilotai">
                  <thead class="table-head">
                    <tr>
                      <th>Piloto kodas</th>
                      <th>Vardas</th>
                      <th>Pavardė</th>
                      <th>Laipsnis</th>
                      <th>Stažas (metais)</th>
                      <th>Licenzijos Tipas</th>
                    </tr>
                  </thead>
                  <tbody class="table-pilotai-data">
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['PilotoKodas'] ?></td>
                        <td><?= $row['Vardas'] ?></td>
                        <td><?= $row['Pavarde'] ?></td>
                        <td><?= $row['Laipsnis'] ?></td>
                        <td><?= $row['Stazas'] ?></td>
                        <td><?= $row['LicenzijosTipas'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['PilotoKodas']; ?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['PilotoKodas']; ?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
          <!-- If table keleiviai -->
          <?php if ($table_name == "keleiviai") { ?>
                <table class="table-keleiviai">
                  <thead class="table-head">
                    <tr>
                      <th>Keleivio Kodas</th>
                      <th>Vardas</th>
                      <th>Pavardė</th>     
                      <th>El paštas</th>     
                      <th>Bagažo kodas</th>     
                      <th>Registracijos kodas</th>     
                    </tr>
                  </thead>
                  <tbody class="table-keleiviai-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['KeleivioKodas'] ?></td>
                        <td><?= $row['Vardas'] ?></td>
                        <td><?= $row['Pavarde'] ?></td>
                        <td><?= $row['ElPastas'] ?></td>
                        <td><?= $row['Bagazas'] ?></td>
                        <td><?= $row['Registracija'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['KeleivioKodas']; ?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['KeleivioKodas']; ?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
          <!-- If table lektuvai -->
          <?php if ($table_name == "lektuvai") { ?>
                <table class="table-lektuvai">
                  <thead class="table-head">

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
                  </thead>
                  <tbody class="table-lektuvai-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['LektuvoKodas'] ?></td>
                        <td><?= $row['Modelis'] ?></td>
                        <td><?= $row['Gamintojas'] ?></td>
                        <td><?= $row['PagaminimoMetai'] ?></td>
                        <td><?= $row['DabartineLokacija'] ?></td>
                        <td><?= $row['VietuSkaicius'] ?></td>
                        <td><?= $row['SkrydzioAtstumas'] ?></td>
                        <td><?= $row['Statusas'] ?></td>
                        <td><?= $row['SekantiApziura'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['LektuvoKodas']; ?>" data-table="<?php echo $table_name; ?>" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['LektuvoKodas']; ?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
          <!-- If table skrydziai -->
          <?php if ($table_name == "skrydziai") { ?>
                <table class="table-skrydziai">
                  <thead class="table-head">

                    <tr>
                      <th>Skrydžio numeris</th>
                      <th>Lektuvas</th>
                      <th>Reiso numeris</th>
                      <th>Laisvos vietos</th>
                      <th>Pakilimo data</th>
                      <th>Nusileidimo data</th>
                      <th>Pilotas - Kapitonas</th>
                      <th>Pilotas - Pagalbinis</th>       
                    </tr>
                  </thead>
                  <tbody class="table-skrydziai-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['SkrydzioNumeris'] ?></td>
                        <td><?= $row['Lektuvas'] ?></td>
                        <td><?= $row['Reisas'] ?></td>
                        <td><?= $row['LaisvosVietos'] ?></td>
                        <td><?= $row['PakilimoData'] ?></td>
                        <td><?= $row['NusileidimoData'] ?></td>
                        <td><?= $row['PilotasKapitonas'] ?></td>
                        <td><?= $row['PilotasPagalbinis'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['SkrydzioNumeris']; ?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['SkrydzioNumeris']; ?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                      <td>
                    <button title="Daugiau.." class="more-btn" data-id="<?php echo $row['SkrydzioNumeris']; ?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#50C878" class="more-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
          <!-- If talbe orouostai -->
          <?php if ($table_name == "orouostai") { ?>
                <table class="table-orouostai">
                  <thead class="table-head">

                    <tr class="table-head">
                      <th>Oro uosto kodas</th>
                      <th>Valstybė</th>
                      <th>Miestas</th>
                      <th>IATA</th>
                      <th>ICAO</th>
                      <th>Platumos koordinatės</th>
                      <th>Ilgumos koordinatės</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody class="table-orouostai-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['OroUostoKodas'] ?></td>
                <td><?= $row['Valstybe'] ?></td>
                <td><?= $row['Miestas'] ?></td>
                <td><?= $row['KodasIATA'] ?></td>
                <td><?= $row['KodasICAO'] ?></td>
                <td><?= $row['PlatumosKoordinates'] ?></td>
                <td><?= $row['IlgumosKoordinates'] ?></td>
                <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['OroUostoKodas']; ?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                </button></td>
                <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['OroUostoKodas']; ?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
</tr>
<?php endwhile; ?>
</tbody>
          </table>
          <?php } ?>
          <!-- If table bilietai -->
          <?php if ($table_name == "bilietai") { ?>
                <table class="table-bilietai">
                  <thead class="table-head">

                    <tr>
                      <th>Bilieto numeris</th>
                      <th>Skrydis</th>
                      <th>Kaina (eur)</th>
                      <th>Vieta lektuve</th>
                      <th>Keleivis</th>
                      
                    </tr>
                  </thead>
                  <tbody class="table-bilietai-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['BilietoNumeris'] ?></td>
                        <td><?= $row['Skrydis'] ?></td>
                        <td><?= $row['Kaina'] ?></td>
                        <td><?= $row['VietaLektuve'] ?></td>
                        <td><?= $row['Keleivis'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['BilietoNumeris']?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['BilietoNumeris']?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
          <?php if ($table_name == "bagazai") { ?>
                <table class="table-bagazao">
                  <thead class="table-head">

                    <tr>
                      <th>Bagažo numeris</th>
                      <th>Skrydžio numeris</th>
                      <th>Svoris (kg)</th>          
                    </tr>
                  </thead>
                  <tbody class="table-bagazai-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['BagazoID'] ?></td>
                        <td><?= $row['Skrydis'] ?></td>
                        <td><?= $row['Svoris'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['BagazoID']?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['BagazoID']?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
          <?php if ($table_name == "reisai") { ?>
                <table class="table-reisai">
                  <thead class="table-head">

                    <tr>
                      <th>Reiso numeris</th>
                      <th>Išvykimo oro uostas</th>
                      <th>Atvykimo oro uostas</th>
                      <th>Išvykimo laikas</th>
                      <th>Atvykimo laikas</th>
                      
                    </tr>
                  </thead>
                  <tbody class="table-reisai-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['ReisoNumeris'] ?></td>
                        <td><?= $row['IsvykimoOroUostas'] ?></td>
                        <td><?= $row['AtvykimoOroUostas'] ?></td>
                        <td><?= $row['IsvykimoLaikas'] ?></td>
                        <td><?= $row['AtvykimoLaikas'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['ReisoNumeris']?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['ReisoNumeris']?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
          <?php if ($table_name == "registracijos") { ?>
                <table class="table-registracijos">
                  <thead class="table-head">

                    <tr>
                      <th>Registracijos numeris</th>
                      <th>Dokumento tipas</th>
                      <th>Dokumento numeris</th>
                      <th>Dokumento išdavimo vieta</th>
                      <th>Pilietybė</th>
                      <th>Asmens kodas</th>
                      <th>Gimimo data</th>
                      
                    </tr>
                  </thead>
                  <tbody class="table-registracijos-data">

                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                      <tr >
                        <td><?= $row['RegistracijosID'] ?></td>
                        <td><?= $row['DokumentoTipas'] ?></td>
                        <td><?= $row['DokumentoNumeris'] ?></td>
                        <td><?= $row['DokumentoIsdavimoVieta'] ?></td>
                        <td><?= $row['Pilietybe'] ?></td>
                        <td><?= $row['AsmensKodas'] ?></td>
                        <td><?= $row['GimimoData'] ?></td>
                        <td><button title="Ištrinti" class="delete-btn" data-id="<?php echo $row['RegistracijosID']?>" data-table="<?php echo $table_name; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e74c3c" class="trash-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button></td>
                      <td>
                    <button title="Redaguoti" class="edit-btn" data-id="<?php echo $row['RegistracijosID']?>" data-table="<?php echo $table_name; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3498db" class="edit-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    </button>
                  </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
          </table>
          <?php } ?>
              <?php
              // Close the database connection
              mysqli_close($conn);
            }
          ?>
      </div>
          </div>
<div class="perziureti-daugiau__box--outer">
  <div class="perziureti-daugiau__box--inner">
    <h2 class="perziureti-daugiau__box--header">Skrydžio numeriu 1 informacija</h2>
    <div class="perziureti-daugiau__box--data">
    </div>
    <button title="Uždaryti" class="perziureti-daugiau__box--close">X</button>
  </div>
</div>
</body>
</html>