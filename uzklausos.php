<?php

  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "aviakompanija";
  $conn = mysqli_connect($host, $user, $password, $database, 3308);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

//   1 užklausa. Rasti kokie keleiviai yra nusipirkę bilietą skrydžiams kurie bus 2023/05/24 data.
$query = "SELECT keleiviai.KeleivioKodas, keleiviai.Vardas, keleiviai.Pavarde
 FROM skrydziai INNER JOIN bilietai ON bilietai.Skrydis = skrydziai.SkrydzioNumeris
  LEFT JOIN keleiviai ON bilietai.Keleivis = keleiviai.KeleivioKodas
   WHERE skrydziai.PakilimoData = '2023-05-24'";

$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "Keleiviai kurie nusipirko bilietą skrydžiams kurie bus 2023-05-24:<br><br>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Keleivio Kodas: " . $row["KeleivioKodas"] . "<br>";
            echo "Vardas: " . $row["Vardas"] . "<br>";
            echo "Pavarde: " . $row["Pavarde"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Keleivių nerasta 2023-05-24 data.";
    }
} else {
    echo "Klaida užklausoje: " . mysqli_error($conn);
}

$conn->close();
  ?>