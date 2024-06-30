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

    <!--==============================VIEW BIRTH HERE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                       <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>KEBELE STATIONS</b></i>
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

                                    <!--====================Search Kebele Stations===================-->
                                 <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="kebelenum" placeholder="Kebele  Number.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="searchkebele" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">
                                    </form>
                                  </div>
                                  <!--===============SEARCH FORM=============-->
                                  <?php
                                      if (isset($_POST['searchkebele'])) {
                                        //echo "Begin Search";
                                        $kebeleNumber=$_POST['kebelenum'];
                                        ?>
                                        <!---=============================Searched=========================-->
                                    <?php 
                                       if (empty($kebeleNumber)) {
                                           echo "<p style='color:red;text-align:center;'>Empty Kebele Number</p>";
                                       }
                                        $resultPerPage=10;
                                        $query="SELECT *FROM kebele where num='$kebeleNumber'";
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
                                                $sql="SELECT * FROM kebele WHERE num='$kebeleNumber'  LIMIT $thisPageResult,$resultPerPage ";
                                                if($run=mysqli_query($con,$sql)){
                                                        $check=mysqli_num_rows($run);
                                                        if (!empty($kebeleNumber) && $check==0) {
                                                            echo "<p style='color:red;text-align:center;'>No Kebele with Provided Input</p>";
                                                        }
                                                    ?>
                                                    <table class="w3-table-all">
                                                        <tr>
                                                            <th>Kebele Number</th> 
                                                            <th>Kebele Name</th>
                                                            <th>Woreda <br>ወረዳ</th>
                                                            <th>Assigned User</th>
                                                           
                                                        </tr>
                                                    <?php
                                                      while($row=mysqli_fetch_array($run)){
                                                            $_SESSION['woredanum']=$row['woreda'];
                                                            $WNum=$_SESSION['woredanum'];
                                                            $Kcode=$row['num'];
                                                              
                                                            ?>
                                                            <?php

                                                                $selectuser="SELECT * FROM memberuser WHERE kcode='$Kcode'";
                                                                $resultuser=mysqli_query($con,$selectuser);
                                                                $userlist=mysqli_fetch_array($resultuser);
                                                                $username=$userlist['name'];
                                                                $fullname=$userlist['FullName'];

                                                                $selectworeda="SELECT * FROM woreda WHERE num='$WNum'";
                                                                $woresult=mysqli_query($con,$selectworeda);
                                                                $woredalist=mysqli_fetch_array($woresult);
                                                                $_SESSION['woredaname']=$woredalist['name'];
                                                                $WName= $_SESSION['woredaname'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['num']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $WName; ?></td>
                                                                <td><?php echo $fullname; ?></td>
                                                               
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
                                                        for($page=1;$page<$numberOfPages;$page++){
                                                            echo " <a href=\"view-kebele.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                                            }

                                                     ?></h3>


                                     <?php }
                                  ?>
                                  <!--=======================Normal Display================================-->
                                  <?php
                                      if (!isset($_POST['searchkebele'])) {
                                        
                                        ?>
                                       <!--============== <h1>Normal</h1>==================-->
                                      <?php 
                                       
                                        $resultPerPage=10;
                                        $query="SELECT *FROM kebele where 1";
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
                                                $sql="SELECT * FROM kebele WHERE 1   LIMIT $thisPageResult,$resultPerPage ";
                                                if($run=mysqli_query($con,$sql)){
                                                    ?>
                                                    <table class="w3-table-all">
                                                        <tr>
                                                            <th>Kebele Number</th> 
                                                            <th>Kebele Name</th>
                                                            <th>Woreda</th>
                                                            <th>Assigned User</th>
                                                           
                                                        </tr>
                                                    <?php
                                                      while($row=mysqli_fetch_array($run)){
                                                            $_SESSION['woredanum']=$row['woreda'];
                                                            $WNum=$_SESSION['woredanum'];
                                                            $Kcode=$row['num'];
                                                              
                                                            ?>
                                                            <?php

                                                                $selectuser="SELECT * FROM memberuser WHERE kcode='$Kcode'";
                                                                $resultuser=mysqli_query($con,$selectuser);
                                                                $userlist=mysqli_fetch_array($resultuser);
                                                                $username=$userlist['name'];
                                                                $fullname=$userlist['FullName'];

                                                                $selectworeda="SELECT * FROM woreda WHERE num='$WNum'";
                                                                $woresult=mysqli_query($con,$selectworeda);
                                                                $woredalist=mysqli_fetch_array($woresult);
                                                                $_SESSION['woredaname']=$woredalist['name'];
                                                                $WName= $_SESSION['woredaname'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['num']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $WName; ?></td>
                                                                <td><?php echo  $fullname; ?></td>
                                                               
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
                                                        for($page=1;$page<$numberOfPages;$page++){
                                                            echo " <a href=\"view-kebele.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                                            }

                                                     ?></h3>


                                     <?php }
                                  ?>
                                     <!--====================Search Kebele Stations===================-->

                                    
                                  <!--======================RETIEVE ASSIGNED PERSON===============-->
                                  <!--====================VIEW KEBELE========================--> 
 
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
