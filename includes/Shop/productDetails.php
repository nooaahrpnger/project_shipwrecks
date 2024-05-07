<?php
    define("DB_HOST","92.42.47.76");
    define("DB_USER","webap_project");
    define("DB_PW","webap_123");
    define("DB_NAME","webap_shipwrecks");

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    if (!$dbc) {
        die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }

    // Produktinformationen aus der Datenbank abrufen
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $query = "SELECT * FROM shipwrecks_Items WHERE idItem = $productId"; // Annahme: 'products' ist deine Produkttabelle
        $result = mysqli_query($dbc, $query);
        if (!$result) {
            die("Abfrage fehlgeschlagen: " . mysqli_error($dbc));
        }
        // Produktinformationen ausgeben
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo '<div class="product-container">';
                echo '<div class="product-image-container">';
                // Kleineres Bild mit Animation
                echo '<img src="includes/Shop/images/' . $row['dtImage'] . '" alt="' . $row['dtItemName'] . '" class="product-image" style="max-width: 70%; height: auto; animation: fadeIn 0.5s ease;">';
                echo '</div>';
                echo '<div class="product-info">';
                echo '<p class="product-name">' . $row['dtItemName'] . '</p>';
                echo '<p class="product-description">' . $row['dtDescription'] . '</p>';
                // Produktstock auf der rechten Seite anzeigen
                echo '<p class="product-stock">Stock: ' . $row['dtStockQuantity'] . '</p>';
                // "Add to Cart" -Button hinzufügen
                echo '<button class="add-to-cart-button">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
                echo "<hr style='color: black;'>";

            echo "<div>";
                if ($row['dtCategory'] === 'Clothing') {
                    echo "<div>";
                    echo '<img src="includes/Shop/images/sizechart.jpg" alt="Size Chart" class="size-chart" class="sizechart-image">';
                    echo "</div>";
                }
            echo "</div>";
        } else {
            echo "Produkt nicht gefunden.";
        }
    }

    // Datenbankverbindung schließen
    mysqli_close($dbc);
?>

<!-- CSS für die Fade-In-Animation -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
