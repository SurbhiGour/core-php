<?php 
	include "config.php";
	$id = $_POST['id'];
	
	$sql =mysqli_query($connection,"SELECT * FROM user WHERE id='$id'")or die(mysqli_error($connection));
    $data=mysqli_fetch_array($sql);
   
    if($sql==true)
    {
    	echo json_encode($data); //default funtion of json in php for generating a json tree
    }else{
    	echo "Error".mysqli_error($connection);
    }
        	
?>