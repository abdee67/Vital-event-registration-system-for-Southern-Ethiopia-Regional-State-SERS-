<?php
	require '../connect.php';
	if (isset($_GET['DelMarg'])) {

		$MarrgNum=$_GET['DelMarg'];
		$deletequery="DELETE  FROM marriagevent WHERE marriagenum='$MarrgNum'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:marriage-view.php");
		}
		else{
			echo "some error happened check again";
		}
	}
?>