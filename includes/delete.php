<?php
 function deleteQuery($pTable, $pId){
    $deleteQuery = "DELETE  FROM $pTable WHERE id = '$pId'";
    echo "Die Tabelle würder erfolgreich gelöscht!";
 }
