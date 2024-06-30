<?php
        require '../connect.php';
        if (isset($_POST['updateadopt'])) {
                #Get current 

            $AdoptID=$_GET['AdopID'];

                $AdoptChildFName=$_POST['adoptchfname'];
                $AdoptChildMName=$_POST['adoptchmname'];
                $AdoptChildLName=$_POST['adoptchlname'];
              
                $AdoptChildNationality=$_POST['adoptchildnationality'];
                
                $AdoptChildNewFName=$_POST['adoptchnewfname'];
                $AdoptChildNewMName=$_POST['adoptchnewmname'];
                $AdoptChildNewLName=$_POST['adoptchenewlname'];

                $AdoptChildNewParentFName=$_POST['adoptchnewpersonfname'];       
                $AdoptChildNewParentResidance=$_POST['adoptchnewresidanceplace'];
                $AdoptChildPersonPhone=$_POST['adoptchnewpersonphone'];
                

                $AdoptChildCourtName=$_POST['adoptcourtname'];
                $AttorneyFullName=$_POST['adoptattorneyfname'];
                $AttorneyPhone=$_POST['adoptattorneyphone'];

                $updateadopt="UPDATE adoptevent SET fnameadopt='$AdoptChildFName',mnameadopt='$AdoptChildMName',lnameadopt='$AdoptChildLName',nationlityadopt='$AdoptChildNationality',newfname='$AdoptChildNewFName',newmname='$AdoptChildNewMName',newlname='$AdoptChildNewLName',currparentfname='$AdoptChildNewParentFName',currparentplace='$AdoptChildNewParentResidance',currparentphone='$AdoptChildPersonPhone',courtname='$AdoptChildCourtName',attorneyfname='$AttorneyFullName',attorneyphone='$AttorneyPhone' WHERE adoptnum='$AdoptID'";
                
              $result=mysqli_query($con, $updateadopt);
                if ($result) {
                    echo "<script> alert('Record updated Succussfully');</script>";

                    echo "<p class='w3-text-green w3-center'>Record updated Succussfully</p>";
                    header("location:adoption-view.php");
                    echo "<script> alert('Record updated Succussfully');</script>";
                }
                else{
                    echo "Check the query".mysqli_error($con);
                }

        }
        
?>