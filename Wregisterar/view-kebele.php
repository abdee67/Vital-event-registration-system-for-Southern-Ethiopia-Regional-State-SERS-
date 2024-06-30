
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
    <!--==============================VIEW KEBELE HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                         <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> KEBELE STATIONS</b></i>
                            </h6>
                         </span>                    
                     </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper" style="margin-top: -20px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                  <!--======================SEARCH KEBELE===============-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="kebelenum" placeholder="kebele number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="search" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">

                                    </form>
                                  </div>
                                
                                  <?php
                                  
                                    if (isset($_POST['search'])) {

                                      $kebelenumber=$_POST['kebelenum'];
                                      if (empty($kebelenumber)) {
                                        echo "<p style='color:red;'>Fill Kebele Number You are Wants !!</p>";
                                      }
                                      if (!empty($kebelenumber)) {
                                          $selectkeb="SELECT * FROM kebele WHERE woreda='$WCode' AND zone='$ZCode' AND num='$kebelenumber'";

                                           $searchR=mysqli_query($con,$selectkeb);
                                          if ($searchR) {
                                            $klist=mysqli_fetch_assoc($searchR);
                                            $kname=$klist['name'];  
                                            $knum=$klist['num'];
                                            $resultnumber=mysqli_num_rows($searchR);
                                               if($resultnumber==0){
                                                echo "<p style='color:red;'
                                                >No Record Exist With Kebele Number you provide</p>";
                                              }
                                            
                                          }
                                          if (empty($searchR)) {
                                            echo "<p>Some Error</p>";
                                          }
                                         
                                                                           
                                          ?>
                                            <table border="1" class="w3-table-all">
                                                <tr>
                                                  <th>Number </th>
                                                  <th>Name </th>   
                                                  <th>Assigned User</th>                             
                                                  <th colspan="2">Action</th>
                                                </tr>
                                              <?php
                                                 $ZCode=$_SESSION['zonecode'];
                                                 $WCode=$_SESSION['woredacode'];
                                                 $selectuser="SELECT * FROM memberuser WHERE kcode='$kebelenumber' AND wcode='$WCode' AND zcode='$ZCode' ";
                                                 $userResult=mysqli_query($con,$selectuser);
                                                 $ulist=mysqli_fetch_assoc($userResult);
                                                 $fullname=$ulist['FullName'];
                                                 ?>
                                                <ul>
                                                  <td><?php echo $knum; ?></td>
                                                  <td><?php echo $kname; ?></td>
                                                  <td><?php echo $fullname;?></td>
                                                  <td><a href="edit-kebele.php?kebID=<?php echo $knum; ?>">Edit</a></td>
                                                 <td><a href="delete-kebele.php?DelKeb=<?php echo $knum; ?>">Delete</a></td>                   
                                                </tr>
                                            <?php
                                            } ?>
                                        </table>
                                     <?php 
                                    }
                                    
                                  ?>
                                  <?php
                                    if (!isset($_POST['search'])) {

                                  ?>
                                  <table border="1" class="w3-table-all">

                                  <tr>
                                      <th>Number </th>
                                      <th>Name </th>   
                                      <th>Assigned User</th>                             
                                      <th colspan="2">Action</th>
                                  </tr>
                                  <?php 
                                   
                                    $kebele="SELECT * FROM kebele WHERE woreda='$WCode' AND zone='$ZCode'";
                                    if($run=mysqli_query($con,$kebele)){                                    
                                    }
                                  ?>
                                 <?php while ($list=mysqli_fetch_array($run)) {
                                      $kebelenum=$list['num'];
                                      $kebelename=$list['name'];
                                   ?>
                                 <tr>
                                    <?php
                                         $ZCode=$_SESSION['zonecode'];
                                        $WCode=$_SESSION['woredacode'];
                                        $selectuser="SELECT * FROM memberuser WHERE kcode='$kebelenum' AND wcode='$WCode' AND zcode='$ZCode' ";
                                        $userResult=mysqli_query($con,$selectuser);
                                        $ulist=mysqli_fetch_assoc($userResult);
                                        if ($ulist !== null) {
                                          $fullname = $ulist['FullName'];
                                          // Continue processing
                                      } else {
                                          echo "Wait until assigned..."; 
                                      }
                                        
                                    ?>
                                  <ul>
                                     <td><?php echo $kebelenum; ?></td>
                                     <td><?php echo $kebelename; ?></td>
                                     <td><?php echo $fullname;?></td>
                                     <td><a href="edit-kebele.php?kebID=<?php echo $kebelenum; ?>">Edit</a></td>
                                     <td><a href="delete-kebele.php?DelKeb=<?php echo $kebelenum; ?>">Delete</a></td>                   
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
