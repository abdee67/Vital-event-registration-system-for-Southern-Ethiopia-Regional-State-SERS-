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

    <!--==============================VIEW WOREDA BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                         <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> WOREDA STATIONS</b></i>
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
                            <!--======================SEARCH WOREDA===============-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="worNum" placeholder="woreda number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="search" value="Search" style="border-color: blue;border-radius: 5%;background-color: black;color: white;">

                                    </form>
                                  </div>
                                  <?php
                                    if (isset($_POST['search'])) {
                                      $worNum=$_POST['worNum'];
                                      if (empty($worNum)) {
                                        echo "<p style='color:red;text-align:center;'>Empty woreda number. Please Insert Woreda Number you want to search</p>";
                                      }
                                      if (!empty($worNum)) {

                                        $serchw="SELECT * FROM woreda where num='$worNum'";
                                        $searchR=mysqli_query($con,$serchw);
                                        $countworeda=mysqli_num_rows($searchR);
                                        if (!empty($worNum) && $countworeda==0) {
                                          echo "<p style='color:red; text-align:center;'>No Woreda Exist with provided input</p>";
                                        }
                                        if ($searchR) {
                                          $list=mysqli_fetch_array($searchR);
                                          $woredanum=$list['num'];
                                          $woredname=$list['name'];                                        }
                                        if (empty($searchR)) {
                                          echo "<p style='color:red;'> Some Error Happened</p>";
                                        }
                                        ?>
                                         <table class="w3-table-all">
                                          <style type="text/css">
                                            th{
                                              background-color:blue;
                                              color:white;
                                            }
                                          </style>
                                          <th>Number</th>
                                          <th>Name</th>
                                          <th>Assigned User</th>
                                          <th colspan="2">Action</th>
                                         <?php 
                                           $selectworeda="SELECT * FROM woreda where zone='$ZCode' AND num='$worNum' ";
                                           if($run=mysqli_query($con,$selectworeda)){                                  
                                              }
                                           ?>
                                        <?php while ($list=mysqli_fetch_array($run)) {
                                            $woredanum=$list['num'];
                                            $woredname=$list['name'];
                                          ?>
                                  
                                         <tr>
                                          <?php
                                            $selctuser="SELECT * FROM memberuser WHERE zcode='$ZCode' AND wcode='$woredanum' AND role='Wver'";
                                            $uresult=mysqli_query($con,$selctuser);
                                            $ulist=mysqli_fetch_array($uresult);
                                            $uname=$ulist['FullName'];
                                          ?>
                                            <td><?php echo $woredanum;?></td>
                                            <td><?php echo  $woredname; ?></td> 
                                            <td><?php echo  $uname;?></td>
                                            
                                            <td><a href="edit-woreda.php?WoId=<?php echo $woredanum;  ?>">Edit</a></td>
                                            <td><a href="delete-woreda.php?DelWor=<?php echo $woredanum; ?>">Delete</a></td>                           
                                        </tr>
                                       <?php
                                       } ?>
                                   </table>
                                     <?php }
                                    }
                                  ?>
                                  <?php
                                    if (!isset($_POST['search'])) {
                                      ?>
                                      <!--======================VIEW WOREDA===============-->
                                    <table class="w3-table-all">
                                    <style type="text/css">
                                            th{
                                              background-color:blue;
                                              color: white;
                                            }
                                          </style>
                                       <th>Number</th>
                                       <th>Name</th>
                                       <th>Assigned User</th>
                                       <th colspan="2">Action</th>
                                      <?php 
                                           $selectworeda="SELECT * FROM woreda where zone='$ZCode' ";
                                           if($run=mysqli_query($con,$selectworeda)){                                  
                                                  }
                                      ?>
                                      <?php while ($list=mysqli_fetch_array($run)) {
                                         $woredanum=$list['num'];
                                         $woredname=$list['name'];
                                       ?>
                                      
                                     <tr>
                                      <?php
                                        $selctuser="SELECT * FROM memberuser WHERE zcode='$ZCode' AND wcode='$woredanum' AND role='Wver'";
                                        $uresult=mysqli_query($con,$selctuser);
                                        $ulist=mysqli_fetch_array($uresult);
                                        if ($ulist !== null) {
                                          $uname = $ulist['FullName'];
                                      } else {
                                          echo "Please wait until assigned an user...";
                                      }
                                                                            ?>
                                        <td><?php echo $woredanum;?></td>
                                        <td><?php echo  $woredname; ?></td> 
                                        <td><?php echo  $uname;?></td>
                                        
                                        <td><a href="edit-woreda.php?WoId=<?php echo $woredanum;  ?>">Edit</a></td>
                                        <td><a href="delete-woreda.php?DelWor=<?php echo $woredanum; ?>">Delete</a></td>                           
                                    </tr>
                                   <?php
                                   } ?>
                                </table>



                                      <?php
                                    }

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
