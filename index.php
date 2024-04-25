<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipwrecks</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    
<?php include("header.php"); ?>

<div class="container">
    <?php
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $file =  "includes/" . $_GET['page']. ".html";
        if(file_exists($file)) {
            include($file);
        } else {
            echo "<p>Page not found</p>";
        }
    } else {
        include("hompage.php");
    }
    ?>
</div>

</body>
<?php
include('footer.php');
?>
</html>
