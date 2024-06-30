<?php
	require '../connect.php';
	if (isset($_GET['DivDel'])) {

		$DivNum=$_GET['DivDel'];
		$deletequery="DELETE  FROM divorceevent WHERE dveventnum='$DivNum'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:divorce-view.php");
		}
		else{
			echo "some error happened check again";
		}
	}
?>