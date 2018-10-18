<!DOCTYPE html>
<html>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
        }
        th {
            text-align: left;
        }
    </style>
    <title>Cart @ N&N Storage</title>
    <body>
        <a href="home.php">HOME </a>
        <h1> In cart </h1>
<?php
session_start();
    
$username = $_SESSION['id'];
$cart_name = $username."_cart";
$totalPrice = 0;
$amount = 0;

if(isset($_COOKIE[$cart_name])){
    $cookie_data = stripslashes($_COOKIE[$cart_name]);
    $cart_data = json_decode($cookie_data, true); ?>
    <table style="width:100%">
    <tr>
    <th>Img</th>
    <th>Name</th>
    <th>Description</th> 
    <th>Quantity</th>
    <th>Price</th>
    </tr>
    <?php foreach($cart_data as $keys => $values){
        $totalPrice += $cart_data[$keys]['quantity'] * $cart_data[$keys]['price'];
        $amount += $cart_data[$keys]['quantity'];
         ?>
    <tr>
    <th><img src="<?php echo $cart_data[$keys]['image']; ?>" style="width: 30px; height: 30px;"></th>
    <th><?php echo $cart_data[$keys]["name"]; ?></th>
    <th><?php echo $cart_data[$keys]["describtion"]; ?></th> 
    <th><?php echo $cart_data[$keys]['quantity']; ?></th>
    <th><?php echo $cart_data[$keys]['price']; ?></th>
    
    </tr>        
<?php 
    } ?>  
    </table>
    <div align="right">
        <p>Amount: <?php echo "  ".$amount."  "; ?> Total: <?php echo "  ".$totalPrice; ?> </p>
    </div>
    <div align="center">
        <a  href="checkout.php"><button> Checkout </button></a>
    </div> 
<?php
}else{ ?>
    <h2 align="center"> Empty Cart </h2>
<?php
}
?>


</body>
</html>