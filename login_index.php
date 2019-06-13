<?php
session_start(); 
include "config.php";

        $error = "email/password incorrect"; 
		$username=$_POST['username'];
		$password=$_POST['password'];

		  $query1 = mysqli_query($connection,"SELECT * FROM `user` WHERE email='$username' AND password='$password'")or die(mysqli_error($connection));
		$row1=mysqli_fetch_array($query1);
		$cnt1 = mysqli_num_rows($query1);
  		$admin=$row1['type'];
		$id=$row1['id'];
		
	
		if($cnt1==1)
		{
			
				$_SESSION['user_id']=$row1['id'];
	            $_SESSION['name']=$row1['name'];
				echo "1";
			
		}
		else
		{
			echo "3";
		}
		
		




?>