<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the data sent from JavaScript
  $postData = json_decode(file_get_contents('php://input'), true);
  $id = $postData["id"];
  $tableName = $postData["tableName"];
  $values = $postData["values"];

  // Connect to the database
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "aviakompanija";
  $conn = mysqli_connect($host, $user, $password, $database, 3308);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get the column names
  $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = '$tableName'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Fetch column names
    $columnNames = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $columnNames[] = $row['COLUMN_NAME'];
    }

    // Generate the SQL UPDATE statement
    $sql = "UPDATE $tableName SET ";
    foreach ($columnNames as $index => $columnName) {
      $value = $values[$index];
      $sql .= "$columnName = '$value', ";
    }
    $idColumnName = array_shift($columnNames);
    $sql = rtrim($sql, ', '); // Remove the trailing comma and space
    $sql .= " WHERE $idColumnName = $id"; // Assuming your row ID column is named 'id'

    // Execute the SQL
    if ($conn->query($sql) === TRUE) {
      $response = array(
        'status' => 'success',
        'message' => 'Įrašas buvo sėkmingai redaguotas'
      );
    } else {
      $response = array(
        'status' => 'error',
        'message' => 'Klaida redaguojant įrašą: ' . $conn->error
      );
    }

    // Send the JSON response back to JavaScript
    header('Content-Type: application/json');
    echo json_encode($response);
  } else {
    echo "Klaida: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>