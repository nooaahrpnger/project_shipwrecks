<?php
require_once "db_credentials.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT dtUsername, dtQuizResults FROM shipwrecks_quiz JOIN shipwrecks_Users ON fiUser = idUser ORDER BY dtQuizResults DESC";
$result = $conn->query($sql);

$data = array(); 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; 
    }
}


header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
