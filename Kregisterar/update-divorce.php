<?php
		require '../connect.php';
		if (isset($_POST['updatedivorce'])) {
				#Get current 
		 $DivNum=$_GET['UpdateIdDV'];

              $WifeDvFName=$_POST['wdvfname'];
              $WifeDvMName=$_POST['wdvmname'];
              $WifeDvLName=$_POST['wdvlname'];
              $WifeDvNationality=$_POST['wdvnationality'];
              $WifeDvReligion=$_POST['wdvreligion'];
              $WifeDvJob=$_POST['wdvjob'];
             

                            #HUSBAND divorce information
              $HusbandDvFName=$_POST['hdvfname'];
              $HusbandDvMName=$_POST['hdvmname'];
              $HusbandDVLName=$_POST['hdvlname'];
              $HusbandDvNationality=$_POST['hdvnationality'];
              $HusbandDvReligion=$_POST['hdvreligion'];
              $HusbandDvJob=$_POST['hdvjob'];
             
                            # get divorce information from form
              $DivorceChildNum=$_POST['dvchildnum'];
              $DivorceReason=$_POST['dvreason'];
              $DivorceCourtName=$_POST['dvcourtname'];

            $updatequery="UPDATE divorceevent SET wfnamedv='$WifeDvFName',wmnamedv='$WifeDvMName',wlnamedv='$WifeDvLName',wnationalitydv='$WifeDvNationality',wreligiondv='$WifeDvReligion',wjobdv='$WifeDvJob',hfnamedv='$HusbandDvFName',hmnamedv='$HusbandDvMName',hlnamedv='$HusbandDVLName',hnationalitydv='$HusbandDvNationality',hreligiondv='$HusbandDvReligion',hjobdv='$HusbandDvJob',childnum='$DivorceChildNum',reasondv='$DivorceReason',courtnamedv='$DivorceCourtName' WHERE dveventnum='$DivNum'";
            $result=mysqli_query($con, $updatequery);
            if ($result) {
            	echo "<script> alert('Record updated Succussfully');</script>";

            	echo "<p class='w3-text-green w3-center'>Record updated Succussfully</p>";
            	header("location:divorce-view.php");
            	echo "<script> alert('Record updated Succussfully');</script>";
            }
            else{
            	echo "Check the query";
            }

		}
		
?>