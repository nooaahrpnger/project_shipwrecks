<?php
require_once "db_credentials.php";

// Überprüfen, ob ein POST-Request vorliegt und ob der Submit-Button für das Quiz gedrückt wurde
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['DATA_submit'])) {
    
    // Überprüfen, ob ein Benutzer angemeldet ist
    if(isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id']; // Benutzer-ID aus der Session holen
    } else {
        echo json_encode(array("error" => "Benutzer konnte nicht gefunden werden. Bitte loggen Sie sich ein."));
        exit; // Die Ausführung beenden, wenn kein Benutzer angemeldet ist
    }

    $answers = array();
    // Die Antworten des Benutzers aus dem POST-Array holen und in das $answers-Array speichern
    for ($i = 1; $i <= 10; $i++) {
        if(!isset($_POST['q'.$i])) {
            echo json_encode(array("error" => "Alle Fragen müssen beantwortet werden."));
            exit; // Die Ausführung beenden, wenn nicht alle Fragen beantwortet wurden
        }
        $answers[] = $_POST['q'.$i];
    }

    // Korrekte Antworten für die Fragen
    $correctAnswers = array('C', 'C', 'B', 'A', 'A', 'A', 'A', 'A', 'A', 'A');
    $score = 0;
    // Die Antworten des Benutzers mit den korrekten Antworten vergleichen und die Punktzahl berechnen
    for ($i = 0; $i < 10; $i++) {
        if ($answers[$i] == $correctAnswers[$i]) {
            $score++;
        }
    }

    // Die Funktion aufrufen, um das Quizergebnis in die Datenbank einzufügen
    insertQuizResult($userID, $score);
}

// Funktion zum Einfügen des Quizergebnisses in die Datenbank
function insertQuizResult($userID, $score){
    // Neue Verbindung zur Datenbank herstellen
    $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

    // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Vorbereitung des SQL-Statements für das Einfügen des Quizergebnisses in die Datenbank
    $stmt = $conn->prepare("INSERT INTO shipwrecks_quiz (fiuser, dtQuizResults) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $score); // Binden der Parameter an das SQL-Statement

    // Ausführen des vorbereiteten Statements
    if ($stmt->execute()) {
        echo json_encode(array("success" => "Quiz erfolgreich abgeschlossen! Sie haben $score von 10 Punkten erreicht."));
    } else {
        echo json_encode(array("error" => "Fehler beim Einfügen des Quizergebnisses: " . $stmt->error));
    }

    // Statement schließen
    $stmt->close();
    // Verbindung schließen
    $conn->close();
}

?>
