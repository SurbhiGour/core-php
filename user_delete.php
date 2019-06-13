<?php 
include "config.php";
	
	$id = $_POST['id'];

	$sql = mysqli_query($connection,"DELETE FROM user WHERE id='$id'")or die(mysqli_error($connection));
	if($sql==true)
	{
		echo "1";
	}
	else{
		echo "2";
	}

 ?>