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
    
<?php include("Frontend/header.html"); ?>

<div class="container">
    <?php
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $file =  "Frontend/" . $_GET['page'] . ".html";
        if(file_exists($file)) {
            include($file);
        } else {
            echo "<p>Page not found</p>";
        }
    } else {
        include("Frontend/homepage.html");
    }
    ?>
</div>

</body>
<?php
include('Frontend/footer.html');
?>
</html>
