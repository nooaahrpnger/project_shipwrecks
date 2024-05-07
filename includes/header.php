<div class="logo">
    <h1>Shipwrecks</h1>
</div>
<script src="https://kit.fontawesome.com/95ad3152a3.js" crossorigin="anonymous"></script>
<nav>
    <ul>
        <li><a href="index.php?page=includes/homepage.php">Home</a></li>
        <li><a href="index.php?page=includes/quiz.html">Quiz</a></li>
        <li><a href="index.php?page=includes/searchShip.html">Search</a></li>
        <li><a href="index.php?page=includes/Shop/shop.html"><i class="fa-solid fa-shop"></i></a></li>
        
        <?php
        if(isset($_SESSION["LOGIN_user"]))
        {
            ?>
            <li><a href="index.php?page=includes/Shop/checkout.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <li><a href="index.php?page=includes/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            <li> <?php $_SESSION["LOGIN_user"] ?> </li>
            <?php
        }
        else
        {
            ?>
                <li><a href="index.php?page=includes/register.html">Register</a></li>
                <li><a href="index.php?page=includes/login.html">Login</a></li>
            <?php
        }
        ?>
    </ul>
</nav>
