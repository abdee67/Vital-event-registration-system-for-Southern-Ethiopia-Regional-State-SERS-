<?php
	require '../connect.php';
	if (isset($_GET['UIddelete'])) {

		$title=$_GET['UIddelete'];
		$deletequery="DELETE  FROM news WHERE title='$title'";
		$deleteresult=mysqli_query($con,$deletequery);
		if ($deleteresult) {
			header("location:view_news.php");
		}
		else{
			echo "some error happened check again";
		}

	}
?>