<?php
    define("DB_HOST","92.42.47.76");
    define("DB_USER","webap_project");
    define("DB_PW","webap_123");
    define("DB_NAME","webap_shipwrecks");
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    mysqli_set_charset($dbc, "utf8");

    if (!$dbc) {
        die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }

    $getProducts = "SELECT * FROM shipwrecks_Items";
    $result = mysqli_query($dbc, $getProducts);

    $products = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    mysqli_close($dbc);

    header('Content-Type: application/json');
    echo json_encode($products);
?>