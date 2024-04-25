<?php
require_once "db_credentials.php";
include_once "quiz.php";

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['DATA_submit'])) {
    // Assuming user_id is stored in session
    if(isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id']; 
    } else {
        echo "User konnte nicht gefunden werden. Bitte loggen Sie sich ein.";
    }

    // Process quiz answers and calculate score
    $answers = array();
    for ($i = 1; $i <= 10; $i++) {
        $answers[] = $_POST['q'.$i];
    }

    $correctAnswers = array('C', 'C', 'B', 'A', 'A', 'A', 'A', 'A', 'A', 'A');
    $score = 0;
    for ($i = 0; $i < 10; $i++) {
        if ($answers[$i] == $correctAnswers[$i]) {
            $score++;
        }
    }

    // Insert quiz result into database
    insertQuizResult($userID, $score);
}

function insertQuizResult($userID, $score){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO shipwrecks_quiz (fiuser, dtQuizResults) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $score);

    if ($stmt->execute()) {
        echo "Quiz successfully completed! You scored $score out of 10.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>
