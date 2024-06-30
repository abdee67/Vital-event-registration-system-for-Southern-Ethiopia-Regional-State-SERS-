<?php
	require '../connect.php';
	if (isset($_POST['zone'])) {
		 $zoneNum=$_GET['ZonNum'];

		  $zoneName=$_POST['zname'];
          $znumber=$_POST['znumber'];
          if (!empty($zoneName) && !empty($znumber)) {
          	if (preg_match("/^[A-Za-z]/", $zoneName)) {
          		if (preg_match("/^[0-9]/", $znumber)) {
          			
          			$updatequery="UPDATE zone SET num='$znumber',name='$zoneName' WHERE num='$zoneNum'";
          			$updateresult=mysqli_query($con,$updatequery);
          			if ($updateresult) {
          				echo "Update succussfully";
          				header('location:view-zone.php');
          			}
          			else{
          				echo "Some error happen";
          			}


          		}
          		else{
          			echo "Invalid zone number";
          		}
          	}
          	else{
          		echo "Invalid Name Format";
          	}
          }
          else{
          	echo "Please fill both fields";

          }



	}
?>