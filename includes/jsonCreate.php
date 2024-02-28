<?php
/* Cross Origin erlaugben */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept");

/* Funktion zum umwandeln in JSON */

require_once "../db_credentials.php";

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
mysqli_set_charset($dbc, "utf8");

// test der datenbank verbindung
if(!$dbc){
    die("Verbindung ist fehlgeschlagen: " . mysqli_connect_error());
}

// überprüfung ob $_GET gesetzt ist
if (isset($_GET['name']) && isset($_GET['message'])) {
    $name = $_GET['name'];
    $message = $_GET['message'];

    // überprüfung ob name länger als 3 zeichen ist und die message nicht leer ist
    if (strlen($name) > 3 && !empty($message)) {

        // query zur einfügen der nachricht
        $enterMessage = "INSERT INTO WEBAP_tblMessage (dtUser, dtMessage) VALUES ('$name', '$message')";

        if (mysqli_query($dbc, $enterMessage)) {
            echo "Nachricht wurde gesendet.";
        } else {
            echo "Fehler beim Senden der Nachricht: " . mysqli_error($dbc);
        }
    } else {
        echo "Dein Username muss mindestens 4 Zeichen lang sein und deine Nachricht darf nicht leer sein.";
    }
}

// Chatverlauf abrufen und in json umwandeln
$getMessage = "SELECT * FROM WEBAP_tblMessage ORDER BY idMessage DESC"; 

$result = mysqli_query($dbc, $getMessage);

// speichere die nachricht in ein array
$savedMessages = array();

// wenn es reihen gibt, speichere sie in $row ein
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $savedMessages[] = array('name' => htmlspecialchars($row['dtUser']), 'message' => htmlspecialchars($row['dtMessage']));
    }
}

// nachricht in json angeben
echo json_encode($savedMessages);

mysqli_close($dbc);

?>
        
