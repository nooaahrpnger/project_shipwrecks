<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Überprüfen, ob die benötigten POST-Variablen gesetzt sind
        if (isset($_POST['INPUT_username']) && isset($_POST['INPUT_password'])) {
            // Hier kannst du die Benutzeranmeldeinformationen validieren, z.B. in einer Datenbank
            
            // Beispiel: Überprüfen, ob der Benutzername und das Passwort korrekt sind
            $username = $_POST['INPUT_username'];
            $password = $_POST['INPUT_password'];
            
            // Annahme: Einfaches hartcodiertes Vergleichen mit Benutzername "admin" und Passwort "password"
            if ($username === 'admin' && $password === 'password') {
                // Anmeldung erfolgreich
                echo "Anmeldung erfolgreich!";
                // Führe hier weitere Aktionen durch, z.B. Setzen von Sitzungsvariablen oder Weiterleiten zu einer anderen Seite
            } else {
                // Anmeldung fehlgeschlagen
                echo "Falscher Benutzername oder Passwort.";
            }
        } else {
            // Fehler: Nicht alle erforderlichen POST-Variablen wurden gesendet
            echo "Fehler: Nicht alle erforderlichen Felder wurden ausgefüllt.";
        }
    } else {
        // Fehler: Das Formular wurde nicht über POST-Methode gesendet
        echo "Fehler: Das Formular wurde nicht korrekt gesendet.";
    }
?>