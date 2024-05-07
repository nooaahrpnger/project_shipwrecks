<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <h1>Cart</h1>
    <ul>
        <?php
        session_start();
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId) {
                // Output the product details or retrieve them from the database
                echo "<li>Product ID: $productId</li>";
            }
        } else {
            echo "<li>Your cart is empty</li>";
        }
        ?>
    </ul>
    <form action="checkout.php" method="post">
        <button type="submit">Buy</button>
    </form>
</body>
</html>
