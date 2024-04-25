<?php
    require_once 'db_credentials.psp';


    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
    header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept");
    header('Content-Type: application/json');


    if(isset($_GET['functionType'])) {
        exit;
    }

    $dbLink = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);





    function Update(){
        $update = "SELEC ";
    }






?>