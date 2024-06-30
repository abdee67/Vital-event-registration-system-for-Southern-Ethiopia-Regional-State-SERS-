<?php
		require '../connect.php';
		if (isset($_POST['updatemarriage'])) {
				#Get current 
                  
			     $MarrgNum=$_GET['MId'];

                        $WifeFName=$_POST['wfname'];
                        $WifeMName=$_POST['wmname'];
                        $WifeLName=$_POST['wlname'];
                  
                        $WifeNationality=$_POST['wnationality'];
                        $WifeReligion=$_POST['wreligion'];
                        $WifeJob=$_POST['wjob'];
                       
                        $HusbandFName=$_POST['hfname'];
                        $HusbandMName=$_POST['hmname'];
                        $HusbandLName=$_POST['hlname'];
                        
                        $HusbandNationality=$_POST['hnationality'];
                        $HusbandReligion=$_POST['hreligion'];
                        $HusbandJob=$_POST['hjob'];
                       

                        $WifeReference1=$_POST['wrfname1'] ;
                        $WifeReference2=$_POST['wrfname2'];
                        $HusbandReference1=$_POST['hrfname1'];
                        $HusbandReference2=$_POST['hrfname2'];

                        $UpdateMarrg="UPDATE marriagevent SET wfname= '$WifeFName',wmname='$WifeMName',wnationality='$WifeNationality',wreligion='$WifeReligion',wjob='$WifeJob',hfname='$HusbandFName',hmname='$HusbandMName',hlname='$HusbandLName',hnationality='$HusbandNationality',hreligion='$HusbandReligion',hjob='$HusbandJob',wreferencefname1= '$WifeReference1',wreferencefname2='$WifeReference2',hreferencefname1='$HusbandReference1',hreferencefname2='$HusbandReference2' WHERE  marriagenum='$MarrgNum'";
                        $Result=mysqli_query($con,$UpdateMarrg);
                        if ($Result) {
                              echo "Done";
                              header("location:marriage-view.php");
                        }
                        else{
                              echo "Not Done".mysqli_error($con);
                        }
          

		}
		
?>