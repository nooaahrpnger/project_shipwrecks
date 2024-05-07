<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipwrecks</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-3.7.1.js"></script>
</head>
<body>
<header>
    <?php include("Frontend/header.php"); ?>
</header>
<main>
    <div class="container">
        <?php
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $htmlFile =  "Frontend/" . $_GET['page'] . ".html";
            $phpFile =  "Frontend/" . $_GET['page'] . ".php";

            if (file_exists($htmlFile)) {
                include($htmlFile);
            } elseif (file_exists($phpFile)) {
                include($phpFile);
            } else {
                echo "<p>Page not found.</p>";
            }
        } else {
            include("Frontend/frontend_homepage.html");
        }
        ?>
    </div>
</main>
<footer>
    <?php include("Frontend/footer.php"); ?>
</footer>

</body>
</html>
