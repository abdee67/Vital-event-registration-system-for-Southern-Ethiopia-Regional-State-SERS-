<?php
	require '../connect.php';
	  if (isset($_POST['kebele'])) {

     	$KebeleId=$_GET['KebId'];

     	$kebeleName=$_POST['kname'];
        $kebelenumber=$_POST['knumber'];

         $updatekebele="UPDATE kebele SET num='$kebelenumber',name='$kebeleName' WHERE num='$KebeleId'";
         $updateresult=mysqli_query($con,$updatekebele);
           if ($updateresult) {
                     echo "Update Done !!";
                     header("location:view-kebele.php");
                           }
                      else{
                            echo "Check the query";
                            	
                            }
        }
	
?>