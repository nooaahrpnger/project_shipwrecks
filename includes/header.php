<div class="logo">
    <h1>Shipwrecks</h1>
</div>
<nav>
    <ul>
        <li><a href="index.php?page=includes/homepage.php">Home</a></li>
        <li><a href="index.php?page=includes/quiz.html">Quiz</a></li>
        <li><a href="index.php?page=includes/searchShip.html">Search</a></li>
        <li><a href="index.php?page=includes/Shop/shop.html">Shop</a></li>
        
        <?php
        if(isset($_SESSION["LOGIN_user"]))
        {
            ?>
            <li><a href="index.php?page=includes/Shop/checkout.php">Cart</a></li>
            <li><a href="index.php?page=includes/logout.php">Logout</a></li>
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
