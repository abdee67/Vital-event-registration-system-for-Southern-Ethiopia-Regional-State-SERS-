<?php
	require '../connect.php';
	if (isset($_GET['UseN'])) {

		   $UserName=$_GET['UseN'];

		   $deletequery="DELETE  FROM memberuser WHERE name='$UserName'";
		   $deleteresult=mysqli_query($con,$deletequery);
	     	if ($deleteresult) {
			header("location:view-zone-user.php");
	      	}
	     	else{
			echo "some error happened check again";
		}

	}
?>