<?php
	require '../connect.php';
	if (isset($_GET['DelID'])) {

		
		$username=$_GET['DelID'];

		#GET WOREDA AND ZONE CODE
		   $ZCode=$_SESSION['zonecode'];
     	   $WCode=$_SESSION['woredacode'];

		   $deletequery="DELETE  FROM memberuser WHERE name='$username'";
		   $deleteresult=mysqli_query($con,$deletequery);
	     	if ($deleteresult) {
			header("location:view-woreda-user.php");
	      	}
	     	else{
			echo "some error happened check again";
		}

	}
?>
