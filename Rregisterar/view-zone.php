
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
            <!-- top navigation -->
    <?Php include("inc/navigation.php"); ?>

    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                       <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>VIEW ZONE STATIONS</b></i>
                            </h6>
                       </span>                    
                      </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                  <!--===SEARCH ZONE STATION====-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="zoneNumber" placeholder="zone number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="search" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">

                                    </form>
                                  </div>
                                  <?php
                                    if (isset($_POST['search'])) {
                                      $zoneN=$_POST['zoneNumber'];
                                      if (empty($zoneN)) {
                                        echo "<p style='color:red;text-align:center;'>Empty Zone Number Please provide Zone that You want!!</p>";
                                      }
                                      if (!empty($zoneN)) {
                                        
                                        $searchZ="SELECT * FROM zone WHERE num='$zoneN'";
                                        $searchR=mysqli_query($con,$searchZ);
                                        $countzone=mysqli_num_rows($searchR);
                                        if ($countzone==0) {
                                           echo "<p style='color:red;text-align:center;'>No Record Exit with input you provide!!</p>";
                                        }?>

                                  <table border="1" class="w3-table-all">
                                      <th>Zone Number</th>
                                      <th>Zone Name</th>   
                                      <th>Assigined User</th>                             
                                      <th colspan="2" class="w3-center">Actions</th>
                                    
                                     <?php 
                                          $retrievezone="SELECT * FROM zone where num='$zoneN' ORDER BY num";
                                          $result=mysqli_query($con,$retrievezone);
                                          if($run=mysqli_query($con,$retrievezone)){                                    
                                        
                                              }
                                              ?>
                                           <?php while ($list=mysqli_fetch_array($run)) {
                                              $zonenum=$list['num'];
                                              $zonename=$list['name'];
                                            ?>
                                           <tr>
                                    <!--==================RETRIVE USER ASSIGNED FOR EACH ZONES==================-->
                                            <?php
                                              $selUser="SELECT * FROM memberuser WHERE zcode='$zonenum' AND role='Zver'";
                                              $resultuser=mysqli_query($con,$selUser);
                                              while ($userlist=mysqli_fetch_array($resultuser)) {
                                                 $fullname=$userlist['FullName'];
                                              }
                                            ?>

                                             <td> <?php echo $zonenum; ?></td>
                                             <td><?php echo $zonename; ?></td>
                                             <td><?php echo  $fullname; ?></td>
                                             <td><a href="edit-zone.php?ZoneNum=<?php echo $zonenum; ?>">Edit</a></td>

                                             <td><a href="delete-zone.php?ZoneNum=<?php echo $zonenum; ?>">Delete</a></td>
                                           </tr>
                                       <?php
                                      } ?>
                                  </table>  

                                     <?php }
                                        ?>
                                      
                                   <?php
                                    }
                                    if (!isset($_POST['search'])) {
                                      ?>
                                      <!--======================VIEW ZONE STATIONS===============-->
                                    <table border="1" class="w3-table-all">
                                      <th>Zone Number</th>
                                      <th>Zone Name</th>   
                                      <th>Assigined User</th>                             
                                      <th colspan="2" class="w3-center">Actions</th>
                                    
                                     <?php 
                                          $retrievezone="SELECT * FROM zone where 1 ORDER BY num";
                                          $result=mysqli_query($con,$retrievezone);
                                          if($run=mysqli_query($con,$retrievezone)){                                    
                                        
                                              }
                                              ?>
                                           <?php while ($list=mysqli_fetch_array($run)) {
                                              $zonenum=$list['num'];
                                              $zonename=$list['name'];
                                            ?>
                                           <tr>
                                    <!--==================RETRIVE USER ASSIGNED FOR EACH ZONES==================-->
                                            <?php
                                              $selUser="SELECT * FROM memberuser WHERE zcode='$zonenum' AND role='Zver'";
                                              $resultuser=mysqli_query($con,$selUser);
                                              while ($userlist=mysqli_fetch_array($resultuser)) {
                                                if ($userlist !== null) {
                                                  $fullname = $userlist['FullName'];
                                                  // Continue processing
                                              } else {
                                                  echo "Wait until assigned..."; 
                                              }
                                              }
                                            ?>

                                             <td> <?php echo $zonenum; ?></td>
                                             <td><?php echo $zonename; ?></td>
                                             <td><?php echo  $fullname; ?></td>
                                             <td><a href="edit-zone.php?ZoneNum=<?php echo $zonenum; ?>">Edit</a></td>

                                             <td><a href="delete-zone.php?ZoneNum=<?php echo $zonenum; ?>">Delete</a></td>
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
