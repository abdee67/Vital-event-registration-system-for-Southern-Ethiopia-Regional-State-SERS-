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

    <!--==============================VIEW BIRTH HERE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                       <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> BIRTH EVENT RECORD'S</b></i>
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
                                  <!--===========SEARCH FORM===============-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="birthnum" placeholder="Birth Number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="searchbirth" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">
                                    </form>
                                  </div>
                                  <!--===============SEARCH FORM=============-->
                                
                                  <?php
                                      if (isset($_POST['searchbirth'])) {
                                        $birthNumer=$_POST['birthnum'];
                                        ?>
                                        

                                      <?php 
                                         if (empty($birthNumer)) {
                                           echo "<p style='color:red;text-align:center;'>Empty Birth Number !!</p>";
                                         }
                                          $resultPerPage=10;
                                          $query="SELECT *FROM birthevent where kebele='$KCode' AND woreda='$WCode' AND zone='$ZCode' AND eventnumber='$birthNumer' ";
                                          $run=mysqli_query($con,$query);
                                          $num=mysqli_num_rows($run);
                                          $numberOfPages=ceil($num/$resultPerPage);

                                          if(!isset($_GET['page'])){
                                               $page=1;
                                          }
                                        else
                                           {
                                             $page=$_GET['page'];
                                            }
                                         $thisPageResult=($page-1)*$resultPerPage;
                                         $sql="SELECT * FROM birthevent WHERE kebele='$KCode' AND eventnumber='$birthNumer' order by eventnumber desc LIMIT $thisPageResult,$resultPerPage ";
                                        if($run=mysqli_query($con,$sql)){
                                              $checkSearch=mysqli_num_rows($run);
                                              if (!empty($birthNumer) && $checkSearch==0) {
                                                echo "<p style='color:red;text-align:center;'>No record Exit  !!</p>";
                                              }
                                             ?>
                                          <table class="w3-table-all">
                                              <style type="text/css">
                                                th {
                                                    background-color:blue;
                                                    color: white;
                                                   } 
                                              </style>
                                           <tr>
                                              <th class="small">Birth Id</th>
                                              <th class="small">Full Name</th> 
                                              <th class="small">Sex</th>
                                              <th class="small">Nationality</th>
                                              <th class="small">DOB</th>
                                              <th class="small w3-center" colspan="3">Action</th>
                                         </tr>
                                        <?php
                                           while($row=mysqli_fetch_array($run)){
                                                ?>
                                               <tr>
                                                  <td><?php echo $row['eventnumber'];?></td>
                                                  <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
                                                  <td><?php echo $row['sex'];?></td>
                                                  <td><?php echo $row['nationality'];?></td>
                                                  <td><?php echo $row['day'];?></td>
                                                  <td><a href="edit-birth.php?GetId=<?php echo $row['eventnumber']; ?>"><i class="fa fa-edit"></i></a></td>
                                                  <td><a href="delete-birth.php?Del=<?php echo $row['eventnumber']; ?>"><i class="fa fa-remove"></i></a></td>
                                                  <td><a href="birth-certificate.php?Cert=<?php echo $row['eventnumber']; ?>">Certificate</a></td>
                                                </tr>
                                              <?php
                                               ?>       
                                              </a><?php
                                          }
                                  echo "</table>";
                                  }
                                  else
                                    echo "not done";?>
                                  <?php
                                  ?>
                                  <h3 class="w3-center w3-text-blue" > <?php     
                                  for($page=1;$page<$numberOfPages;$page++)
                                      {
                                      echo " <a href=\"birth-view.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                      }
                                       ?></h3>  
                                      
                                     <?php }
                                  ?>
                                  <!--===========================Normal Search=============================-->
                                  <!--===========================Normal Search=============================-->
                                  <?php
                                      if (!isset($_POST['searchbirth'])) {
                                        
                                        ?>
                                       <!--==================== Normal=====================================-->

                                       <?php 
                                         
                                          $resultPerPage=10;
                                          $query="SELECT *FROM birthevent where kebele='$KCode' AND woreda='$WCode' AND zone='$ZCode' ";
                                          $run=mysqli_query($con,$query);
                                          $num=mysqli_num_rows($run);
                                          $numberOfPages=ceil($num/$resultPerPage);

                                          if(!isset($_GET['page'])){
                                               $page=1;
                                          }
                                        else
                                           {
                                             $page=$_GET['page'];
                                            }
                                         $thisPageResult=($page-1)*$resultPerPage;
                                         $sql="SELECT * FROM birthevent WHERE kebele='$KCode' AND woreda='$WCode' AND zone='$ZCode' order by eventnumber DESC,fname ASC LIMIT $thisPageResult,$resultPerPage ";
                                        if($run=mysqli_query($con,$sql)){
                                             ?>
                                          <table class="w3-table-all">
                                              <style type="text/css">
                                                th {
                                                    background-color:blue;
                                                    color: white;
                                                   } 
                                              </style>
                                           <tr>
                                              <th class="small">Birth Id</th>
                                              <th class="small">Full Name</th> 
                                              <th class="small">Sex</th>
                                              <th class="small">Nationality</th>
                                              <th class="small">DOB</th>
                                              <th class="small w3-center" colspan="3">Action</th>
                                         </tr>
                                        <?php
                                           while($row=mysqli_fetch_array($run)){
                                                ?>
                                                
                                               <tr>
                                                  <td><?php echo $row['eventnumber'];?></td>
                                                  <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'];?></td>
                                                  <td><?php echo $row['sex'];?></td>
                                                  <td><?php echo $row['nationality'];?></td>
                                                  <td><?php echo $row['day'];?></td>
                                                  <td><a href="edit-birth.php?GetId=<?php echo $row['eventnumber']; ?>"><i class="fa fa-edit"></i></a></td>
                                                  <td><a href="delete-birth.php?Del=<?php echo $row['eventnumber']; ?>"><i class="fa fa-remove"></i></a></td>
                                                  <td><a href="birth-certificate.php?Cert=<?php echo $row['eventnumber']; ?>">Certificate</a></td>
                                                </tr>
                                              <?php
                                               ?>       
                                              </a><?php
                                          }
                                  echo "</table>";
                                  }
                                  else
                                    echo "not done";?>
                                  <?php
                                  ?>
                                  <h3 class="w3-center w3-text-blue" > <?php     
                                  for($page=1;$page<$numberOfPages;$page++)
                                      {
                                      echo " <a href=\"birth-view.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                      }
                                       ?></h3>  
                                       
                                     <?php }
                                  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================VIEW BIRTH ENDS HERE===========================-->


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
