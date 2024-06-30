
<style type="text/css">
    
.dash-item {
    margin-top: 0px;
    background: #fff;
}
.dash-item .item-title{
    font-weight: 700;
    margin: 0;
    border-bottom: 1px solid #eee;
    padding: 15px 30px;
}
.dash-item .item-title i {
    margin-right: 10px;
}
.dash-item .inner-item {
    padding: 30px;
}
.dash-item .inner-item  img{
    max-width: 40px;
    border-radius: 50%;
}
.dash-item .inner-item  .title {
    font-weight: 600;
    font-size: 13px;
}

.first-dash-item {
    margin-top: 0px;
}
  th {
      background-color:mediumspringgreen;
      color: black;
      } 

</style>

 <?Php
       include("inc/head.php"); 
        require '../connect.php';

      ?>
      
   <body class="nav-md" >
    <div class="container body" >
        <div class="main_container">
     <?php include("inc/slide.php");

      ?>
            <!-- top navigation -->
    <?Php include("inc/navigation.php"); ?>

    <!--==============================VIEW WOREDA USER HERE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>WOREDA USERS</b></i>
                            </h6>
                        </span>                     
                    </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper" style="margin-top: -10px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">

                                <!--======================SEARCH WOREDA USER ===============-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="username" placeholder="username.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="search" value="Search" style="border-color: blue;border-radius: 5%;background-color: black;color: white;">

                                    </form>
                                  </div>
                                  <?php
                                    if (isset($_POST['search'])) {
                                        
                                        $username=$_POST['username'];
                                        if (empty($username)) {
                                           echo "<p style='color:red; text-align:center;'>Usename Empty Please Insert Username of User you want search</p>";
                                        }
                                             $searchU="SELECT * FROM memberuser where zcode='$ZCode' AND wcode!='' AND kcode='' AND name='$username'";
                                             $searchR=mysqli_query($con,$searchU);
                                             $countU=mysqli_num_rows($searchR);
                                             


                                        ?>
                                        <?php
                                            if (!empty($username)) {
                                                if ($countU==0) {
                                                 echo "<p style='color:red;text-align:center;'>No User Exit with provided Username</p>";
                                             }
                                                
                                               ?>
                                         
                                        <!--======================Searched  VIEW WOREDA USER===============-->
                                        <table class="w3-table-all">
                                            <style type="text/css">
                                                th{
                                                  background-color: blue;
                                                  color: white;
                                                }
                                            </style>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Assigned Woreda</th>
                                            <th colspan="2">Action</th>
                                                <?php 
                                                    $selectworedaU="SELECT * FROM memberuser where zcode='$ZCode' AND wcode!='' AND kcode='' AND name='$username' ";
                                                    if($run=mysqli_query($con,$selectworedaU)){                                    
                                                        
                                                    }
                                                 ?>
                                                 <?php while ($list=mysqli_fetch_array($run)) {
                                                     $fullname=$list['FullName'];
                                                     $username=$list['name'];
                                                     $UEmail=$list['email'];
                                                     $UPhone=$list['phone'];
                                                     $WoredaAssigned=$list['wcode'];
                                                 ?>
                                                 <?php
                                                      $selectwo="SELECT * FROM woreda WHERE num='$WoredaAssigned'";
                                                      $woredaresult=mysqli_query($con,$selectwo);
                                                      while ($woredalist=mysqli_fetch_array($woredaresult)) {
                                                        $uname=$woredalist['name'];
                                                     }
                                                 ?>

                                                 <tr>
                                                    <td><?php echo $fullname;?></td>
                                                    <td><?php echo  $UEmail; ?></td> 
                                                    <td><?php echo  $UPhone; ?></td> 
                                                    <td><?php echo  "(".$WoredaAssigned.")".$uname; ?></td> 
                                                    <td><a href="edit-woreda-user.php?UserID=<?php echo $username;?>">Edit</a></td>
                                                    <td><a href="delete-woreda-user.php?DelID=<?php echo $username; ?>">Delete</a></td>                           
                                                 </tr>
                                                 <?php
                                                 } ?>
                                              </table>
                                           <?php }
                                        ?>
                                   <?php }
                                    if (!isset($_POST['search'])) {
                                       ?>
                                    
                                      <!--==================Noramal Display====VIEW WOREDA USER===============-->
                                        <table class="w3-table-all">
                                        <style type="text/css">
                                                th{
                                                  background-color: blue;
                                                  color: white;
                                                }
                                            </style>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Assigned Woreda</th>
                                            <th colspan="2">Action</th>
                                                <?php 
                                                    $selectworedaU="SELECT * FROM memberuser where zcode='$ZCode' AND wcode!='' AND kcode='' ";
                                                    if($run=mysqli_query($con,$selectworedaU)){                                    
                                                        
                                                    }
                                                 ?>
                                                 <?php while ($list=mysqli_fetch_array($run)) {
                                                     $fullname=$list['FullName'];
                                                     $username=$list['name'];
                                                     $UEmail=$list['email'];
                                                     $UPhone=$list['phone'];
                                                     $WoredaAssigned=$list['wcode'];
                                                 ?>
                                                 <?php
                                                      $selectwo="SELECT * FROM woreda WHERE num='$WoredaAssigned'";
                                                      $woredaresult=mysqli_query($con,$selectwo);
                                                      while ($woredalist=mysqli_fetch_array($woredaresult)) {
                                                        $uname=$woredalist['name'];
                                                     }
                                                 ?>

                                                 <tr>
                                                    <td><?php echo $fullname;?></td>
                                                    <td><?php echo  $UEmail; ?></td> 
                                                    <td><?php echo  $UPhone; ?></td> 
                                                    <td><?php echo  "(".$WoredaAssigned.")".$uname; ?></td> 
                                                    <td><a href="edit-woreda-user.php?UserID=<?php echo $username;?>">Edit</a></td>
                                                    <td><a href="delete-woreda-user.php?DelID=<?php echo $username; ?>">Delete</a></td>                           
                                                 </tr>
                                                 <?php
                                                 } ?>
                                  </table>
                                   <!--======================VIEW WOREDA  USER===============-->


                                   <?php }
                                  ?>


                          </div>
                      </div>
                  </div>
               </div>
            </div>
        </div>
    <!-- Footer============================-->
    <div class=""></div>
        <?Php include("inc/footer.php"); ?>
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="js/custom.min.js"></script>
</body>
</html
