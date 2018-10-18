<?php
session_start();

$username = $_SESSION['id'];
$cart_name = $username."_cart";

if(isset($_COOKIE[$cart_name])){
    setcookie($cart_name, "", time() - 3600);
    header("location: home.php");
}

?>