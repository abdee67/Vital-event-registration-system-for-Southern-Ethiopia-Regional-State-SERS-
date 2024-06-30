
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
 //session_start();

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
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>VIEW REGION</b></i>
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
                                  <!--======================RETIEVE ASSIGNED PERSON===============-->
                                  <!--====================VIEW REGION========================-->  

                                <table class="w3-table-all">
                                    <th>Region Number</th>
                                    <th>Region Name</th>
                                    <th>Assigned User</th>
                                    
                                 <?php
                                    $selectregion="SELECT * FROM region where 1";
                                    $result=mysqli_query($con,$selectregion);
                                    $region=mysqli_fetch_array($result);
                                    $num=$region['num'];
                                    $name=$region['name'];
                                    
                                    $selectuser="SELECT * FROM memberuser WHERE rcode='$num' AND role='Rver'";
                                    $ruserresult=mysqli_query($con,$selectuser);
                                    $userlist=mysqli_fetch_array($ruserresult);
                                    $username=$userlist['name'];
                                 ?>
                                <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    
                                </tr>
                            </table>
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
