<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $loginName = $_POST['SIGNIN_loginName'];
    $password = $_POST['SIGNIN_password'];
    $email = $_POST['SIGNIN_email'];
    $accountType = "Admin";

    require_once "../db_credentials.php";
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO shipwrecks_Users (dtUsername, dtEmail, dtPassword, dtAccountType) VALUES ('$loginName', '$email', '$password', '$accountType')";

    if (mysqli_query($conn, $sql)) 
    {
        echo "Datensatz erfolgreich eingefügt.";
    } 
    else 
    {
        echo "Fehler beim Einfügen des Datensatzes: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
