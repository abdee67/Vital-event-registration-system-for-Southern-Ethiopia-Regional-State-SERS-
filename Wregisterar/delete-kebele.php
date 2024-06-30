<?php
	

	require '../connect.php';
	if (isset($_GET['DelKeb'])) {

		
		$KebNum=$_GET['DelKeb'];

		#GET WOREDA AND ZONE CODE
		   $ZCode=$_SESSION['zonecode'];
     	   $WCode=$_SESSION['woredacode'];

		$deletequery="DELETE  FROM kebele WHERE num='$KebNum'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:view-kebele.php");
		}
		else{
			echo "some error happened check again";
		}

	}
?>