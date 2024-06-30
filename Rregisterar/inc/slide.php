     <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../w3.css"> 
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/style.css"> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"> 
    </head>
        <?php 
          require '../try.php';
          include("head.php"); 
        ?>           
    <div class="col-md-3 left_col menu_fixed w3-hide-small" >
                <div class="left_col scroll-view"  style="background-color: blue;overflow-y: auto;overflow-x: hidden; max-height: 100vh;white-space: nowrap;">
                    <div class="navbar nav_title" style="border: 0;" >
                    <a href="index.php" class="site_title"  style="background-color:blue;"><span style="font-weight: bolder;color:white;text-align: center;font-style: serif;font-size:40px;font-family: Georgia, Serif;">&nbsp;REGION</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile  info -->
                    <div class="profile">

            <?php 
                require "../connect.php";                      
                $LoggedInName=$_SESSION['LoginUsername'];
                $LoggedInPassword=$_SESSION['LoginPassword'];
                $UserInfo="SELECT *FROM memberuser where name='$LoggedInName ' AND password='$LoggedInPassword'";
                if($run=mysqli_query($con,$UserInfo)){
                    $User=mysqli_fetch_array($run);
                        $FristName=$User['name'];
                        $UserImage=$User['pic'];
                        $UserEmail=$User['email'];
                        $UserPhone=$User['phone'];
                        $UserPassword=$User['password'];
                        $_SESSION['Uimage']=$UserImage;
                        $sessImage=$_SESSION['Uimage'];
                        $role=$User['role'];
                        $_SESSION['role']=$role;
                }
            ?>
            <!--===================Retrive Region Code====================-->
             <?php
                $sql="SELECT * FROM memberuser WHERE name='$LoggedInName' ";
                $result=mysqli_query($con,$sql);
                if($result){
                    if (mysqli_num_rows($result)>0) {

                        while ($row= mysqli_fetch_array($result)) {
                       
                        $_SESSION['rcodetosend']=$row['rcode'];
                        $regcode=$_SESSION['rcodetosend'];

                        }
                       
                    }
                 }

               ?>
            <!--===================Retrive Region Code====================-->
            <?php 
             $uname=$_SESSION['LoginUsername'];
             $upassword=$_SESSION['LoginPassword'];
                 if(isset($uname)&& $upassword)
                     {
                   //login($uname,$upassword);
                    }
                 else
                     {
                   echo "<script>";
                   echo "window.location='../index.php'";
                   echo "</script>";
                      }
                     ?>
                        <div class="profile_pic">
                            <?php echo "<img src='../StaffPic/$UserImage' alt='Profile Image' class='img-circle profile_img'>"; ?>
                        </div>
                        <div class="profile_info">
                            <h2 style="margin-top: -3px"><?php ?></h2>
                        </div>
                    </div>
                    <br/>
                    <!--================== sidebar menu begin-->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <b><h3>SERS </h3></b>
                            
                            <h3><?php if(isset($uname) &&isset($upassword)){echo$uname;} echo " ".":"; echo $_SESSION['role']; ?> </h3>
                            <hr>
                        <!--=========Comment===============-->
                            <?php 
                                $notification="SELECT * FROM comment where 1";
                                if($RunQuery=mysqli_query($con,$notification)){
                                    $totalNotification=mysqli_num_rows($RunQuery);
                                }
                                $selectzone="SELECT * FROM zone WHERE 1";
                                if ($runZone=mysqli_query($con,$selectzone)) {
                                    $totalzone=mysqli_num_rows($runZone);
                                }
                             ?>
                            <ul class="nav side-menu ">
                                <li class="w3-display-position"><a href="#" onclick="document.getElementById('view-comment').style.display='block'">
                                    <i class="fa fa-bell"></i> Comments (<?php echo $totalNotification; ?>)</a></li>
                
                                <li><a href="#"><i class="fa fa-user-secret menu-icon"></i> Account <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                                <script type="text/javascript">
                                                   
                                                    function changePassword(){
                                                        document.getElementById('password-modal').style.display='block'
                                                    }
                                                    function changePicture(){
                                                        document.getElementById('picture-modal').style.display='block';
                                                    }
                                                </script>

                                    <!--RETRIVING TOTAL NUMBER OF REGISTERED USER-->
                                <?php 

                                    $Musers="SELECT *FROM memberuser where 1";
                                    if($run=mysqli_query($con,$Musers)){
                                        $count=mysqli_num_rows($run);
                                    }
                                 ?>                
                                  <li>
                                     <button id="check" class="btn btn-link" style="color: white;" onclick="document.getElementById('password-modal').style.display='block'" class="w3-button w3-red w3-large w3-opacity" name=""><i class="fa fa-expeditedssl"></i>edit password</button>        
                                  </li> 
                                  <li> 
                                      <button id="check" class="btn btn-link" style="color: white;" onclick="document.getElementById('picture-modal').style.display='block'" class="w3-button w3-red w3-large w3-opacity" name=""><i class="fa fa-instagram"></i>edit picture</button>        
                                    </li> 
                                         
                                  </ul>
                                </li>
                            <!-- Zone begin here-->
                            <li><a href="#"><i class="fa fa-cubes"></i> Zones <span class="fa fa-chevron-down">  </span></a>
                                    <ul class="nav child_menu">
                                                <script type="text/javascript">
                                                    function addZone(){
                                                        document.getElementById('add-zone').style.display='block';
                                                    }

                                                     function nextPhase(){
                                                        document.getElementById('start').style.display='block';
                                                    }
    
                                                </script>

                                        <li><a href="#" onclick="document.getElementById('add-zone').style.display='block'"><i class="fa fa-plus"></i> register</a></li> 

                                        <li><a href="view-zone.php"><i class="fa fa-book"></i>view zones (<?php echo $totalzone; ?>)</a></li>
                                    </ul>
                             </li>
                            <!--=================================Zone end here================== -->
                            <!--=================================USERS BEGIN HERE================-->
                            <li><a href="#"><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                      <script type="text/javascript">
                                            function mymod(){
                                                    document.getElementById('start-modal').style.display='block';
                                                    }
                                      </script>
                                <?php

                                    $selectzoneuser="SELECT * FROM memberuser WHERE role='Zver'";
                                    if ($runzoneuser=mysqli_query($con,$selectzoneuser))
                                     {
                                        $totalzoneuser=mysqli_num_rows($runzoneuser);

                                     }
                                 ?> 
                                 <li><a href="add-zone-user.php"><i class="fa fa-plus"></i>Add User</a></li> 
                                 <li><a href="view-zone-user.php"><i class="fa fa-book"></i>view users (<?php echo $totalzoneuser; ?>)</a></li>
                                    </ul>
                                </li>
                <!--========================USERS End HERE=========================================================-->
                <!--==========================VIEW VITAL EVENTS RECORDS============================================-->
              <li><a href="#"><i class="fa fa-eye"></i>Event records <span class="fa fa-chevron-down">  </span></a>
                        <ul class="nav child_menu">
                                 <li><a href="view-birth.php"><i class="fa fa-book"></i>Birth Events</a></li>

                                 <li><a href="view-death.php"><i class="fa fa-book"></i>Death Events</a></li>

                                 <li><a href="view-marriage.php"><i class="fa fa-book"></i>Marriage Events</a></li>

                                <li><a href="view-divorce.php"><i class="fa fa-book"></i>Divorce Events</a></li>
                                            
                                <li><a href="view-adoption.php"><i class="fa fa-book"></i>Adoption Events</a></li>

                        </ul>
                  </li>
                <!--==========================VIEW VITAL EVENTS  ENDS HERE=====================-->
                <!-----=======================Annual Report here==============================--->
                  <li><a href="#"><i class="fa fa-bullhorn"></i>Report<span class="fa fa-chevron-down">  </span></a>
                      <ul class="nav child_menu">
                          <li><a href="monthly-report.php"><i class="fa fa-bullhorn"></i>Monthly Report</a></li>
                          <li><a href="anual-report.php"><i class="fa fa-bullhorn"></i>Anual Report</a></li>
                          <li><a href="report-total-event.php"><i class="fa fa-bullhorn"></i>Report Total Event</a></li>
                                                
                      </ul>
                   </li>
                   <!---================Add News=============================--->
                   <li><a href="#"><i class="fa fa-users menu-icon"></i> NEWS <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#" onclick="document.getElementById('news').style.display='inline'"><i class="fa fa-plus" ></i> Add News</a></li>
                                        <li><a href="view_news.php"><i class="fa fa-book"></i>View News</a></li>
                                    </ul>
                                </li>                   
                    <li><a href="aboutdeveloper.php"><i class="fa fa-th"></i>Developers</a></li>      
                    <li><a href="inc/logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>    
                  </div>
                 </div>
               </div>
            </div>
        <!--================Add zone modal begin===================-->
        <div id="add-zone" class="w3-modal" style="margin-top: -20px;">
        <div class="w3-modal-content">
            <header class="w3-container w3-blue">
                <span onclick="getElementById('add-zone').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;
                ">&times;</span>
                <br><h2 class="w3-center">Add Zone</h2>
            </header>
 
            <div class="w3-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="w3-section">

                        <input style="color: black;" class="w3-input w3-border w3-margin-bottom" type="text" maxlength="2" name="znumber" placeholder="Zone Number"  onkeypress="return (event.charCode>47 && event.charCode<58) " required="" value="">
                        
                        <input style="color: black;" class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Zone Name" required="" name="zname"  onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " value="">
                        <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="zone">Save</button>
                    </div>
                </form>
                <?php 
                     if(isset($_POST['zone']))
                     {
                        echo "<script>";
                                echo "addZone();";
                        echo "</script>";
                         $zoneName=$_POST['zname'];
                         $znumber=$_POST['znumber'];
                         if(!empty($zoneName)&&!preg_match("/^[A-Za-z]/",$zoneName)){
                            echo "<p class='w3-text-red'>Invalid Zone Name Format!</p>";
                         }
                         else
                         {
                            $check="SELECT * FROM zone where name='$zoneName'|| num='$znumber' ";
                            $count=mysqli_num_rows(mysqli_query($con,$check));
                            if($count==1){
                                echo "<p class='w3-text-red'>Another zone is already registered with zone name <b>$zoneName</b> OR zone number <b>$znumber</b> is already registered with another zone!</p>";
                            }
                            else
                            {
                                $query="INSERT INTO zone (num,name)VALUES('$znumber','$zoneName')";
                            if(mysqli_query($con,$query)){
                                echo "<p class='w3-text-blue w3-center'>Zone $zoneName successfuly  Added with code $znumber<p>";
                            }
                            else
                                echo "something went wrong";
                            }
                            
                                
                         }
                    }
                ?>
              </div>
            </div>
           </div>
           <!--==================================Add zone modal end===============================-->
           <!--===================Account ModalS!=================================================-->
           <!--==================================CHANGE password MODAL=============================-->
            <div id="password-modal" class="w3-modal" style="margin-top: -20px;">
                  <div class="w3-modal-content well" style="width: 50%;">
                        <header class="w3-container w3-blue">
                                <span onclick="getElementById('password-modal').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;">&times;</span>
                                <br>
                                <h2 class="w3-text-white w3-center"> Change Password<hr></h2>
                        </header>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" style='margin-left: 10%; margin-right: 10%; text-align: center; border: 1px ;'>
                                    <?php 
                                        if(isset($_POST['changePass'])){
                                            $old=$_POST['oldPass'];
                                            $old=md5($old);
                                            $newPass=$_POST['newPass'];
                                            $confirm=$_POST['confPass'];
                                            $num=strlen($newPass);
                                        }
                                     ?>
                                    <input type="password" class="w3-input form-control" name="oldPass" placeholder="old password">
                                        <?php 
                                            if(isset($_POST['changePass'])){
                                                if(empty($old)){
                                                     echo "<p class='w3-text-red'>empty old password!</p>";
                                                }
                                                else if($old!=$_SESSION['LoginPassword']){
                                                     echo "<p class='w3-text-red'>Wrong old password!</p>";
                                                }
                                            }
                                         ?>
                                    <input type="password" class="w3-input form-control" name="newPass" placeholder="new password">
                                         <?php 
                                            if(isset($_POST['changePass'])){
                                                if(empty($newPass)){
                                                     echo "<p class='w3-text-red'>New password is empty!</p>";
                                                }
                                                else if(strlen($newPass)<6){
                                                     echo "<p class='w3-text-red'>New password is too short!</p>";
                                                }
                                            }
                                         ?>
                                    <input type="password" class="w3-input form-control" name="confPass"placeholder="confirm password"><br>
                                        <?php 
                                            if(isset($_POST['changePass'])){
                                                if(empty($confirm)){
                                                     echo "<p class='w3-text-red'>confirm password is empty!</p>";
                                                }
                                                else if($newPass!=$confirm){
                                                     echo "<p class='w3-text-red'>two password do not match!</p>";
                                                }
                                            }
                                         ?>
                                    <input type="submit" class="btn btn-success w3-center w3-blue" name="changePass" value="Change">
                                </form>
                                    <?php 
                                        if(isset($_POST['changePass'])){
                                            if(!empty($newPass) && $num>=6 && !empty($confirm) && $newPass==$confirm && $old==$_SESSION['LoginPassword']){
                                              $psd=md5($newPass);
                                              $un=$_SESSION['LoginUsername'];
                                                    
                                              $Pchange="UPDATE memberuser set password ='$psd' where name='$un' AND password='$old' ";
                                              if(mysqli_query($con,$Pchange))
                                                 {
                                                            
                                                  $_SESSION['LoginPassword']=$psd;
                                                  echo "<p class='w3-text-blue w3-center'>Password successfuly changed!</p>"; 
                                                  $updateFirstLogin="UPDATE memberuser set firstlogin='1' WHERE name='$un' AND password='$psd'";
                                                  if (mysqli_query($con,$updateFirstLogin)) {
                                                      echo "<p class='w3-text-blue w3-center'>Now You Can Do Your Work Without Doubt !!</p>";
                                                  }
                                                  }
                                                else
                                                  {
                                                  echo "not done";
                                                  }
                                                }
                                              else
                                                {
                                                    
                                             }
                                          }   
                                     ?>
                               </div>
                        <?php 
                            if(isset($_POST['changePass'])){
                                echo "<script>";
                                    echo "changePassword();";
                                echo "</script>";
                            }
                         ?>
                    </div>

                    <!--=====================================CHANGE picture MODAL============================-->
                    <div id="picture-modal" class="w3-modal" style="margin-top: -20px;">
                        <div class="w3-modal-content well" style="width: 50%;">
                            <header class="w3-container w3-blue">
                                <span onclick="getElementById('picture-modal').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;">&times;</span>
                                <br>
                                <h2 class="w3-text-white w3-center">Change Profile Picture <hr></h2>
                            </header>
                          <?php 
                            if(isset($_POST['changeImg']))
                                {
                                  $pic=$_FILES['img']['name'];
                                  $target="../StaffPic/".basename($_FILES['img']['name']);
                               }
                           ?>
                           <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                             <input type="file" name="img" class="w3-input"><BR>
                                <?php 
                                    if(isset($_POST['changeImg'])){

                                    if(empty($pic)){
                                        echo "<p class='w3-text-red '>No image selected!</p>"; 
                                    }
                                    else{
                                        $extension=strtolower(substr($pic, strpos($pic, '.')+1));
                                        if($extension!="jpg"&&$extension!="jpeg"&&$extension!="gif"&&$extension!="bmp"&&$extension!="png"){
                                            echo "<p class='w3-text-red '>invalid image type!</p>"; 
                                        }
                                        else if(!empty($pic) && $extension=="jpg"||$extension=="jpeg"||$extension=="gif"||$extension=="bmp"||$extension=="png"){
                                            $activeUser=$_SESSION['LoginUsername'];
                                            $activePassword=$_SESSION['LoginPassword'];
                                                $picQuery="UPDATE memberuser set pic='$pic' where name='$activeUser' AND password='$activePassword'";
                                                if(mysqli_query($con,$picQuery)){
                                                    

                                                    if(move_uploaded_file($_FILES['img']['tmp_name'],"../StaffPic/".$_FILES['img']['name'])){
                                                        echo "<script>";
                                                echo "alert('Picture Updated successfuly');";
                                            echo "</script>";
                                                    }
                                                }
                                                else
                                                    {echo "not done";}
                                        }
                                    }
                                        if(empty($pic)||$extension!="jpg"&&$extension!="jpeg"&&$extension!="gif"&&$extension!="bmp"&&$extension!="png")
                                        {
                                            echo "<script>";
                                                echo "changePicture();";
                                            echo "</script>";
                                        }
                                    }
                                 ?>

                                <input type="submit" name="changeImg" value="Upload" class="btn btn-success w3-blue w3-left">
                            </form>
                        </div>
                    </div>
             <!--===========================================Add News MODAL!===============================-->
            <div id="news" class="w3-modal " style="margin-top: -20px;">
                <div class="w3-modal-content">
                    <header class="w3-container w3-blue">
                        <span onclick="getElementById('news').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;">&times;</span>
                        <h2 class="w3-center w3-text-white">Add News</h2>
                        <hr>
                    </header>
                    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                              <label class="w3-text-blue text text-center">News Title</label><br>
                              <input type="text" name="title" class="w3-input w3-center" value=" <?php if(isset($_POST['edit'])){ if(isset($_SESSION['title'])){echo $_SESSION['title'];} } ?>" required>
                              <label class="w3-text-blue w3-center">News Content Here</label><br>
                                    <textarea class="ckeditor w3-input" name="news" rows="10" placeholder="inform drug here..." rows="30" cols="8"><?php if(isset($_POST['edit'])){ if(isset($_SESSION['news'])){echo $_SESSION['news'];}  } ?></textarea>
                                        <?php 
                                            if(isset($_POST['send'])){
                                                if(empty($text)){
                                                    echo "<p class='w3-text-red w3-center'>empty report!!</p>"; 
                                                }

                                                if(empty($text)){
                                                    echo "<script>";
                                                        echo "report();";
                                                    echo "</script>";
                                                }
                                            }
                                         ?>
                              <input type="submit" class="btn btn-primary form-control w3-blue" name="post" value="Post News">
                            </form>
                             <?php 
                                 $success=0;
                                 if(isset($_POST['post'])){
                                    echo "<script>";
                                        echo "uploadNews()";
                                    echo "</script>";
                                    $con=mysqli_connect("localhost","root","","vera");
                                    $news=$_POST['news'];
                                    $title=$_POST['title'];
                                    
                                    $_SESSION['text']=$news;
                             
                                    if(!empty($news)&&!empty($title)){
                                        $time=time();
                                        $date=date('Y M D H:i:s',$time);
                                            $check="SELECT * FROM news WHERE content='$news' ";
                                            if($jo=mysqli_query($con,$check)){
                                                $affected=mysqli_num_rows($jo);
                                                if($affected!=0){
                                                   echo "<script> alert('News Already Posted!');</script>";
                                                }
                                                else
                                                {
                                                    $success=1;
                                                    $post="INSERT INTO news (title,content,postedtime)values('$title','$news','$date')";
                                                    if($jo=mysqli_query($con,$post)){
                                                    $_SESSION['news']=$news;
                                                    $_SESSION['title']=$title;
                                                    echo "<script> alert('News successfully Posted!');</script>";
                                                     
                                            }
                                            else
                                                echo "something went wrong";
                                                }
                                            }
                                            else{
                                                echo "not done";
                                            }
                                      
                                        }
                                        else
                                            echo "<p class='w3-text-red w3-center' >Empty text or title</p>";
                                    }
                            
                                 ?>
                         </div>
                    </div>
