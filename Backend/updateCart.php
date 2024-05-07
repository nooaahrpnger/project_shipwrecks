<?php
session_start();

$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

if (isset($_SESSION['cart'][$productId])) 
{
    $_SESSION['cart'][$productId] = $quantity;
} else 
{

}

?>