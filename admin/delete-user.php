<?php
	require '../connect.php';
	if (isset($_GET['UIddelete'])) {

		$UserName=$_GET['UIddelete'];
		$deletequery="DELETE  FROM memberuser WHERE name='$UserName'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:view-user.php");
		}
		else{
			echo "some error happened check again";
		}

	}
?>