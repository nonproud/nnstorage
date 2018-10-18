<?php
	include("conn.php");

	$pName = $_POST['pName'];
	$pPrice = $_POST['pPrice'];
	$pDescribtion = $_POST['pDescription'];
	$pAmount = $_POST['pAmount'];
	$filename = $_FILES['imgage']['name'];
if ($_FILES['imgage']['name'] != "" ) {
    if(!move_uploaded_file($_FILES["imgage"]["tmp_name"], "./goods_img/".$_FILES["imgage"]["name"]))
      die( "Upload error with code ".$_FILES["imgage"]["error"]);
}else die("You did not specify an input file or file excedd form");


	$imagePath = "/OnlineStore/food/".$filename;

	// insert new item
	$sql_insert = 'INSERT INTO `goods`(`Name`, `Price`, `Describtion`, `Amount`,  `Image`) VALUES ("'.$pName.'",
	"'.$pPrice.'","'.$pDescribtion.'",
	"'.$pAmount.'", "'.$imagePath.'");';
	$query = mysqli_query($conn, $sql_insert);
	
	if(!$query){
		echo '<script> alert("Add new item flied!"); window.location.replace("home.php"); </script>';
	}else{
		echo '<script> alert("Add new item successfully!"); window.location.replace("home.php"); </script>';
	}
?>

