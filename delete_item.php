<?php
	include("conn.php");
	$id = $_REQUEST['id'];
	$sqldelete = 'DELETE FROM `goods` WHERE ID = "'.mysqli_real_escape_string($conn, $id).'";';

	if($query = mysqli_query($conn, $sqldelete)){
		echo '<script> alert("Delete Item Successfully!);</script>';
		header("Location: home.php");
	}else{
		echo '<script> alert("Delete Item Failed!); </script>';
	}

	$conn->close();

?>