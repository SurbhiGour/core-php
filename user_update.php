<?php
 
 include "config.php";
	
	$rec_id=$_POST['rec_id'];
    $ename=$_POST['ename'];
    $eemail=$_POST['eemail'];
    $epassword=$_POST['epassword'];
    $ephone_no=$_POST['ephone_no'];
    $edob=$_POST['edob'];
   
		$sql = mysqli_query($connection,"UPDATE `user` SET `name`='$ename',`email`='$eemail',`password`='$epassword',`phone_no`='$ephone_no',`dob`='$edob' WHERE `id`='$rec_id'")or die(mysqli_error($connection));
				
				if($sql==true)
				{
					echo "1";
				}
				else{
					echo "2".mysqli_error($connection);
				}

	

?>