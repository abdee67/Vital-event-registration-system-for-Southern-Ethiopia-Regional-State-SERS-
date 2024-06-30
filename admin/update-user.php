<?php
		require '../connect.php';
		if (isset($_POST['updateuser'])) {
				#Get current 
			        $UserName=$_GET['UserId'];
                    
                    $fullname=$_POST['fullname'];
                    $fname=$_POST['fname'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];

                if (!empty($fullname) && !empty($fname)&& !empty($email) && !empty($phone)) {
                    if (preg_match("/^[A-Za-z]/",$fullname)) {
                        # code..
                        if (preg_match("/^[A-Za-z]/",$fname)) {
                            # code...
                            if (preg_match("/^.+@.+\.com$/", $email)) {
                                # code...
                                if (preg_match("/^[0-9]{10}/", $phone)) {
                                                            # code...
                                    $updatequery="UPDATE  memberuser  SET FullName ='$fullname', name='$fname', email ='$email', phone ='$phone' WHERE name='$UserName'";
                                    $result=mysqli_query($con, $updatequery);
                                    if ($result) {
                                        echo "<script> alert('Record updated Succussfully');</script>";

                                        echo "<p class='w3-text-blue w3-center'>Record updated Succussfully</p>";
                                        header("location:view-user.php");
                                        echo "<script> alert('Record updated Succussfully');</script>";
                                    }
                                    else{
                                        echo "Check the query";
                                    }


                                }
                                else{
                                    echo "<script>alert('Invalid format of Phone');</script>";
                                    
                                }
                            }else{
                                echo "<script>alert('Invalid format of Email');</script>";
                            }
                        }else{
                            echo "<script>alert('Invalid format of UserName');</script>";
                        }
                    }else{
                        echo "<script>alert('Invalid format of full Name');</script>";
                    }

                }
                elseif (empty($fullname)) {
                   echo "<script>alert('Fill Full Name ');</script>";
                }
                elseif (empty($fname)) {
                   echo "<script>alert('Fill UserName ');</script>";
                }
                elseif (empty($phone)) {
                   echo "<script>alert('Fill Phone ');</script>";
                }
                 elseif (empty($email)) {
                   echo "<script>alert('Fill Email ');</script>";
                }

		}
		
?>