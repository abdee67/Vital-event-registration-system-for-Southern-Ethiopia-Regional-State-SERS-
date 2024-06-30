<?php
		require '../connect.php';
		if (isset($_POST['updateuser'])) {
				#Get current 
			 $UserName=$_GET['UserId'];
                    
                    $fullname=$_POST['fullname'];
                    $fname=$_POST['fname'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];

            $updatequery="UPDATE  memberuser  SET FullName ='$fullname', email ='$email', phone ='$phone' WHERE name='$UserName'";
            $result=mysqli_query($con, $updatequery);
            if ($result) {
            	echo "<script> alert('Record updated Succussfully');</script>";

            	echo "<p class='w3-text-green w3-center'>Record updated Succussfully</p>";
            	header("location:view-kebele-user.php");
            	echo "<script> alert('Record updated Succussfully');</script>";
            }
            else{
            	echo "Check the query";
            }

		}
		
?>