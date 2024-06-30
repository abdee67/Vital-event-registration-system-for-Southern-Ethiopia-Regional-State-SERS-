<?php
	require '../connect.php';
	if (isset($_GET['ZoneNum'])) {
		$zonNum=$_GET['ZoneNum'];

		   $deletequery="DELETE  FROM zone WHERE num='$zonNum'";
		   $deleteresult=mysqli_query($con,$deletequery);
	     	if ($deleteresult) {
			header("location:view-zone.php");
	      	}
	     	else{
			echo "some error happened check again";
		}

	}
?>
