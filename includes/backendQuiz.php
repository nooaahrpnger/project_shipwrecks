<?php
require_once "db_credentials.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['DATA_submit'])) {
    $userID = $_SESSION['user_id'] ?? null; // schaut ob aktuell eine Person angemeldet ist
   
    if (!$userID) { // Wenn nicht, hört der Code auf und es wird eine Fehlermeldung aufgeben
        echo json_encode(array("error" => "Benutzer konnte nicht gefunden werden. Bitte loggen Sie sich ein."));
        exit;
    }

    $answers = array(); // Ein Array für die Antworten wird erstellt

    for ($i = 1; $i <= 10; $i++) { // überprüft die antworten 
        if (!isset($_POST['q'.$i])) {  // schaut ob keine Frage ausgelassen wurde 
            echo json_encode(array("error" => "Alle Fragen müssen beantwortet werden.")); // Wenn ja, soll eine Fehlermeldung erscheinen 
            exit; 
        }
        $answers[] = $_POST['q'.$i]; // Antworten werden in das zuvor erstellte array getan 
    }

    $correctAnswers = array('C', 'C', 'B', 'A', 'A', 'A', 'A', 'A', 'A', 'A');  // Array mit richtigen Antworten 
    $score = 0;    

   
    for ($i = 0; $i < 10; $i++) {  
        if ($answers[$i] == $correctAnswers[$i]) {   // überprüft antworten mit Lösungen
            $score++;
        }
    }

    
    insertQuizResult($userID, $score);  // Funktion für das einfügen in die Datenbank 
}

function insertQuizResult($userID, $score) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME); 

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

   
    $stmt = $conn->prepare("INSERT INTO shipwrecks_quiz (fiUser, dtQuizResults) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $score); 

    if ($stmt->execute()) {
        echo json_encode(array("success" => "Quiz erfolgreich abgeschlossen! Sie haben $score von 10 Punkten erreicht."));
    } else {
        echo json_encode(array("error" => "Fehler beim Einfügen des Quizergebnisses: " . $stmt->error));
    }

    // Verbindung schließen
    $stmt->close();
    $conn->close();
}
?>
