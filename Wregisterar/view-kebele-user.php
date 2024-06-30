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

    <!--==============================VIEW KEBELE USER HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                        <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> KEBELE USER'S</b></i>
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
                                  <!--======================SEARCH KEBELE USER===============-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" placeholder="username..." name="username" style="border-radius: 5%;border-color: blue;">
                                      <input type="submit" name="search" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">

                                    </form>
                                  </div>
                                  <?php
                                  if (isset($_POST['search'])) {
                                    $username=$_POST['username'];
                                    if (empty($username)) {
                                      echo "<p style='color:red;'>Please insert username of user you want search!!</p>";
                                    }

                                    $search="SELECT * FROM memberuser WHERE zcode='$ZCode' AND wcode='$WCode' AND kcode!=''";
                                    $searchR=mysqli_query($con,$search);

                                    while ($list=mysqli_fetch_array($searchR)) {
                                       $uname=$list['name'];
                                       $fullname=$list['FullName'];
                                       $UEmail=$list['email'];
                                       $UPhone=$list['phone'];
                                       $KebeleAssigned=$list['kcode'];
                                    }
                                    ?>
                                    <table border="1" class="w3-table-all">
                                      <th>Full Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Assigned Kebele</th>
                                      <th colspan="2">Action</th>
                                  
                                       <?php 
                                          $selectkebeleU="SELECT * FROM memberuser where name='$username' AND zcode='$ZCode' AND wcode='$WCode' AND kcode!='' ";
                                          if($run=mysqli_query($con,$selectkebeleU)){                                    
                                              
                                         }
                                       ?>
                                       <?php while ($list=mysqli_fetch_array($run)) {
                                           $uname=$list['name'];
                                           $fullname=$list['FullName'];
                                           $UEmail=$list['email'];
                                           $UPhone=$list['phone'];
                                           $KebeleAssigned=$list['kcode'];
                                         ?>
                                       <tr>
                                          <!--======  RETRIEVE KEBELE ASSIGNED FOR CURRENT USER===================-->
                                          <?php
                                            $selek="SELECT * FROM kebele WHERE num='$KebeleAssigned'";
                                            $kebresult=mysqli_query($con,$selek);
                                            $kblist=mysqli_fetch_array($kebresult);
                                            $kname= $kblist['name'];
                                          ?>
                                          <td><?php echo $fullname;?></td>
                                          <td><?php echo  $UEmail; ?></td> 
                                          <td><?php echo  $UPhone; ?></td> 
                                          <td><?php echo  $KebeleAssigned."/".$kname; ?></td> 
                                          <td><a href="edit-kebele-user.php?KUser=<?php echo $uname; ?>">Edit</a></td>
                                          <td><a href="delete-kebele-user.php?DelUser=<?php echo $uname; ?>">Delete</a></td>                           
                                       </tr>
                                     <?php
                                     } ?>

                                     </table>
                                
                                 <?php }

                                  ?>
                                <!--=========================DEFAULT DISPALY WITHOUT SEARCH========================-->
                              <?php
                                    if (!isset($_POST['search'])) {
                                ?>

                                 <table border="1" class="w3-table-all">
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Assigned Kebele</th>
                                    <th colspan="2">Action</th>
                                
                                     <?php 
                                        $selectkebeleU="SELECT * FROM memberuser where zcode='$ZCode' AND wcode='$WCode' AND kcode!='' ";
                                        if($run=mysqli_query($con,$selectkebeleU)){                                    
                                            
                                       }
                                     ?>
                                     <?php while ($list=mysqli_fetch_array($run)) {
                                         $uname=$list['name'];
                                         $fullname=$list['FullName'];
                                         $UEmail=$list['email'];
                                         $UPhone=$list['phone'];
                                         $KebeleAssigned=$list['kcode'];
                                       ?>
                                     <tr>
                                        <!--======  RETRIEVE KEBELE ASSIGNED FOR CURRENT USER===================-->
                                        <?php
                                          $selek="SELECT * FROM kebele WHERE num='$KebeleAssigned'";
                                          $kebresult=mysqli_query($con,$selek);
                                          $kblist=mysqli_fetch_array($kebresult);
                                          $kname= $kblist['name'];
                                        ?>
                                        <td><?php echo $fullname;?></td>
                                        <td><?php echo  $UEmail; ?></td> 
                                        <td><?php echo  $UPhone; ?></td> 
                                        <td><?php echo  $KebeleAssigned."/".$kname; ?></td> 
                                        <td><a href="edit-kebele-user.php?KUser=<?php echo $uname; ?>">Edit</a></td>
                                        <td><a href="delete-kebele-user.php?DelUser=<?php echo $uname; ?>">Delete</a></td>                           
                                     </tr>
                                   <?php
                                   } ?>

                                   </table>



                            <?php  }
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
