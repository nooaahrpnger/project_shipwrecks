<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $loginName = $_POST['SIGNIN_loginName'];
        $password = $_POST['SIGNIN_password'];
        $email = $_POST['SIGNIN_email'];
        $accountType = "user";
        $quizResults = 0;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        require_once "../db_credentials.php";
        $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO shipwrecks_Users (dtUsername, dtEmail, dtPassword, dtAccountType) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $loginName, $email, $hashedPassword, $accountType);

        if ($stmt->execute()) 
        {
            echo "Datensatz erfolgreich eingefügt. ";
            $idUser = $stmt->insert_id;

            $stmtQuiz = $conn->prepare("INSERT INTO shipwrecks_quiz (fiUser, dtQuizResults) VALUES (?, ?)");
            $stmtQuiz->bind_param("ii", $idUser, $quizResults);

            if ($stmtQuiz->execute()) 
            {
                echo "Benutzer erfolgreich zum Quiz hinzugefügt.";
            } 
            else 
            {
                echo "Fehler beim Hinzufügen des Benutzers zum Quiz: " . $stmtQuiz->error;
            }

            $stmtQuiz->close();
        } 
        else 
        {
            echo "Fehler beim Einfügen des Datensatzes: " . $stmt->error;
        }
        
        $stmt->close();
        $conn->close();
    }
?>
