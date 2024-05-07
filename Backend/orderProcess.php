<?php
    session_start();

    define("DB_HOST", "92.42.47.76");
    define("DB_USER", "webap_project");
    define("DB_PW", "webap_123");
    define("DB_NAME", "webap_shipwrecks");

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    if (!$dbc) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    $fiUser = $_SESSION["userID"];
    
    if (!empty($cart)) 
    {
        $totalAmount = 0;

        foreach ($cart as $productId => $quantity) 
        {
            $query = "SELECT * FROM shipwrecks_Items WHERE idItem = $productId";
            $result = mysqli_query($dbc, $query);

            if ($result && mysqli_num_rows($result) > 0) 
            {
                $item = mysqli_fetch_assoc($result);

                $itemPrice = $item['dtPrice'];
                $subtotal = $itemPrice * $quantity;

                $totalAmount += $subtotal;

                $newStock = $item['dtStockQuantity'] - $quantity;
                $updateStock = "UPDATE shipwrecks_Items SET dtStockQuantity = $newStock WHERE idItem = $productId";
                mysqli_query($dbc, $updateStock);

                $orderInsert = "INSERT INTO shipwrecks_Orders ( itemID, dtQuantity, dtTotalPrice, fiUser) VALUES ( $productId, $quantity, $subtotal, $fiUser)";
                mysqli_query($dbc, $orderInsert);
            }
        }
        echo "Order processed. Total: $$totalAmount";
        header('Location: ../index.php?page=homepage');
    }
    unset($_SESSION['cart']);

    mysqli_close($dbc);
?>
