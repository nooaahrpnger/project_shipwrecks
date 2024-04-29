<?php
    session_start();

    require_once "includes/db_credentials.php";
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    if (!$dbc)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    echo '<h1>Checkout</h1>';
    if (!empty($cart)) 
    {
        echo '<ul>';
        foreach ($cart as $productId => $quantity) 
        {
            $query = "SELECT * FROM shipwrecks_Items WHERE idItem = $productId";
            $result = mysqli_query($dbc, $query);

            if ($result && mysqli_num_rows($result) > 0) 
            {
                $item = mysqli_fetch_assoc($result);
                echo '<li>';
                echo '<p>Item: ' . $item['dtItemName'] . '</p>';
                echo '<p>Quantity: ' . $quantity . '</p>';
                echo '</li>';
            }
        }
        echo '</ul>';

        echo '<form action="includes/Shop/orderProcess.php" method="POST">';
        echo '<button type="submit">Purchase</button>';
        echo '</form>';
    } 
    else 
    {
        echo 'Your cart is empty.';
    }

    mysqli_close($dbc);
?>
