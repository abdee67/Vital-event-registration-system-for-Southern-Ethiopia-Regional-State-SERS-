<?php
		require '../connect.php';
		if (isset($_POST['updaterecord'])) {
				#Get current 
			$BirthNum=$_GET['ID'];

            $ChildFNAme=$_POST['childfname'];
            $ChildMName=$_POST['childmname'];
            $ChildLName=$_POST['childlname'];
           
            $childNation=$_POST['chnationality']; 
            $ChildMother=$_POST['motherfname'];

            $updatequery="UPDATE  birthevent  SET fname ='$ChildFNAme', mname ='$ChildMName', lname ='$ChildLName', momName ='$ChildMother',nationality ='$childNation' WHERE eventnumber='$BirthNum'";
            $result=mysqli_query($con, $updatequery);
            if ($result) {
            	echo "<script> alert('Record updated Succussfully');</script>";

            	echo "<p class='w3-text-green w3-center'>Record updated Succussfully</p>";
            	header("location:birth-view.php");
            	echo "<script> alert('Record updated Succussfully');</script>";
            }
            else{
            	echo "Check the query";
            }

		}
		
?>