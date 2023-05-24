<?php 
$Sent_ID = $_POST['id'];
$Table_Name = $_POST['table'];

if ($Table_Name == "darbuotojai") {
  $sql = "DELETE FROM $Table_Name WHERE DarbuotojoKodas = $Sent_ID";
}

if ($Table_Name == "pilotai") {
  $sql = "DELETE FROM $Table_Name WHERE PilotoKodas = $Sent_ID";
}

if ($Table_Name == "lektuvai") {
  $sql = "DELETE FROM $Table_Name WHERE LektuvoKodas = $Sent_ID";
}

if ($Table_Name == "keleiviai") {
  $sql = "DELETE FROM $Table_Name WHERE KeleivioKodas = $Sent_ID";
}

if ($Table_Name == "orouostai") {
  $sql = "DELETE FROM $Table_Name WHERE OroUostoKodas = $Sent_ID";
}

if ($Table_Name == "bilietai") {
  $sql = "DELETE FROM $Table_Name WHERE BilietoNumeris = $Sent_ID";
}

if ($Table_Name == "skrydziai") {
  $sql = "DELETE FROM $Table_Name WHERE SkrydzioNumeris = $Sent_ID";
}
if ($Table_Name == "bagazai") {
  $sql = "DELETE FROM $Table_Name WHERE BagazoID = $Sent_ID";
}
if ($Table_Name == "reisai") {
  $sql = "DELETE FROM $Table_Name WHERE ReisoNumeris = $Sent_ID";
}
if ($Table_Name == "registracijos") {
  $sql = "DELETE FROM $Table_Name WHERE RegistracijosID = $Sent_ID";
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
  echo "Data was deleted successfuly";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>