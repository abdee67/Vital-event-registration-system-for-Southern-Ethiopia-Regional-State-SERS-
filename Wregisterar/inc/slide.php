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
                <div class="left_col scroll-view"  style="background-color:blue;overflow-y: auto;overflow-x: hidden; max-height: 100vh;white-space: nowrap;">
                    <div class="navbar nav_title" style="border: 0;" >
                        <a href="index.php" class="site_title"  style="background-color:blue;"><span style="font-weight: bolder;text-align: center;font-size: 30px;font-style: serif;font-family: Georgia, Serif;letter-spacing: 5px;">&nbsp;WOREDA</span></a>
                    </div>
                    <div class="clearfix"></div>
                
                    <!--=====================ACCOUNT MENU =====-->
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
             <!--===================Retrive Region , zone and woreda Code====================-->
             <?php
                $sql="SELECT * FROM memberuser WHERE name='$LoggedInName' ";
                $result=mysqli_query($con,$sql);
                if($result){
                    if (mysqli_num_rows($result)>0) {
                        while ($row= mysqli_fetch_array($result)) {
    
                        $_SESSION['rcodetosend']=$row['rcode'];
                        $_SESSION['zonecode']=$row['zcode']; 
                        $_SESSION['woredacode']=$row['wcode'];

                        $regcode=$_SESSION['rcodetosend'];
                        $ZCode=$_SESSION['zonecode'];
                        $WCode=$_SESSION['woredacode'];
                        }
                       
                    }
                 }
                 $selectworedaname="SELECT name FROM woreda WHERE num='$WCode' ";
                 $woredaresult=mysqli_query($con,$selectworedaname);
                 if ($woredaresult) {
                     $woredalist=mysqli_fetch_array($woredaresult);
                     $_SESSION['wname']=$woredalist['name'];
                     $woredaname=$_SESSION['wname'];
                 }

               ?>
            <!--===================Retrive Region , zone and woreda Code====================-->
            <?php 
             $uname=$_SESSION['LoginUsername'];
             $upassword=$_SESSION['LoginPassword'];
                 if(isset($uname)&& $upassword)
                     {
                   //login($uname,$upassword);
                    }
                 else
                     {
                   header('Location:../layout.php');
                   echo "<script>";
                   echo "window.location='../index.php'";
                   echo "</script>";
                      }
                    ?>
                        <div class="profile_pic">
                            <?php echo "<img src='../StaffPic/$UserImage' alt='Profile Image' class='img-circle profile_img'>"; ?>
                        </div>
                        <div class="profile_info">
                            
                             <!-- <h2><?php echo "$name"; ?></h2> -->
                            <h2 style="margin-top: -3px"><?php ?></h2>
                        </div>
                    </div>
                    <!-- /ACCOUNT MENU-->

                    <br />
                    <!-- SIDE BAR -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3 class="w3-text-white">
                                <?php echo  $woredaname." "."($WCode)"." "." "."WOREDA";?>
                            </h3>
                            <br>
                            <h3 style="text-align: center;"> <?php if(isset($uname) &&isset($upassword)){echo $uname;} echo " ".":"; echo $_SESSION['role']; ?> </h3>
                            <hr>
                            
                        <!--COMMENT -->
                            <?php 
                                $notification="SELECT * FROM comment where 1";
                                if($RunQuery=mysqli_query($con,$notification)){
                                    $totalNotification=mysqli_num_rows($RunQuery);
                                }
                             ?>
                            <ul class="nav side-menu ">
                                <li class="w3-display-position"><a href="#" onclick="document.getElementById('view-comment').style.display='block'">
                                    <i class="fa fa-comment"></i> Comments (<?php echo $totalNotification; ?>)</a></li>
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
                                                      
                                 <li> <button id="check" class="btn btn-link" style="color: white;" onclick="document.getElementById('password-modal').style.display='block'" class="w3-button w3-red w3-large w3-opacity" name=""><i class="fa fa-expeditedssl"></i>edit password</button>         </li> 
                                  <li> <button id="check" class="btn btn-link" style="color: white;" onclick="document.getElementById('picture-modal').style.display='block'" class="w3-button w3-red w3-large w3-opacity" name=""><i class="fa fa-instagram"></i>edit picture</button>         </li> 
                                         
                                    </ul>
                                </li>
                            <!-- ===================================Kebele begin here===============================-->
                            <!--===============COUNT KEBELE IN CURRENT WOREDA=======================================-->
                            <?php
                                $selectworedaskebele="SELECT * FROM kebele WHERE woreda='$WCode' AND zone='$ZCode'";
                                if ($runkebele=mysqli_query($con,$selectworedaskebele)) {
                                   $countkebele=mysqli_num_rows($runkebele);
                                }

                            ?>
                                <li><a href="#"><i class="fa fa-cubes"></i> Kebeles <span class="fa fa-chevron-down">  </span></a>
                                    <ul class="nav child_menu">
                                                <script type="text/javascript">
                                                    function addKebele(){
                                                        document.getElementById('add-kebele').style.display='block';
                                                    }

                                                </script>

                                        <li><a href="#" onclick="document.getElementById('add-kebele').style.display='block'"><i class="fa fa-plus"></i> register</a></li>

                                        <li><a href="view-kebele.php"><i class="fa fa-book"></i>View kebeles (<?php echo $countkebele; ?>)</a></li> 
                                    </ul>
                                </li>
                            <!--========================Kebele end here======================================== -->
                            <!--=======================USERS BEGIN HERE=========================================-->
                            <!--======================COUNT KEBELE USER=========================================-->
                            <?php
                                $selectkebeleuser="SELECT * FROM memberuser WHERE zcode='$ZCode' AND wcode='$WCode' AND kcode!=''";
                                if ($runkuser=mysqli_query($con,$selectkebeleuser)) {
                                    $countkuser=mysqli_num_rows($runkuser);
                                    
                                }
                            ?>
                                <li><a href="#"><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down">  </span></a>
                                    <ul class="nav child_menu">
                                           
                                        <li><a href="add-kebele-user.php"><i class="fa fa-plus"></i>Add User</a></li>             	
                                        <li><a href="view-kebele-user.php"><i class="fa fa-book"></i>View Users (<?php echo $countkuser; ?>)</a></li>								
                                       
                                    </ul>
                                </li>
                <!--======================================USERS End HERE===================================-->
                <!--====================================VIEW VITAL EVENT RECORDS==========================-->
                    <li><a href="#"><i class="fa fa-eye"></i>Event records <span class="fa fa-chevron-down">  </span></a>
                        <ul class="nav child_menu">

                            <li><a href="view-birth.php"><i class="fa fa-book"></i>Birth Events</a></li>

                            <li><a href="view-death.php"><i class="fa fa-book"></i>Death Events</a></li>

                             <li><a href="view-marriage.php"><i class="fa fa-book"></i>Marriage Events</a></li>

                            <li><a href="view-divorce.php"><i class="fa fa-book"></i>Divorce Events</a></li>
                            
                            <li><a href="view-adoption.php"><i class="fa fa-book"></i>Adoption Events</a></li>
        

                        </ul>
                    </li>
                            <!--========================Annual Report===============================-->
                    <li><a href="#"><i class="fa fa-bullhorn"></i>Report<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="monthly-report.php"><i class="fa fa-bullhorn"></i>Monthly Report</a></li>
                              <li><a href="anual-report.php"><i class="fa fa-bullhorn"></i>Anual Report</a></li>
                              <li><a href="report-total-event.php"><i class="fa fa-bullhorn"></i>Report Total Event</a></li>
                                                
                            </ul>
                    </li>
               <!--=============================ADD NEWS SIDEBAR================================-->

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
    <!--=======================Add woreda woreda begin========================================================-->
        <div id="add-kebele" class="w3-modal" style="margin-top: -20px;">
        <div class="w3-modal-content">
            <header class="w3-container w3-blue">
                <span onclick="getElementById('add-kebele').style.display='none'" class="w3-button w3-blue" style="float: right;">&times;</span>
                <br>
                <h2 class="w3-center">Add Kebele!</h2>
            </header>
            <div class="w3-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="w3-section">
            <input style="color: black;" class="w3-input w3-border w3-margin-bottom" type="text" name="knumber" maxlength="2" onkeypress="return (event.charCode>47 && event.charCode<58)" placeholder="Kebele Number" required="" value="">
            <input style="color: black;" class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Kebele Name" required="" name="kname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " value="">
            <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="kebele">Save</button>
        </div>
    </form>
    <?php 
        if(isset($_POST['kebele']))
        {
            $kebeleName=$_POST['kname'];
            $kebelenumber=$_POST['knumber'];
            if(!empty($kebeleName)&&!preg_match("/^[A-Za-z]/",$kebeleName)){
                echo "<p class='w3-text-red'>Invalid Woreda Name Format!</p>";
            }
            else
            {
                $check="SELECT * FROM kebele where (name='$kebeleName'|| num='$kebelenumber') AND (woreda='$WCode') AND (zone='$ZCode') ";
                $count=mysqli_num_rows(mysqli_query($con,$check));
                if($count==1){
                    echo "<p class='w3-text-red'>Another kebele is already registered with kebele name <b>$kebeleName</b> OR kebele number <b>$kebelenumber</b>  in this Wored !</p>";
                }
                else
                {
                    $query="INSERT INTO kebele (num,name,woreda,zone)VALUES('$kebelenumber','$kebeleName','$WCode','$ZCode')";
                    if(mysqli_query($con,$query)){
                        echo "<script>window.location.href = 'add-kebele-user.php';</script>";
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
           <!--============================Add woreda modal end here=============================================-->
           <!--==============Account ModalS!==================-->
           <!--========CHANGE password MODAL Modal============-->
                    <div id="password-modal" class="w3-modal" style="margin-top: -20px;">
                        <div class="w3-modal-content well" style="width: 50%;">
                            <header class="w3-container w3-blue">
                                <span onclick="getElementById('password-modal').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;">&times;</span>
                                <br>
                                <h2 class="w3-text-white w3-center"> Change Password <hr></h2>
                            </header>
                  
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" style='margin-left: 10%; margin-right: 10%; text-align: center;'>
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
                                                        if(mysqli_query($con,$Pchange)){
                                                            $_SESSION['LoginPassword']=$psd;
                                                           echo "<p class='w3-text-green w3-center'>Password successfuly changed!</p>"; 

                                                            $updateFirstLogin="UPDATE memberuser set firstlogin='1' WHERE name='$un' AND password='$psd'";
                                                           if (mysqli_query($con,$updateFirstLogin)) {
                                                             echo "<p class='w3-text-green w3-center'>Now You Can Do Your Work Without Doubt !!</p>";
                                                            }
                                                          }
                                                        else
                                                        {
                                                            echo "not done";
                                                        }
                                                      }
                                                else{
                                                    
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
                    <!--================CHANGE PROFILE PICTURE MODAL=================================-->
                    <div id="picture-modal" class="w3-modal" style="margin-top: -20px;">
                        <div class="w3-modal-content well" style="width: 50%;">
                            <header class="w3-container w3-blue">
                                <span onclick="getElementById('picture-modal').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;">&times;</span>
                                <h2 class="w3-text-white w3-center">Change Profile Picture <hr></h2>
                            </header>
                                 <?php 
                        if(isset($_POST['changeImg'])){
                            $pic=$_FILES['img']['name'];
                            $target="../StaffPic/".basename($_FILES['img']['name']);
                            
                        }
                      ?>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                                <input type="file" name="img" class="w3-input">
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

                                <input type="submit" name="changeImg" value="Upload" class="btn btn-success w3-center w3-blue">
                            </form>
                            </header>
                        </div>
                    </div>
                    <!--================================ADD NEWS MODAL===========================================-->

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
                                    <input type="text" name="title"  class="w3-input w3-center w3-text-black" value=" <?php if(isset($_POST['edit'])){ if(isset($_SESSION['title'])){echo $_SESSION['title'];} } ?>" required>
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
<!--============================VIEW COMMENT FUNCTION MODAL!=================================================-->
        <div id="view-comment" class="w3-modal " style="margin-top: -20px;">
                <div class="w3-modal-content">
                    <header class="w3-container w3-blue">
                        <span onclick="getElementById('view-comment').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;">&times;</span>
                        <br>
                        <h2 class="w3-center w3-text-white">Client Comments</h2>
                    </header>
                        <table border="1" class="w3-table-all">
                            <style type="text/css">
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