<?php
	require '../connect.php';
	if (isset($_GET['DeathDel'])) {

		$DeathNum=$_GET['DeathDel'];
		$deletequery="DELETE  FROM deathevent WHERE eventnumber='$DeathNum'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:death-view.php");
		}
		else{
			echo "some error happened check again";
		}
	}
?>