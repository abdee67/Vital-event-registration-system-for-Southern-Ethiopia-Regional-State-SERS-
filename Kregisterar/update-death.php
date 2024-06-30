<?php
		require '../connect.php';
		if (isset($_POST['updatedeath'])) {
				#Get current 
	                      $DeathNum=$_GET['DthID'];
                            $FistNameD=$_POST['dthfname'];
                            $MiddleNameD=$_POST['dthmname'];
                            $LastNameD=$_POST['dthlname'];
                          
                            $NationalityD=$_POST['dthnationality'];

                        #==============From Form==================

                            $DthSex=$_POST['dthsex'];
                            $DthTitle=$_POST['dthtitle'];
                            $DthReligion=$_POST['dthreligion'];
                            $DthDob=$_POST['dthbirthdate'];

                            $DthJob=$_POST['dthjob'];
                            $DthPlace=$_POST['dthplace'];
                            $DthCause=$_POST['dthcause'];
                            $DthDate=$_POST['dthdate'];

            $updatequery="UPDATE  deathevent  SET fname ='$FistNameD', mname ='$MiddleNameD', lname ='$LastNameD',nationality ='$NationalityD',title='$DthTitle',job='$DthJob',cause='$DthCause' WHERE eventnumber='$DeathNum'";
            $result=mysqli_query($con, $updatequery);
            if ($result) {
            	echo "<script> alert('Record updated Succussfully');</script>";

            	echo "<p class='w3-text-green w3-center'>Record updated Succussfully</p>";
            	header("location:death-view.php");
            	echo "<script> alert('Record updated Succussfully');</script>";
            }
            else{
            	echo "Check the query";
            }

		}
		
?>