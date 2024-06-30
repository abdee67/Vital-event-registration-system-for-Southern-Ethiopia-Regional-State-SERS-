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
                    <div class="" style="margin-top: 10px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>ADOPTION RECORDS</b>";?> </h2></span>
                    </div>
                </div>
                <!--let begin here-->
                <div class="main-content table-responsive" id="content-wrapper">
                    <div class="container-fluid " >
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
               
                              <!--======================SEARCH BEGI HERE======================--->
                                 <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="adoptnum" placeholder="Adoption Number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="searchadopt" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">
                                    </form>
                                  </div>
                                  <!--===============SEARCH FORM=============-->
                                  <?php
                                      if (isset($_POST['searchadopt'])) {
                                        $adoptNum=$_POST['adoptnum'];
                                        ?>
                                       <!--============== <h1>Searched</h1>==========-->
                                     <?php 
                                        if (empty($adoptNum)) {
                                          echo "<p style='color:red;text-align:center;'>Empty Adoption Number Please Provide it</p>";
                                        }
                                        $resultPerPage=10;
                                        $query="SELECT *FROM adoptevent where kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode'  AND adoptnum='$adoptNum' ";
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
                                       $sql="SELECT * FROM adoptevent WHERE kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode' AND adoptnum='$adoptNum' order by adoptnum LIMIT $thisPageResult,$resultPerPage ";
                                      if($run=mysqli_query($con,$sql)){
                                            $check=mysqli_num_rows($run);
                                            if (!empty($adoptNum) && $check==0) {
                                              echo "<p style='color:red;text-align:center;'>Record Not Exist </p>";
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

                                            <th class="small">ADOPTION NUM</th>
                                            <th class="small">FULL NAME</th>
                                            <th class="small">SEX</th>
                                            <th class="small">NATIONALITY</th>
                                            <th class="small">ADOPT PERSON</th>
                                            <th class="small">DOB</th>
                                            <th class="small w3-center" colspan="3">ACTION</th>
                                         </tr>
                                      <?php
                                         while($row=mysqli_fetch_array($run)){
                                              ?>
                                             <tr>
                                                <td><?php echo $row['adoptnum']; ?></td>
                                                <td><?php echo $row['newfname']." ".$row['newmname']." ".$row['newlname']; ?></td>
                                                <td><?php echo $row['sexadopt']; ?></td>
                                                <td><?php echo $row['nationlityadopt'];?></td>
                                                <td><?php echo $row['currparentfname']; ?></td>
                                                <td><?php echo $row['dobadopt']; ?></td>
                                                <td><a href="edit-adoption.php?AdoptID=<?php echo $row['adoptnum']; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="delete-adopt.php?AdoptDel=<?php echo $row['adoptnum']; ?>"><i class="fa fa-remove"></i></a></td>
                                                <td><a href="adotpion-certificate.php?AdotpCert=<?php echo $row['adoptnum']; ?>">Certificate</a></td>
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
                                    echo " <a href=\"adoption-view.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                    }
                                     ?></h3>  


                                     <?php }
                                  ?>
                                  <!--=====================NORMAL DISPLAY=========================-->
                                  <?php
                                      if (!isset($_POST['searchadopt'])) {
                                        //echo "Begin Search";
                                        ?>
                                        <!--=====<h1>Normal</h1>==================-->
                                     <?php 
                                        $resultPerPage=10;
                                        $query="SELECT *FROM adoptevent where kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode'  ";
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
                                       $sql="SELECT * FROM adoptevent WHERE kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode' order by adoptnum LIMIT $thisPageResult,$resultPerPage ";
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

                                            <th class="small">ADOPTION NUM</th>
                                            <th class="small">FULL NAME</th>
                                            <th class="small">SEX</th>
                                            <th class="small">NATIONALITY</th>
                                            <th class="small">ADOPT PERSON</th>
                                            <th class="small">DOB</th>
                                            <th class="small w3-center" colspan="3">ACTION</th>
                                         </tr>
                                      <?php
                                         while($row=mysqli_fetch_array($run)){
                                              ?>
                                             <tr>
                                                <td><?php echo $row['adoptnum']; ?></td>
                                                <td><?php echo $row['newfname']." ".$row['newmname']." ".$row['newlname']; ?></td>
                                                <td><?php echo $row['sexadopt']; ?></td>
                                                <td><?php echo $row['nationlityadopt'];?></td>
                                                <td><?php echo $row['currparentfname']; ?></td>
                                                <td><?php echo $row['dobadopt']; ?></td>
                                                <td><a href="edit-adoption.php?AdoptID=<?php echo $row['adoptnum']; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="delete-adopt.php?AdoptDel=<?php echo $row['adoptnum']; ?>"><i class="fa fa-remove"></i></a></td>
                                                <td><a href="adotpion-certificate.php?AdotpCert=<?php echo $row['adoptnum']; ?>">Certificate</a></td>
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
                                    echo " <a href=\"adoption-view.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
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
