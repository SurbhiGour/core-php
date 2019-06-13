<?php
 
 include "config.php";
	
	
    $name=$_POST['name'];
    $email=$_POST['email'];

    $password=$_POST['password'];
    $phone_no=$_POST['phone_no'];

    $dob=$_POST['dob'];

    

	$sql = mysqli_query($connection,"INSERT INTO `user` (`name`,`email`,`password`,`phone_no`,`dob`) VALUES ('$name','$email','$password','$phone_no','$dob')")or die(mysqli_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysqli_error($connection);
		}



?>