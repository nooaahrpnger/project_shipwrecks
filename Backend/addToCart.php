<!-- Xavier Hoffmann -->
<?php
    session_start();

    if (isset($_POST['id'])) 
    {
        $productId = $_POST['id'];

        if (!isset($_SESSION['cart'])) 
        {
            $_SESSION['cart'] = [];
        }

        if (!array_key_exists($productId, $_SESSION['cart'])) 
        {
            $_SESSION['cart'][$productId] = 1;
        } 
        else 
        {
            $_SESSION['cart'][$productId]++;
        }

        echo "Product added to cart.";
    }
?>
