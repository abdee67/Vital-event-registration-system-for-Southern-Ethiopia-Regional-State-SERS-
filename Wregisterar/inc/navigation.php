 ?>
            <?php 
            
                $LoggedInName=$_SESSION['LoginUsername'];
                $LoggedInPassword=$_SESSION['LoginPassword'];
                $UserInfo="SELECT *FROM memberuser where name='$LoggedInName ' AND password='$LoggedInPassword'";
                if($run=mysqli_query($con,$UserInfo)){
                    $User=mysqli_fetch_array($run);
                        $FristName=$User['name'];
                       // $LastName=$User['lastname'];
                        $UserImage=$User['pic'];
                        $UserEmail=$User['email'];
                        $UserPhone=$User['phone'];
                        $UserPassword=$User['password'];
                        $_SESSION['Uimage']=$UserImage;//puting image on session
                        $sessImage=$_SESSION['Uimage']; //assigning back to another variable;

                }


  ?>
 <!DOCTYPE html>
 <html>
 <head>
    
        <link rel="stylesheet" href="../w3.css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
 </head>
 <body>
 
 </body>
 </html>
<div class="top_nav navbar-fixed-top w3-hide-small">
                <div class="nav_menu"  style="background-color: blue;">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                               
                        <ul class="nav navbar-nav navbar-right">
                           <li>
                             
                           </li> <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

									 <?php echo "<img src='../StaffPic/$UserImage' alt='Profile Image' class='img-circle'>"; ?>
                               <!-- <span><?php echo $username;?></span>
 -->									<span class="glyphicon glyphicon-chevron-down"></span>

								</a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="detail.php"> Profile</a></li>                                    
                                    <li>
                                        <a href="inc/logout.php">Logout</a>

                                    </li>
                                </ul>
                            </li>
                            <li role="presentation" class="dropdown">
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
  