<!--==========================================VIEW Comment FUNCTION MODAL!=================================-->
                 <div id="view-comment" class="w3-modal " style="margin-top: -20px;">
                   <div class="w3-modal-content">
                      <header class="w3-container w3-blue">
                        <span onclick="getElementById('view-comment').style.display='none'" class="w3-button w3-blue" style="float: right;">&times;</span>
                        <h2 class="w3-center w3-text-white">Client Comments </h2>
                       </header>
                        <table border="1" class="w3-table-all">
                            <style type=tezxt/css>
                                th{
                                    background-color: blue;
                                    color: white;
                                }
                            </style>

                            <tr>
                                <th>Name</th>
                                <th>Email.</th>                                
                                <th>Message</th>
                                <th>Time</th>
                            </tr>
                            <?php 
                                $comment="SELECT * FROM comment where 1 ORDER BY id DESC";
                                if($run=mysqli_query($con,$comment)){                                    
                                    
                                }
                             ?>
                             <?php while ($list=mysqli_fetch_array($run)) {
                                 $name=$list['name'];
                                    $email=$list['email'];
                                    $time=$list['date'];

                                    $message=$list['message'];
                             ?>
                             <tr><ul>

                                 <td><?php echo $name; ?></td>
                                 <td><?php echo $email; ?></td>
                                 <td><?php echo $message; ?></td>
                                 <td><?php echo $time; ?></td>
                                                                 
                             </tr>
                             <?php
                             } ?>
                        </table>
                </div>
        </div>