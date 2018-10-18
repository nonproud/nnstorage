<?php

session_start();
include("conn.php");

$username = $_SESSION['id'];
$cart_name = $username."_cart";

$pName = $_POST["pName"];
$pid = $_POST['pid'];
$pPrice =$_POST["pPrice"];
$pQuantity = $_POST["pQuantity"];
$pDes = $_POST["pDes"];
$pImg = $_POST["pImg"];


if(isset($_COOKIE[$cart_name])){
  $cookie_data = stripslashes($_COOKIE[$cart_name]);
  $cart_data = json_decode($cookie_data, true);
}else {
  $cart_data = array();
}

$item_id_list = array_column($cart_data, 'id');

 if(in_array($pid, $item_id_list)){

  foreach($cart_data as $keys => $values){
   if($cart_data[$keys]["id"] == $pid){
    $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] + $pQuantity;
   }
  }
 }else{
    $item_array = array(
        'id' => $pid,
        'name'   => $pName,
        'price'  => $pPrice,
        'quantity'  => $pQuantity,
        'describtion'  => $pDes,
        'image'  => $pImg
       );
       $cart_data[] = $item_array;
}

$item_data = json_encode($cart_data);
setcookie($cart_name, $item_data, time() + 86400);
echo '<script> alert("Add to '.$pName.' cart Success!");  </script>';
header("Location: home.php");
?>