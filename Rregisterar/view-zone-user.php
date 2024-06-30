
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
      background-color:blue;
      color: white;
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
    <?Php include("inc/navigation.php"); ?>
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>VIEW ZONE USERS</b></i>
                            </h6>
                       </span>                    
                    </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item" style="margin-top: -15px;">
                                  <!--========= SEARCH USERES=================-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="username" placeholder="username ..." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="search" value="Search" style="border-color: blue;border-radius: 5%;background-color:blue;color: white;">

                                    </form>
                                  </div>
                                  <?php
                                    if (isset($_POST['search'])) {
                                      $username=$_POST['username'];

                                      ?>
                                     <!--================Searched Value====================-->
                                              <table border="1" class="w3-table-all">
                                              <th>Full Name</th>
                                              <th>Email</th>
                                              <th>Phone</th>  
                                              <th>Assigned Zone</th>                              
                                              <th colspan="2" class="w3-center">Actions</th>
                                              <?php 
                                                  if (empty($username)) {
                                                    echo "<p style='color:red;text-align:center;'> Empty Username Please Provide it !!</p>";
                                                  }
                                                  $retrievezoneuser="SELECT * FROM memberuser where role='Zver' AND name='$username' ORDER BY zcode";
                                                  $result=mysqli_query($con,$retrievezoneuser);

                                                  if($run=mysqli_query($con,$retrievezoneuser)){                                    
                                                      $countUser=mysqli_num_rows($run);
                                                      if (!empty($username) && $countUser==0) {
                                                        echo "<p style='color:red;text-align:center;'> No Record Exist !!</p>";
                                                      }
                                                  }
                                               ?>
                                               <?php while ($list=mysqli_fetch_array($run)) {

                                                      $fullname=$list['FullName'];
                                                      $name=$list['name'];
                                                      $email=$list['email'];
                                                      $phone=$list['phone'];
                                                      $assignedZone=$list['zcode'];


                                                      $selectzname="SELECT * FROM zone WHERE num='$assignedZone'";
                                                      $zonequeryU=mysqli_query($con,$selectzname);
                                                      $zonelist=mysqli_fetch_array($zonequeryU);
                                                      $_SESSION['UZname']=$zonelist['name'];
                                                      $ZNameU= $_SESSION['UZname'];
           
                                                   ?>
                                               <tr>
                                                    <td> <?php echo $fullname; ?></td>
                                                    <td><?php echo  $email; ?></td>
                                                    <td><?php echo  $phone; ?></td>
                                                    <td><?php echo  $assignedZone."/".$ZNameU; ?></td>
                                                    <td><a href="edit-zone-user.php?UseN=<?php echo $username; ?>">Edit</a></td>
                                                    <td><a href="delete-zone-user.php?UseN=<?php echo  $username;?>">Delete</a></td>
                                               </tr>
                                               <?php
                                               } ?>
                                          </table>
                                   <?php }
                                  ?>
                                  <?php
                                    if (!isset($_POST['search'])) {
                                      ?>
                                      <!--=================Normal Display=====================-->
                                      <table border="1" class="w3-table-all">
                                              <th>Full Name</th>
                                              <th>Email</th>
                                              <th>Phone</th>  
                                              <th>Assigned Zone</th>                              
                                              <th colspan="2" class="w3-center">Actions</th>
                                              <?php 
                                                  $retrievezoneuser="SELECT * FROM memberuser where role='Zver' ORDER BY zcode";
                                                  $result=mysqli_query($con,$retrievezoneuser);
                                                  if($run=mysqli_query($con,$retrievezoneuser)){                                    
                                                      
                                                  }
                                               ?>
                                               <?php while ($list=mysqli_fetch_array($run)) {

                                                      $fullname=$list['FullName'];
                                                      $name=$list['name'];
                                                      $email=$list['email'];
                                                      $phone=$list['phone'];
                                                      $assignedZone=$list['zcode'];


                                                      $selectzname="SELECT * FROM zone WHERE num='$assignedZone'";
                                                      $zonequeryU=mysqli_query($con,$selectzname);
                                                      $zonelist=mysqli_fetch_array($zonequeryU);
                                                      $_SESSION['UZname']=$zonelist['name'];
                                                      $ZNameU= $_SESSION['UZname'];
           
                                                   ?>
                                               <tr>
                                                    <td> <?php echo $fullname; ?></td>
                                                    <td><?php echo  $email; ?></td>
                                                    <td><?php echo  $phone; ?></td>
                                                    <td><?php echo  $assignedZone."/".$ZNameU; ?></td>
                                                    <td><a href="edit-zone-user.php?UseN=<?php echo $name; ?>">Edit</a></td>
                                                    <td><a href="delete-zone-user.php?UseN=<?php echo  $name;?>">Delete</a></td>
                                               </tr>
                                               <?php
                                               } ?>
                                          </table>

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
