<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Cecchini Thierry">
    <script src="jquery/jquery.js"></script>

    <title>Shipwrecked</title>
</head>
<body style="margin: 0px;">
<?php
    /*
    echo "<header >";
            include_once "navigation.php";
    echo "</header>";
    */

    /*---------------Navigation---------------*/

    echo "<main>";
    if(isset($_GET["modell"])){
        $selectedCar = $_GET["modell"];
    }

    $page = "";
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    if ($page == "XYZ") {
        include_once "includes/XYZ.php";
    }else{
        include_once "includes/login.html";
    }
    echo "</main>";


    /*----------------Footer--------------*/
    echo "<br><div id='logo'><br>";
        // echo "<img src='shipwreck logo' style='width: 7%; height: 7%; margin: auto;'><br><br>";
    echo "</div><br>";
    echo "<footer>";
            //include_once "includes/footer.php";
    echo "</footer>";

?>



</body>
</html>

