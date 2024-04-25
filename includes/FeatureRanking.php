<?php


$conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT dtUsername, dtQuizResults FROM shipwrecks_quiz JOIN shipwrecks_Users ON fiuser = idUser ORDER BY dtQuizResults DESC";
$result = $conn->query($sql);

?>
