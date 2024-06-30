<?php
	require '../connect.php';
	if (isset($_GET['AdoptDel'])) {

		$adoptnum=$_GET['AdoptDel'];
		$deletequery="DELETE  FROM adoptevent WHERE adoptnum='$adoptnum'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:adoption-view.php");
		}
		else{
			echo "some error happened check again";
		}
	}
?>