<?php
  session_start();
  // error_reporting(0);

  ini_set('display_errors', 0);
  include("conn.php");
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $aut_lev = $_SESSION['Aut_lev'];
  $view_all_goods_sql = 'SELECT * FROM `goods` WHERE 1';
  $query_goods = mysqli_query($conn, $view_all_goods_sql);
  $query_goods2 = mysqli_query($conn, $view_all_goods_sql);

  $username = $_SESSION['id'];
  $cart_name = $username."_cart";
  $amount_item = 0;
  $total_price = 0;
  if(isset($_COOKIE[$cart_name])){
    $cookie_data = stripslashes($_COOKIE[$cart_name]);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values){
      $amount_item++;
      $total_price += $cart_data[$keys]["quantity"] * $cart_data[$keys]["price"];
    }
  }

?>

<!DOCTYPE html>
<html>
<title>N&N Storage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="logo.png" style="width:45%;" class="w3-round"><br><br>
    <h4><b>N&N Storage</b></h4>
  </div>
  <div class="w3-bar-block">
    <p class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('search').style.display='block'"><i class="fa fa fa-search fa-fw w3-margin-right"></i>Search</p> 
    
    <?php
      if($aut_lev == NULL){
        echo '<a href="login.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Login</a>';
      }else if($aut_lev != NULL){
        if($aut_lev == "User"){ ?>
          <a href="in_cart.php" style="text-decoration: none;"><p class="w3-bar-item w3-button w3-padding" ><i class="fa fa-shopping-cart fa-fw w3-margin-right"></i>Cart <b style="color:red;"><?php echo "( ".$amount_item." )"; ?></b></p></a>
      <?php
        }else if($aut_lev == "Administrator"){ ?>
          <p class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('addItem').style.display='block'"><i class="fa fa-plus fa-fw w3-margin-right"></i>Add Item</p>
        <?php }
        echo '<p onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Welcome: '.$fname.'</p>';
        echo '<a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">Logout</a>';
      }
    
    ?>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Products</b></h1>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
  <?php
          while ($goods = mysqli_fetch_array($query_goods)) {
            $id = $goods['ID']; ?>
            <div class="w3-third w3-container">
            <div class="w3-display-container">
            <img src="<?php echo $goods['Image']; ?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b><?php echo $goods['Name'];?></b></p>
              <p><?php echo $goods['Describtion']; ?></p>
            <?php
              if($aut_lev == "Administrator"){ ?>
              <div align="center">
              <button  onclick="document.getElementById('<?php echo $id; ?>').style.display='block'">Edit</button>
              <form method="POST" action="delete_item.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit"  value="remove">
              </form>
              </div>
            <?php  
              }else if($aut_lev == "User"){ ?>
                <div align="center">
              <form method="POST" action="add_to_cart.php">
                <input type="hidden" name="pid" value="<?php echo $id; ?>">
                <input type="hidden" name="pName" value="<?php echo $goods['Name']; ?>">
                <input type="hidden" name="pPrice" value="<?php echo $goods['Price']; ?>">
                <input type="hidden" name="pDes" value="<?php echo $goods['Describtion']; ?>">
                <input type="hidden" name="pQuantity" value="1">
                <input type="hidden" name="pImg" value="<?php echo $goods['Image']; ?>">
                <input type="submit"  value="Add to cart">
              </form>
              </div>
       <?php    } ?>
             
           </div>
          </div>
          </div>
       <?php   }
          
        ?>

  </div>

  
<?php
if($aut_lev == "Administrator"){
      while($goods = mysqli_fetch_array($query_goods2)){
        $id = $goods['ID']; ?>
        <!-- Item Modal -->
       <div id="<?php echo $id; ?>" class="w3-modal">
          <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
              <i onclick="document.getElementById('<?php echo $id; ?>').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
              <h2 class="w3-wide" >Edit Product</h2>
              <form method="POST" action="update_item.php" enctype="multipart/form-data">
              <input type ="hidden" name="id" value="<?php echo $id; ?>">
                <p><input class="w3-input w3-border" type="text" placeholder="Enter Name" name="pName" value="<?php echo $goods['Name']; ?>"></p>
                <p><input class="w3-input w3-border" type="number" placeholder="Price" name="pPrice" value="<?php echo $goods['Price']; ?>"></p>
                <p><textarea class="w3-input w3-border" type="text" placeholder="Enter Desciption" name="pDescription"><?php echo $goods['Describtion']; ?></textarea></p>
                <p><input class="w3-input w3-border" type="number" placeholder="Amount" name="pAmount" value="<?php echo $goods['Amount']; ?>"></p>
                <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('<?php echo $id; ?>').style.display='none'" value="Update">
                </form>
              </div>
            </div>
          </div>
<?php     
        }
      }
?>

<?php
  if($aut_lev == "Administrator"){ 
    echo '<!-- AddItem Modal --> '; ?>
    <div id="addItem" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
          <i onclick="document.getElementById('addItem').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
          <h2 class="w3-wide" >Add New Product</h2>
          <form method="POST" action="insert_item.php" enctype="multipart/form-data">
            <p><input class="w3-input w3-border" type="text" placeholder="Enter Name" name="pName"></p>
            <p><input class="w3-input w3-border" type="number" placeholder="Price" name="pPrice"></p>
            <p><textarea class="w3-input w3-border" type="text" name="pDescription" placeholder="Enter Desciption"></textarea></p>
            <p><input class="w3-input w3-border" type="number" placeholder="Amount" name="pAmount"></p>
            <p><input class="w3-input w3-border" type="file" placeholder="Enter Image path" name="imgage"></p>
            <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('addItem').style.display='none'" value="Add Item">
          </form>
        </div>
      </div>
    </div>
  <?php   }
?>

<?php 
  if($aut_lev == "User"){?>
<div id="cart" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('cart').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide" >Cart</h2>
      <form method="GET" action="search.php">
        <p><input class="w3-input w3-border" type="text" placeholder="What you want to search?" name="wordSearch"></p>
        <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('cart').style.display='none'" value="Check out">
      </form>
    </div>
  </div>
</div>
<?php  }?>

<!-- Search Modal -->
<div id="search" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('search').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide" >NN Storage Search Engine</h2>
      <form method="GET" action="search_result.php">
        <p><input class="w3-input w3-border" type="text" placeholder="What you want to search?" name="wordSearch"></p>
        <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('search').style.display='none'" value="Search">
      </form>
    </div>
  </div>
</div>

  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html> 