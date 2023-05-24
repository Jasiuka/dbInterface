<?php
    $Table_Name = $_POST['table'];
    $Criteria = $_POST['criteria'];
    $Column = $_POST['column'];

    $sql = "SELECT * FROM $Table_Name WHERE $Column LIKE '%$Criteria%'";

        // connect to DB
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "aviakompanija";
    $conn = mysqli_connect($host, $user, $password, $database, 3308);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, $sql);
    $data = array(); // initialize an empty array to store the search results
    if (mysqli_num_rows($result) > 0) {
        // Store the search results in the $data array
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    // Close the database connection
    mysqli_close($conn);

    // Encode the $data array as a JSON object and send it back to the frontend
    header('Content-Type: application/json');
    echo json_encode($data);

    ?>
