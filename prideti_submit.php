<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ChosenTable = $_POST['lentele-prideti'];

            if ($ChosenTable == "darbuotojai") {
              $Darbuotojo_kodas = $_POST['darbuotojo-kodas'];
              $Darbuotojo_vardas = $_POST['darbuotojo-vardas'];
              $Darbuotojo_pavarde = $_POST['darbuotojo-pavarde'];
              $Darbuotojo_gimimo_data = $_POST['darbuotojo-gimimo-data'];
              $Darbuotojo_pareigos = $_POST['darbuotojo-pareigos'];
              $Darbuotojo_vieta = $_POST['darbuotojo-vieta'];

              $sql = "INSERT INTO darbuotojai (DarbuotojoKodas, Vardas, Pavarde, GimimoData, Pareigos, DarboVieta) VALUES ('$Darbuotojo_kodas','$Darbuotojo_vardas','$Darbuotojo_pavarde','$Darbuotojo_gimimo_data','$Darbuotojo_pareigos','$Darbuotojo_vieta')" ;
            }
            if ($ChosenTable == "pilotai") {
                $Piloto_kodas = $_POST['piloto-kodas'];
                $Piloto_vardas = $_POST['piloto-vardas'];
                $Piloto_pavarde = $_POST['piloto-pavarde'];
                $Piloto_laipsnis = $_POST['piloto-laipsnis'];
                $Piloto_stazas = $_POST['piloto-stazas'];
                $Piloto_licenzija = $_POST['piloto-licenzija'];
  
                $sql = "INSERT INTO pilotai (PilotoKodas, Vardas, Pavarde, Laipsnis, Stazas, LicenzijosTipas) VALUES ('$Piloto_kodas','$Piloto_vardas','$Piloto_pavarde','$Piloto_laipsnis','$Piloto_stazas','$Piloto_licenzija')" ;
              }
              if ($ChosenTable == "bilietai") {
                $Bilieto_numeris = $_POST['bilieto-numeris'];
                $Bilieto_skrydis = $_POST['bilieto-skrydis'];
                $Bilieto_kaina = $_POST['bilieto-kaina'];
                $Bilieto_vieta = $_POST['bilieto-vieta'];
                $Bilieto_keleivis = $_POST['bilieto-keleivis'];
  
                $sql = "INSERT INTO bilietai (BilietoNumeris, Skrydis, Kaina, VietaLektuve, Keleivis) VALUES ('$Bilieto_numeris','$Bilieto_skryids','$Bilieto_kaina','$Bilieto_vieta','$Bilieto_keleivis')" ;
              }
              if ($ChosenTable == "lektuvai") {
                $Lektuvo_kodas = $_POST['lektuvo-kodas'];
                $Lektuvo_modelis = $_POST['lektuvo-modelis'];
                $Lektuvo_gamintojas = $_POST['lektuvo-gamintojas'];
                $Lektuvo_metai = $_POST['lektuvo-metai'];
                $Lektuvo_lokacija = $_POST['lektuvo-lokacija'];
                $Lektuvo_vietos = $_POST['lektuvo-vietos'];
                $Lektuvo_atstumas = $_POST['lektuvo-atstumas'];
                $Lektuvo_statusas = $_POST['lektuvo-statusas'];
                $Lektuvo_apziura = $_POST['lektuvo-apziura'];
  
                $sql = "INSERT INTO lektuvai (LektuvoKodas, Modelis, Gamintojas, PagaminimoMetai, DabartineLokacija, VietuSkaicius, SkrydzioAtstumas, Statusas, SekantiApziura) VALUES ('$Lektuvo_kodas','$Lektuvo_modelis','$Lektuvo_gamintojas','$Lektuvo_metai','$Lektuvo_lokacija','$Lektuvo_vietos','$Lektuvo_atstumas','$Lektuvo_statusas','$Lektuvo_apziura')" ;
              }
              if ($ChosenTable == "orouostai") {
                $Orouosto_kodas = $_POST['orouosto-kodas'];
                $Orouosto_valstybe = $_POST['orouosto-valstybe'];
                $Orouosto_miestas = $_POST['orouosto-miestas'];
                $Orouosto_iata = $_POST['orouosto-iata'];
                $Orouosto_icao = $_POST['orouosto-icao'];
                $Orouosto_platuma = $_POST['orouosto-platuma'];
                $Orouosto_ilguma = $_POST['orouosto-ilguma'];
  
                $sql = "INSERT INTO orouostai (OroUostoKodas, Valstybe, Miestas, KodasIATA, KodasICAO, PlatumosKoordinates, IlgumosKoordinates) VALUES ('$Orouosto_kodas','$Orouosto_valstybe','$Orouosto_miestas','$Orouosto_iata','$Orouosto_icao','$Orouosto_platuma','$Orouosto_ilguma')" ;
              }
              if ($ChosenTable == "keleiviai") {
                $Keleivio_kodas = $_POST['keleivio-kodas'];
                $Keleivio_vardas = $_POST['keleivio-vardas'];
                $Keleivio_pavarde = $_POST['keleivio-pavarde'];
                $Keleivio_pastas = $_POST['keleivio-pastas'];
                $Keleivio_bagazas = $_POST['keleivio-bagazas'];
                $Keleivio_registracija = $_POST['keleivio-registracija'];
  
                $sql = "INSERT INTO keleiviai (KeleivioKodas, Vardas, Pavarde,ElPastas,Bagazas,Registracija) VALUES ('$Keleivio_kodas','$Keleivio_vardas','$Keleivio_pavarde','$Keleivio_pastas','$Keleivio_bagazas','$Keleivio_registracija')" ;
              }
              if ($ChosenTable == "skrydziai") {
                $Skrydzio_numeris = $_POST['skrydzio-numeris'];
                $Skrydzio_lektuvas = $_POST['skrydzio-lektuvas'];
                $Skrydzio_reisas = $_POST['skrydzio-reisas'];
                $Skrydzio_vietos = $_POST['skrydzio-vietos'];
                $Skrydzio_pakilimo_data = $_POST['skrydzio-pakilimo-data'];
                $Skrydzio_nusileidimo_data = $_POST['skrydzio-nusileidimo-data'];
                $Skrydzio_kapitonas = $_POST['skrydzio-kapitonas'];
                $Skrydzio_pagalbinis = $_POST['skrydzio-pagalbinis'];

  
                $sql = "INSERT INTO skrydziai (SkrydzioNumeris, Lektuvas, Reisas, LaisvosVietos, PakilimoData, NusileidimoData, PilotasKapitonas, PilotasPagalbinis) VALUES ('$Skrydzio_numeris','$Skrydzio_lektuvas','$Skrydzio_reisas','$Skrydzio_vietos','$Skrydzio_pakilimo_data','$Skrydzio_nusileidimo_data','$Skrydzio_kapitonas','$Skrydzio_pagalbinis')" ;
              }if ($ChosenTable == "reisai") {
                $Reiso_numeris = $_POST['reiso-numeris'];
                $Reiso_isvykimo_oro_uostas = $_POST['reiso-isvykimo-oro-uostas'];
                $Reiso_atvykimo_oro_uostas = $_POST['reiso-atvykimo-oro-uostas'];
                $Reiso_isvykimo_laikas = $_POST['reiso-isvykimo-laikas'];
                $Reiso_atvykimo_laikas = $_POST['reiso-atvykimo-laikas'];
                $Reiso_trukme = $_POST['reiso-trukme'];
                $sql = "INSERT INTO reisai (ReisoNumeris, išvykimoOroUostas,AtvykimoOroUostas,IšvykimoLaikas,AtvykimoLaikas,Trukme) VALUES ('$Reiso_numeris','$Reiso_isvykimo_oro_uostas','$Reiso_atvykimo_oro_uostas','$Reiso_isvykimo_laikas','$Reiso_atvykimo_laikas','$Reiso_trukme')" ;
              }if ($ChosenTable == "bagazai") {
                $Bagazo_numeris = $_POST['bagazo-numeris'];
                $Bagazo_svoris = $_POST['bagazo-svoris'];
                $Bagazo_skrydis = $_POST['bagazo-skrydis'];
                $sql = "INSERT INTO bagazai (BagazoID,Svoris,Skrydis) VALUES ('$Bagazo_numeris','$Bagazo_svoris','$Bagazo_skrydis')" ;
              }if ($ChosenTable == "registracijos") {
                $Registracijos_numeris = $_POST['registracijos-numeris'];
                $Dokumento_tipas = $_POST['dokumento-tipas'];
                $Dokumento_numeris = $_POST['dokumento-numeris'];
                $Asmens_kodas = $_POST['asmens-kodas'];
                $Registracijos_gimdata = $_POST['registracijos-gimdata'];
                $Registracijos_isdavimas = $_POST['registracijos-isdavimas'];
                $Registracijos_pilietybe = $_POST['registracijos-pilietybe'];
                $sql = "INSERT INTO registracijos (RegistracijosID,DokumentoTipas,DokumentoNumeris,AsmensKodas,GimimoData,DokumentoIsdavimoVieta,Pilietybe) VALUES ('$Registracijos_numeris','$Dokumento_tipas','$Dokumento_numeris','$Asmens_kodas','$Registracijos_gimdata','$Registracijos_isdavimas','$Registracijos_pilietybe')" ;
              }
              
              

              // connect to DB
              $host = "localhost";
              $user = "root";
              $password = "";
              $database = "aviakompanija";
              $conn = mysqli_connect($host, $user, $password, $database, 3308);
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              if ($conn->query($sql) === TRUE) {
                echo "New client added successfully!";
                header('Location: pagrindinis_success.html');
            } else {
              if (mysqli_errno($conn) == 1062) {
                $errorMessage = "Klaida, jūsų įvestas ID jau egzistuoja.";
                echo '<script>alert("' . $errorMessage . '");</script>';
                echo '<script>window.history.back();</script>';
            } else {
              $errorMessage = "Įvyko klaida, bandykite iš naujo.";
              echo '<script>window.history.back();</script>';
            }
          }
            
            // Close the database connection
            $conn->close();

            
    exit();
              

}
?>