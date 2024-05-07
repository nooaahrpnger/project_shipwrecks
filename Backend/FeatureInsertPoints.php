<?php
require_once "db_credentials.php";

// Überprüft ob das Formular abgesendet wurde und der Button mit dem Namen DATA_submit vorhanden ist

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['DATA_submit'])) {
    
    // Überprüft ob die Session user_id vorhanden ist
    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID']; 
    } else {
        echo "User konnte nicht gefunden werden. Bitte loggen Sie sich ein.";  // Wenn nicht, soll man einem sagen das kein User gefunden wurde
    }

    // Erstelle ein Array für die Antworten
    $answers = array();
    for ($i = 1; $i <= 10; $i++) {
        // Überprüft ob für jede Frage eine Antwort ausgewählt wurde
        if(!isset($_POST['q'.$i])) {
            die("Bitte beantworten Sie alle Fragen."); // Wenn nicht, kommt eine Fehlermeldung mit einer Aufforderung
        }
        $answers[] = $_POST['q'.$i]; // Fügt die Antworten des Benutzers zum Array hinzu
    }

    // Ist ein Array mit den korrekten Antworten
    $correctAnswers = array('C', 'C', 'B', 'A', 'A', 'A', 'A', 'A', 'A', 'A');
    $score = 0;
    // Vergleicht die Antworten des Benutzers mit den korrekten Antworten und berechne die Punktzahl
    for ($i = 0; $i < 10; $i++) {
        if ($answers[$i] == $correctAnswers[$i]) {
            $score++;
        }
    }

    // Fügt die Quiz-Ergebnisse in die Datenbank ein
    insertQuizResult($userID, $score);
}

// Funktion die Quiz-Ergebnisse in die Datenbank einfügt
function insertQuizResult($userID, $score){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO shipwrecks_quiz (fiuser, dtQuizResults) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $score);

    if ($stmt->execute()) {
        echo "Quiz erfolgreich abgeschlossen! Sie haben $score von 10 Punkten erreicht.";
    } else {
        echo "Fehler: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>
