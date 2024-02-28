<?php

echo "<form mehtod='get'>
        <label>insert date</label>
        <input id='wreckDate' type='text'></input>
        <label>insert name</label>
        <input id='wreckDate' type='text'></input>
        <label>insert data</label>
        <input id='wreckDate' type='text'></input>";

require_once "../db_credentials.php";

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
mysqli_set_charset($dbc, "utf8");

// SQL-Abfrage ausführen, um alle Daten aus der Datenbank abzurufen
$getData = "SELECT * FROM webap_shipwrecks";
$result = mysqli_query($dbc, $getData);


mysqli_close($dbc);

?>
        
