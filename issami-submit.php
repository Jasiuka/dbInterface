<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the data sent from JavaScript
  $postData = json_decode(file_get_contents('php://input'), true);
  $id = $postData["id"];
  $tableName = $postData["tableName"];

  
  // Connect to the database
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "aviakompanija";
  $conn = mysqli_connect($host, $user, $password, $database,3308);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
}

function generateSQL($table, $id) {
  $queryArray = [];
  

if ($table == 'skrydziai') {
  $queryArray = ["SELECT lektuvai.LektuvoKodas, lektuvai.Modelis, lektuvai.SkrydzioAtstumas, lektuvai.Statusas FROM $table JOIN lektuvai ON $table.Lektuvas = lektuvai.LektuvoKodas WHERE $table.SkrydzioNumeris = $id",
  "SELECT pilotai.PilotoKodas, pilotai.Vardas, pilotai.Pavarde FROM $table JOIN pilotai ON $table.PilotasKapitonas = pilotai.PilotoKodas WHERE $table.SkrydzioNumeris = $id",
  "SELECT pilotai.PilotoKodas, pilotai.Vardas, pilotai.Pavarde FROM $table JOIN pilotai ON $table.PilotasPagalbinis = pilotai.PilotoKodas WHERE $table.SkrydzioNumeris = $id",
  "SELECT reisai.ReisoNumeris, reisai.IsvykimoOroUostas, reisai.AtvykimoOroUostas, reisai.IsvykimoLaikas, reisai.AtvykimoLaikas, reisai.Trukme FROM $table JOIN reisai ON $table.reisas = reisai.ReisoNumeris WHERE $table.SkrydzioNumeris = $id",
  "SELECT skrydziai.PakilimoData, skrydziai.NusileidimoData, skrydziai.LaisvosVietos FROM $table WHERE $table.SkrydzioNumeris = $id",
  "SELECT orouostai.Miestas, orouostai.Valstybe, orouostai.KodasIATA FROM $table INNER JOIN lektuvai ON $table.Lektuvas = lektuvai.LektuvoKodas INNER JOIN orouostai ON lektuvai.DabartineLokacija = orouostai.OroUostoKodas WHERE $table.SkrydzioNumeris = $id",
  "SELECT orouostai.Miestas, orouostai.Valstybe, orouostai.KodasIATA FROM $table INNER JOIN reisai ON $table.Reisas = reisai.ReisoNumeris INNER JOIN orouostai ON reisai.IsvykimoOroUostas = orouostai.OroUostoKodas WHERE $table.SkrydzioNumeris = $id",
  "SELECT orouostai.Miestas, orouostai.Valstybe, orouostai.KodasIATA FROM $table INNER JOIN reisai ON $table.Reisas = reisai.ReisoNumeris INNER JOIN orouostai ON reisai.AtvykimoOroUostas = orouostai.OroUostoKodas WHERE $table.SkrydzioNumeris = $id",
  
];
}
  return $queryArray;
}

$queryArray = generateSQL($tableName,$id);

// Create an array to store the query results
$queryResults = array();

// Iterate through the query array
foreach ($queryArray as $query) {
  // Execute the query
  $result = mysqli_query($conn, $query);

  // Check if the query execution was successful
  if ($result) {
    // Create an array to store the result data
    $queryResult = array();

    // Fetch the data from the result set
    while ($row = mysqli_fetch_assoc($result)) {
      // Add the row to the query result array
      $queryResult[] = $row;
    }

    // Add the query result array to the query results array
    $queryResults[] = $queryResult;
  } else {
    // Query execution failed
    echo "Error: " . mysqli_error($conn);
  }
}

// Convert the query results array to JSON
$jsonQueryResults = json_encode($queryResults);

// Send the JSON response back to JavaScript
echo $jsonQueryResults;
// Close the database connection
mysqli_close($conn);

  ?>