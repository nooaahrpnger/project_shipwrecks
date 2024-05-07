
<?php

header('Content-Type: application/json');
require_once "../db_credentials.php";
$conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage für die Quizergebnisse
$sql = "SELECT dtUsername, dtQuizResults FROM shipwrecks_quiz JOIN shipwrecks_Users ON fiUser = idUser ORDER BY dtQuizResults DESC";

// SQL-Abfrage ausführen
$result = $conn->query($sql);

// Array für die Quizergebnisse 
$data = array();

// Quizergebnisse aus der Datenbank abrufen und in das Array hinzufügen
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}


header('Content-Type: application/json');

// Quizergebnisse als JSON ausgeben
echo json_encode($data);

// Verbindung schließen
$conn->close();
?>
