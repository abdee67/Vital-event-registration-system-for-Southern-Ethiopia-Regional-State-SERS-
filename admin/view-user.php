
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
    <?Php include("inc/navigation.php"); ?>

    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>ALL SYSTEM USERS</b></i>
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
                                    <!--===================SEARCH FROM ALL SYSTEM USER=======================-->
                                  <div style="float: right;">
                                    <form action="" method="POST">
                                      <input type="text" name="username" placeholder="User Name.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                      <input type="submit" name="searchuser" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">
                                    </form>
                                  </div>
                                  <!--===============SEARCH FORM=============-->
                                  <?php
                                      if (isset($_POST['searchuser'])) {
                                          $userName=$_POST['username'];
                                        //echo "Begin Search";
                                        ?>
                                          <!--==================Searched======================-->
                                      <?php  
                                          if (empty($userName)) {
                                                echo "<p style='color:red;text-align:center;'> Empty UserName</p>";
                                              }    
                                         $resultPerPage=10;
                                         $query="SELECT *FROM memberuser where name='$userName'";
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
                                        $sql="SELECT * FROM memberuser WHERE name='$userName'  ORDER BY role,FullName LIMIT $thisPageResult,$resultPerPage";
                                        if($run=mysqli_query($con,$sql)){
                                              $check=mysqli_num_rows($run);
                                              if (!empty($userName) && $check==0) {
                                                echo "<p style='color:red;text-align:center;'> No User with Provided username</p>";
                                              }
                                          ?>
                                       <table class="w3-table-all">
                                             <style type="text/css">
                                                th {
                                                   background-color:blue;
                                                  color: white;
                                               } 
                                              </style>
                                           <th>Full Name</th> 
                                           <th>Email</th>
                                           <th>Role</th>
                                          <th colspan="3" style="text-align: center;">Action</th>
                                <?php
                                while($row=mysqli_fetch_array($run)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['FullName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td><a href="edit-user.php?UId=<?php echo $row['name']; ?>"><i class="fa fa-edit"></i></a></td>
                    
                                            <td><a href="delete-user.php?UIddelete=<?php echo $row['name'];?>"><i class="fa fa-remove"></i></a></td>
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
                                   <h3 class="w3-center w3-text-blue" ><?php     
                                    for($page=1;$page<$numberOfPages;$page++){
                                          
                                        echo " <a href=\"view-user.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                        }

                                 ?></h3> 


                                     <?php }
                                  ?>
                                  <!--=================================Normal Display Here================-->
                                  <?php
                                      if (!isset($_POST['searchuser'])) {
                                       
                                        ?>
                                        <!--===========<h1>Normal</h1>=================-->
                                      <?php      
                                         $resultPerPage=10;
                                         $query="SELECT *FROM memberuser";
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
                                        $sql="SELECT * FROM memberuser WHERE role!='admin'  ORDER BY role,FullName";
                                        if($run=mysqli_query($con,$sql)){
                                          ?>
                                       <table class="w3-table-all">
                                             <style type="text/css">
                                                th {
                                                   background-color:blue;
                                                  color: white;
                                               } 
                                              </style>
                                           <th>Full Name</th> 
                                           <th>Email</th>
                                           <th>Role</th>
                                          <th colspan="3" style="text-align: center;">Action</th>
                                <?php
                                while($row=mysqli_fetch_array($run)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['FullName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td><a href="edit-user.php?UId=<?php echo $row['name']; ?>"><i class="fa fa-edit"></i></a></td>
                    
                                            <td><a href="delete-user.php?UIddelete=<?php echo $row['name'];?>"><i class="fa fa-remove"></i></a></td>
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
                                   <h3 class="w3-center w3-text-blue" ><?php     
                                    for($page=1;$page<$numberOfPages;$page++){
                                          
                                        echo " <a href=\"view-user.php?page=".$page." \" class=\"w3-button btn btn-link\">".$page."</a> ";
                                        }

                                 ?></h3> 



                                     <?php }
                                  ?>
                                    <!--====================VIEW ALL USERS OF THE SYSTEM========================-->      
                                    <!--=====================VIEW USER======================-->
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
</html>
