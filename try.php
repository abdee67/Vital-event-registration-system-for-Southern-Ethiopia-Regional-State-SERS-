   <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../w3.css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/style.css"> 
       </head>


		<!-- FUNCTION MODAL!-->
   <?php
        session_start();
        require 'connect.php';
        
        function login($username,$pass)
            {
	           if(preg_match("/^[A-Za-z]/", $username))
	              {

		            if(!empty($username))
		             {
			           require 'connect.php';
		               $querry="SELECT name FROM MemberUser WHERE name='$username' AND password='$pass'";
			  	
				      if($run=mysqli_query($con,$querry))
				       {
					     $row=mysqli_num_rows($run);
					     if($row==1)
					        {
								$_SESSION['LoginUsername']=$username;
								$_SESSION['LoginPassword']=$pass;
								$uname=$_SESSION['LoginUsername'];

						        $RetriveRole="SELECT * from MemberUser where name='$username' AND password='$pass'";

						        if($RunRole=mysqli_query($con,$RetriveRole))
						        {
							      $row=mysqli_fetch_array($RunRole);
							      $role=$row['role'];
							       
							       $_SESSION['lname']=$LastName;
							       $_SESSION['role']=$role;
							  
							    switch ($role) {
								  case 'admin':
										echo "<script>";
										     echo "alert('Successfully Logged in Mr|s " . $username . "');";
										     echo "window.location='admin/index.php'";
										echo "</script>";
										break;
								   case 'Rver':
										echo "<script>";
										    echo "alert('Successfully Logged in Mr|s " . $username . "');";
											echo "window.location='Rregisterar/index.php'";
										echo "</script>";
										break;
								   case 'Zver':
										echo "<script>";
										    echo "alert('Successfully Logged in Mr|s " . $username . "');";
											echo "window.location='Zregisterar/index.php'";
										echo "</script>";
										break;
								   case 'Wver':
										echo "<script>";
										    echo "alert('Successfully Logged in Mr|s " . $username . "');";
											echo "window.location='Wregisterar/index.php'";
										echo "</script>";
										break;
								   case 'Kver':
										echo "<script>";
										    echo "alert('Successfully Logged in Mr|s " . $username . "');";
										    echo "window.location='Kregisterar/index.php'";
										echo "</script>";
										break;
								   default:
										$_SESSION['username']=$username;
										echo "<script>";
											echo "alert(' login success');";
											echo '<http-equiv="refresh" content="1" url=$_SERVER["PHP_SELF"]>';
										echo "</script>";
										break;
							}
							
						}	
					}
				else if($row==0)
							{
								//echo "<p style='color:red;'>Invalid Username And Password Combination!</p>";
							}
					
				}
		}
}
elseif(empty($username)){

}
else
{
	echo "<p style='color:red; text-align:center;'>Username:<b>$username</b> is invalid format of user name</p>";
}
}
#======================================
?>
<script type="text/javascript">
	
</script>

    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
</script>
