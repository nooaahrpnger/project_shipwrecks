<?php
require_once "db_credentials.php";
include_once "Backend/FeatureRanking.php";


if ($result->num_rows > 0) {
  
    echo "<h1>Quiz Rangliste</h1>";
    echo "<table id='leaderboard-table' border=2px>";
    echo "<tr><th>Platzierung</th><th>Benutzername</th><th>Punkte</th></tr>";
    $rank = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>$rank</td><td>" . $row["dtUsername"] . "</td><td>" . $row["dtQuizResults"] . "</td></tr>";
        $rank++;
    }
    echo "</table>";
} else {
    echo "Keine Daten gefunden.";
}



$conn->close();
?>
