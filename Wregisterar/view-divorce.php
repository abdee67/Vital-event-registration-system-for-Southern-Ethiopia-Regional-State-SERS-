
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

    <!--==============================VIEW DIVORCE HERE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 10px;">
                        <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> DIVORCE EVENT RECORD'S</b></i>
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
                                    <!--======================Divorce Search ========================-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="divorcenum" placeholder="Divorce Number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="searchdivorce" value="Search" style="border-color: blue;border-radius: 5%;background-color: black;color: white;">
                                    </form>
                                  </div>
                                  <!--===============SEARCH FORM=============-->
                                  <?php
                                      if (isset($_POST['searchdivorce'])) {
                                        //echo "Begin Search";
                                        $divorceNumber=$_POST['divorcenum'];
                                        ?>
                                        <!--===========<h1>Searched</h1>================-->
                                      <?php 
                                          if (empty($divorceNumber)) {
                                            echo "<p style='color:red;text-align:center;'>Empty Divorce Number</p>";
                                          }
                                          $resultPerPage=10;
                                          $query="SELECT *FROM divorceevent WHERE wcode='$WCode' AND zcode='$ZCode' AND dveventnum='$divorceNumber' ";
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
                                         $sql="SELECT * FROM divorceevent WHERE wcode='$WCode' AND zcode='$ZCode' AND dveventnum='$divorceNumber' order by id desc LIMIT $thisPageResult,$resultPerPage ";
                                        if($run=mysqli_query($con,$sql)){
                                              $check=mysqli_num_rows($run);
                                              if (!empty($divorceNumber) && $check==0) {
                                               echo "<p style='color:red;text-align:center;'>Record Not Exist</p>";
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
                                             <th class="small">Divorce_ID</th>
                                             <th class="small">W_Full Name</th>
                                             <th class="small">W_Nationality</th>
                                             <th class="small">W_Religion</th>
                                             <th class="small">H_Full Name</th>
                                             <th class="small">H_Nationality</th>
                                             <th class="small">H_Religion</th>
                                         
                                             <th class="small">Report</th>
                                           </tr>
                                        <?php
                                           while($row=mysqli_fetch_array($run)){
                                                ?>
                                               <tr>
                                                 <td><?php echo $row['dveventnum']; ?> </td>
                                                 <td><?php echo $row['wfnamedv']." ".$row['wmnamedv']." ".$row['wlnamedv']; ?> </td>
                                                  <td><?php echo $row['wnationalitydv']; ?></td>
                                                  <td><?php echo $row['wreligiondv']; ?> </td>
                                                  <td><?php echo $row['hfnamedv']." ".$row['hmnamedv']." ".$row['hlnamedv']; ?> </td>
                                                  <td><?php echo $row['hnationalitydv'];?> </td>
                                                  <td><?php echo $row['hreligiondv']; ?> </td>
                                                
                                                  <td><a href="divorce-report-individual.php?DivID=<?php echo $row['dveventnum']; ?>"><i class="fa fa-bullhorn"></i></a></td>
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
                                      echo " <a href=\"view-divorce.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                      }
                                       ?></h3>  

                                     <?php }
                                  ?>
                                  <?php
                                      if (!isset($_POST['searchdivorce'])) {
                                        //echo "Begin Search";
                                        ?>
                                        <!--==================<h1>Normal</h1>=================-->
                                       <?php 
                                          $resultPerPage=10;
                                          $query="SELECT *FROM divorceevent WHERE wcode='$WCode' AND zcode='$ZCode' ";
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
                                         $sql="SELECT * FROM divorceevent WHERE wcode='$WCode' AND zcode='$ZCode' order by id desc LIMIT $thisPageResult,$resultPerPage ";
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
                                             <th class="small">Divorce_ID</th>
                                             <th class="small">W_Full Name</th>
                                             <th class="small">W_Nationality</th>
                                             <th class="small">W_Religion</th>
                                             <th class="small">H_Full Name</th>
                                             <th class="small">H_Nationality</th>
                                             <th class="small">H_Religion</th>
                                         
                                             <th class="small">Report</th>
                                           </tr>
                                        <?php
                                           while($row=mysqli_fetch_array($run)){
                                                ?>
                                               <tr>
                                                 <td><?php echo $row['dveventnum']; ?> </td>
                                                 <td><?php echo $row['wfnamedv']." ".$row['wmnamedv']." ".$row['wlnamedv']; ?> </td>
                                                  <td><?php echo $row['wnationalitydv']; ?></td>
                                                  <td><?php echo $row['wreligiondv']; ?> </td>
                                                  <td><?php echo $row['hfnamedv']." ".$row['hmnamedv']." ".$row['hlnamedv']; ?> </td>
                                                  <td><?php echo $row['hnationalitydv'];?> </td>
                                                  <td><?php echo $row['hreligiondv']; ?> </td>
                                                
                                                  <td><a href="divorce-report-individual.php?DivID=<?php echo $row['dveventnum']; ?>"><i class="fa fa-bullhorn"></i></a></td>
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
                                      echo " <a href=\"view-divorce.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                      }
                                       ?></h3>  



                                     <?php }
                                  ?>

                                    <!--======================Divorce Search ends here==============-->



                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================VIEW DIVORCE ENDS HERE===========================-->
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
