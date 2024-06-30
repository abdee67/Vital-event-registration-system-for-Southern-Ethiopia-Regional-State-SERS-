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

    <!--==============================VIEW DEATH HERE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 10px;">
                        <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> DEATH EVENT RECORD'S</b></i>
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
                                  <!--================Search begin-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="deathnum" placeholder="Death Number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="searchdeath" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">
                                    </form>
                                  </div>
                                  <!--===============SEARCH FORM=============-->
                                  <?php
                                  
                                      if (isset($_POST['searchdeath'])) {
                                       
                                        $deathNum=$_POST['deathnum'];

                                        ?>
                                        <!--=============Searched Results==============-->
                                     <?php 
                                        
                                       if (empty($deathNum)) {
                                           echo "<p style='color:red;text-align:center;'>Empty Death Number !!</p>";
                                         }
                                        $resultPerPage=10;
                                        $query="SELECT *FROM deathevent where kcode='$KCode' AND wcode='$WCode'AND zcode='$ZCode' AND eventnumber='$deathNum'";
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
                                       $sql="SELECT * FROM deathevent WHERE kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode' AND eventnumber='$deathNum' order by eventnumber LIMIT $thisPageResult,$resultPerPage ";
                                      if($run=mysqli_query($con,$sql)){
                                            $checkDe=mysqli_num_rows($run);
                                            if (!empty($deathNum) && $checkDe==0) {

                                              echo "<p style='color:red;text-align:center;'>Record Not Exist !!</p>";
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
                                            <th class="small">Death_ID</th>
                                            <th class="small">Full Name</th> 
                                            <th class="small">Sex</th>
                                            <th class="small">Nationality</th>
                                            <th class="small">Religion</th>
                                            <th class="small">Job</th>
                                            <th class="small">Death Date</th>
                                            <th class="small w3-center" colspan="3">Action</th>
                                       </tr>
                                      <?php
                                         while($row=mysqli_fetch_array($run)){
                                              ?>
                                             <tr>
                                                <td><?php echo $row['eventnumber'];?></td>
                                                <td><?php echo $row['title']." ".$row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
                                                <td><?php echo $row['sex']; ?></td>
                                                <td><?php echo $row['nationality']; ?></td>
                                                <td><?php echo $row['religion'] ; ?></td>
                                                <td><?php echo $row['job'] ; ?></td>
                                                <td><?php echo $row['dateofdeath']; ?></td>
                                                <td><a href="edit-death.php?DeathId=<?php echo $row['eventnumber']; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="delete-death.php?DeathDel=<?php echo $row['eventnumber'];?>"><i class="fa fa-remove"></i></a></td>
                                                <td><a href="death-certificate.php?DeathCert=<?php echo $row['eventnumber']; ?>">Certificate</a></td>
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
                                    echo " <a href=\"death-view.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                    }
                                     ?></h3>  
                                      
                                     <?php }
                                  ?>
                                  <!--========================Normal Display=================-->
                                  <?php
                                      if (!isset($_POST['searchdeath'])) {
                                       // echo "Begin Search";
                                        ?>
                                        <!---===============Normal Display==================-->

                                     <?php 
                                      
                                        $resultPerPage=10;
                                        $query="SELECT *FROM deathevent where kcode='$KCode' AND zcode='$ZCode' AND wcode='$WCode'  ";
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
                                       $sql="SELECT * FROM deathevent WHERE kcode='$KCode' AND zcode='$ZCode' AND wcode='$WCode' order by eventnumber LIMIT $thisPageResult,$resultPerPage ";
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
                                            <th class="small">Death_ID</th>
                                            <th class="small">Full Name</th> 
                                            <th class="small">Sex</th>
                                            <th class="small">Nationality</th>
                                            <th class="small">Religion</th>
                                            <th class="small">Job</th>
                                            <th class="small">Death Date</th>
                                            <th class="small w3-center" colspan="3">Action</th>
                                       </tr>
                                      <?php
                                         while($row=mysqli_fetch_array($run)){
                                              ?>
                                             <tr>
                                                <td><?php echo $row['eventnumber'];?></td>
                                                <td><?php echo $row['title']." ".$row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
                                                <td><?php echo $row['sex']; ?></td>
                                                <td><?php echo $row['nationality']; ?></td>
                                                <td><?php echo $row['religion'] ; ?></td>
                                                <td><?php echo $row['job'] ; ?></td>
                                                <td><?php echo $row['dateofdeath']; ?></td>
                                                <td><a href="edit-death.php?DeathId=<?php echo $row['eventnumber']; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="delete-death.php?DeathDel=<?php echo $row['eventnumber'];?>"><i class="fa fa-remove"></i></a></td>
                                                <td><a href="death-certificate.php?DeathCert=<?php echo $row['eventnumber']; ?>">Certificate</a></td>
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
                                    echo " <a href=\"death-view.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                    }
                                     ?></h3>  
                                       




                                     <?php }
                                  ?>


                                  <!--Search ends=================-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================VIEW DEATH ENDS HERE===========================-->
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
