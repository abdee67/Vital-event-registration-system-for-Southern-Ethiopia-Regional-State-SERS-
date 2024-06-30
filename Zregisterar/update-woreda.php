<?php
	require '../connect.php';
	  if (isset($_POST['woreda'])) {

     	$WoredaId=$_GET['WoId'];

     	$woredaName=$_POST['wname'];
        $woredanumber=$_POST['wnumber'];

         if (!empty($woredanumber) && !empty($woredaName)) {
         	if (preg_match("/^[A-Za-z]/", $woredaName)) {
         		if (preg_match("/^[0-9]/", $woredanumber)) {
         		    $updatekebele="UPDATE woreda SET num='$woredanumber',name='$woredaName' WHERE num='$WoredaId'";
                    $updateresult=mysqli_query($con,$updatekebele);
		           
		             if ($updateresult) 
		               {
		                   echo "Update Done !!";
		                   header("location:view-woreda.php");
		               }
		               else{
		                    echo "Check the query";
		                            	
		                   }	  
         		     }
         		else{
         			echo "Invalid worada number format";
         		}
         	
         	}
         	else{
         		echo "<script> alert('Invalid woreda name format');</script>";
         		header('location:view-woreda.php');
         	}


         	
         }
         else{
         	echo "Fill both";
         }

        }
	
?>