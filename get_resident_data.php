<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bmis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']); // Sanitize input to avoid SQL injection
$sql = "SELECT * FROM tbl_resident WHERE id_resident = $id"; // Use correct table name and field names
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row); // Return resident data as JSON
} else {
    echo json_encode(['error' => 'No data found']);
}

$conn->close();
?>
