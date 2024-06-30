<?php
	require '../connect.php';
	if (isset($_GET['DelWor'])) {

		
		$WorNum=$_GET['DelWor'];

		#GET WOREDA AND ZONE CODE
		   $ZCode=$_SESSION['zonecode'];
     	   $WCode=$_SESSION['woredacode'];

		   $deletequery="DELETE  FROM woreda WHERE num='$WorNum'";
		   $deleteresult=mysqli_query($con,$deletequery);
	     	if ($deleteresult) {
			header("location:view-woreda.php");
	      	}
	     	else{
			echo "some error happened check again";
		}

	}
?>
