<?php
/* Joe Kohnen */







session_start();



require_once '../db_credentials.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);


// Verbindung überprüfen
if ($conn->connect_error) {
    // Wenn die Verbindung fehlschlägt, Fehlermeldung anzeigen und Skriptausführung stoppen
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if (!isset($_SESSION['userID'])) {
    // Wenn keine Benutzer-ID in der Session vorhanden ist, Skriptausführung stoppen und Fehlermeldung ausgeben
    die("Benutzer nicht eingeloggt");
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Wenn die Anfrage eine POST-Anfrage ist

        // SQL-Abfrage zum Aktualisieren der Benutzerdaten vorbereiten
        $sql = "UPDATE shipwrecks_Users SET dtUsername = ?, dtEmail = ?, dtPassword = ? WHERE idUser = ?";
        $stmt = $conn->prepare($sql);
        $hash = password_hash($_POST['dtPassword'] , PASSWORD_DEFAULT);

        // Parameter an die SQL-Abfrage binden
        $stmt->bind_param("sssi", $_POST['dtUsername'], $_POST['dtEmail'], $hash, $_SESSION['userID']);

        // SQL-Abfrage ausführen
        $stmt->execute();

        // Erfolgsmeldung ausgeben
        echo json_encode(["success" => "Daten erfolgreich aktualisiert"]);
    } else {
        // Wenn die Anfrage keine POST-Anfrage ist

        // SQL-Abfrage zum Abrufen der Benutzerdaten vorbereiten
        $sql = "SELECT dtUsername, dtEmail, dtPassword FROM shipwrecks_Users WHERE idUser = ?";
        $stmt = $conn->prepare($sql);

        // Parameter an die SQL-Abfrage binden
        $stmt->bind_param("i", $_SESSION['userID']);

        // SQL-Abfrage ausführen
        $stmt->execute();

        // Ergebnis der Abfrage abrufen
        $result = $stmt->get_result();

        // Benutzerdaten aus dem Ergebnis abrufen
        $userData = $result->fetch_assoc();

        // Benutzerdaten als JSON ausgeben
        echo json_encode($userData);
    }
} catch (PDOException $e) {
    // Fehler abfangen und Fehlermeldung ausgeben
    echo json_encode(["error" => $e->getMessage()]);
}
?>
