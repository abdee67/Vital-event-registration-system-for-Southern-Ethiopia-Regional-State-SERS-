<?php
	require '../connect.php';
	if (isset($_GET['Del'])) {

		$BirthNum=$_GET['Del'];
		$deletequery="DELETE  FROM birthevent WHERE eventnumber='$BirthNum'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:birth-view.php");
		}
		else{
			echo "some error happened check again";
		}
	}
?>