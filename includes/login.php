<?php
session_start();

// Verbindung zur Datenbank herstellen
require_once "../db_credentials.php";
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);



// Überprüfen, ob die Verbindung hergestellt werden konnte
if (!$dbc) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
} else {
    echo "Verbindung zur Datenbank erfolgreich hergestellt.<br>";
}

// Überprüfen, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Überprüfen, ob die benötigten POST-Variablen gesetzt sind
    if (isset($_POST['INPUT_username']) && isset($_POST['INPUT_password'])) {
        // Benutzername aus dem Formular abrufen
        $username = $_POST['INPUT_username'];
        
        // Passwort aus der Datenbank abrufen, basierend auf dem Benutzernamen
        $queryLogin = "SELECT dtUsername, dtPassword, idUser FROM `shipwrecks_Users` WHERE dtUsername = '$username'";
        $result = mysqli_query($dbc, $queryLogin);

        if (mysqli_num_rows($result) == 1) {
            // Benutzer gefunden, Passwort überprüfen
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['dtPassword'];

            // Überprüfen, ob das eingegebene Passwort mit dem gehashten Passwort übereinstimmt
            if (password_verify($_POST['INPUT_password'], $hashed_password)) {
                // Anmeldung erfolgreich
                $_SESSION["LOGIN_user"] = $_POST["INPUT_username"];
                echo "Eingeloggt als: " . $_SESSION["LOGIN_user"];  
                
                // Führe hier weitere Aktionen durch, z.B. Setzen von Sitzungsvariablen oder Weiterleiten zu einer anderen Seite
            } else {
                // Anmeldung fehlgeschlagen
                echo "Falscher Benutzername oder Passwort.";
            }
        } else {
            // Benutzer nicht gefunden
            echo "Benutzer nicht gefunden.";
        }
    } else {
        // Fehler: Nicht alle erforderlichen POST-Variablen wurden gesendet
        echo "Fehler: Nicht alle erforderlichen Felder wurden ausgefüllt.";
    }
} else {
    // Fehler: Das Formular wurde nicht über POST-Methode gesendet
    echo "Fehler: Das Formular wurde nicht korrekt gesendet.";
}

// Verbindung zur Datenbank schließen
mysqli_close($dbc);
?>
