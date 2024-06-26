<!-- Xavier Hoffmann -->
<?php
session_start();
?>
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
        <li><a href="index.php?page=frontend_homepage"><i class="fa-solid fa-house"></i></a></li>
        <li><a href="index.php?page=quizRanking"><i class="fa-solid fa-ranking-star"></i></a></li>
        <li><a href="index.php?page=statics"><i class="fa-solid fa-chart-simple"></i></a></li>
        <li><a href="index.php?page=calendar"><i class="fa-solid fa-calendar"></i></a></li>
        <li><a href="index.php?page=country"><i class="fa-solid fa-anchor"></i></a></li>
        <li><a href="index.php?page=quiz"><i class="fa-solid fa-question"></i></a></li>
        <li><a href="index.php?page=searchShip_Joe"><i class="fa-solid fa-magnifying-glass"></i></a></li>
        <li><a href="index.php?page=shop"><i class="fa-solid fa-shop"></i></a></li>
        
        <?php
        if (isset($_SESSION["LOGIN_user"])) 
        {
            $cart_count = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $productId => $quantity) 
                {
                    $cart_count += $quantity;
                }
            }
            ?>
            <li><a href="index.php?page=checkout"><i class="fa-solid fa-cart-shopping"></i><span class="cart-count"><?php echo $cart_count; ?></span></a></li>
            <li><a href="index.php?page=editUser_Joe"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="index.php?page=logout"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            <li><?php echo $_SESSION["LOGIN_user"]; ?></li>
            <?php
        } else {
            ?>
                <li><a href="index.php?page=register"><i class="fa-regular fa-address-card"></i></a></li>
                <li><a href="index.php?page=login"><i class="fa-solid fa-right-to-bracket"></i></a></li>
            <?php
        }
        ?>
    </ul>
</nav>
