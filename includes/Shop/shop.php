<?php 
    // Verbindung herstellen
    include_once "../db_credentials.php";
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    mysqli_set_charset($dbc, "utf8");

    // Verbindung überprüfen
    if (!$dbc) {
        die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }

    // SQL-Abfrage, um Daten abzurufen
    $getProducts = "SELECT * FROM shipwrecks_Items";
    $result = mysqli_query($dbc, $getProducts);

    // Anzahl der Spalten, die pro Zeile angezeigt werden sollen
    $columns_per_row = 4;
    $column_count = 0;

    // Tabelle starten
    echo "<table border='1'><tr>";

        // Daten ausgeben
        // Daten ausgeben
        while ($row = mysqli_fetch_assoc($result)) {
            // Neue Zeile starten, wenn $column_count gleich 0
            if ($column_count == 0) {
                echo "<tr>";
            }
            // Zelle öffnen
            echo "<td>";
    
            // Bild anzeigen
            echo "<img src='images/papasHunter.png' style='width:350px; height:200px%;'><br>";
    
            // Name und Preis anzeigen
            echo $row['dtItemName'] . "<br>";
            echo "$" . $row['dtPrice'];
    
            // Zelle schließen
            echo "</td>";
    
            // Zähler erhöhen
            $column_count++;
    
            // Neue Zeile starten, wenn $column_count gleich $columns_per_row ist
            if ($column_count == $columns_per_row) {
                echo "</tr>";
                $column_count = 0; // Zähler zurücksetzen
            }
        }

    // Tabelle schließen
    echo "</tr></table>";

    // Verbindung schließen
    mysqli_close($dbc);
?>