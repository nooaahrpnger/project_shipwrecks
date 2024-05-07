<div class="logo">
    <h1>Shipwrecks</h1>
</div>
<script src="https://kit.fontawesome.com/95ad3152a3.js" crossorigin="anonymous"></script>
<style>

.cart-count 
{
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 2px 5px;
    border-radius: 50%;
    font-weight: bold;
}

li 
{
    position: relative;
}

</style>
<nav>
    <ul>
        <li><a href="index.php?page=includes/homepage.php">Home</a></li>
        <li><a href="index.php?page=includes/quiz.html">Quiz</a></li>
        <li><a href="index.php?page=includes/searchShip.html">Search</a></li>
        <li><a href="index.php?page=includes/Shop/shop.html"><i class="fa-solid fa-shop"></i></a></li>
        
        <?php
        if (isset($_SESSION["LOGIN_user"])) {
            $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
            ?>
            <li><a href="index.php?page=includes/Shop/checkout.php"><i class="fa-solid fa-cart-shopping"></i><span class="cart-count"><?php echo $cart_count; ?></span></a></li>
            <li><a href="index.php?page=includes/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            <li><?php echo $_SESSION["LOGIN_user"]; ?></li>
            <?php
        } else {
            ?>
                <li><a href="index.php?page=includes/register.html"><i class="fa-regular fa-address-card"></i></a></li>
                <li><a href="index.php?page=includes/login.html"><i class="fa-solid fa-right-to-bracket"></i></a></li>
            <?php
        }
        ?>
    </ul>
</nav>

