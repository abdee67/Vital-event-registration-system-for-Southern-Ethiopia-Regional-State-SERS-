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
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b> GENERATE REPORT FOR ADOPTION</b>";?> </h2></span>
                    </div>
                </div>
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                  <div class="report" style="border:thick solid black;" >
                                    <?php
                                        $today=date("M d,Y");
                                      ?>
                                      <h5 class="w3-text-black" style="float: right;font:sans-serif;margin-right: 5px;"><u>Date:-<?php echo $today;?></u></h5>
                                      <br><br>
                                      <div style="border-bottom: 3px solid gray;">
                                          <h3 class="w3-text-black w3-center" style="font:sans-serif;font-weight: bolder;margin-top: 20px;">SNNPR<br> <br> Vital Events Registraion Agency</h3>
                                      </div>
                                      <br>
                                      <h4 class="w3-center w3-text-black" style="font-weight: bold;font:serif;">Adoption Report</h4>
                                      <br>
                                    <form action="" method="POST"> 

                                      <label style="color: black; font-weight: black; margin-left: 100px;">
                                         For:&nbsp;&nbsp;</label>
                                         <input type="text" name="forwhom" style="border-top:none;border-bottom: 1px solid black;border-left: none; color: black;width: 600px;">
                                         <br> <br> <br>
                                         <?php
                                             $LoggedInName=$_SESSION['LoginUsername'];
                                             $selectUser="SELECT * FROM memberuser  WHERE name='$LoggedInName'";
                                             $userResult=mysqli_query($con,$selectUser);
                                             if ($userResult) {
                                               $UserList=mysqli_fetch_assoc($userResult);
                                               $role=$UserList['role'];
                                             }
                                         ?>
                                      <label style="color: black; font-weight: black; margin-left: 100px;">Title:</label>

                                       <input type="text" name="reportTitle" style="border-top:none;border-bottom: 1px solid black;border-left: none; color: black;width: 600px;">
                                         <br><br>
                                         <label style="color: black; font-weight: black; margin-left: 100px;">Report Description:</label>
                                         <br>
                                         <div class="row" style="margin-left: 70px;" style="border: solid 2px; height: 100px;">
                                           <div class="col-md-11" style="border: solid 2px;height: 555px; color: black">
                                             
                                              <?php

                                                if(isset($_GET['AdoptID'])){

                                                   $adoptId=$_GET['AdoptID'];
                                                   $selectadoption="SELECT * FROM adoptevent WHERE adoptnum='$adoptId'";
                                                   $adoptionResult=mysqli_query($con,$selectadoption);
                                                   
                                                   $adoptList=mysqli_fetch_assoc($adoptionResult);

                                                   #FETCH CHILD INFORMATION
                                                   $adoptionnum=$adoptList['adoptnum'];
                                                   $chbirthnum=$adoptList['childbirthnum'];
                                                   $fnameadopt=$adoptList['fnameadopt'];
                                                   $mnameadopt=$adoptList['mnameadopt'];
                                                   $lnameadopt=$adoptList['lnameadopt'];
                                                   $dobadopt=$adoptList['dobadopt'];
                                                   $nationalityadopt=$adoptList['nationlityadopt'];
                                                   $sexadopt=$adoptList['sexadopt'];
                                                   $motherfname=$adoptList['motherfname'];

                                                     #RETRIEVE NEW INFORMATION FOR ADOPTED CHILD
                                                   $newfname=$adoptList['newfname'];
                                                   $newmname=$adoptList['newmname'];
                                                   $newlname=$adoptList['newlname'];

                                                    #RETRIEVE CURRENT PERSON WHO ADOPT THE CHILD
                                                   $currparentfname=$adoptList['currparentfname'];
                                                   $currparentplace=$adoptList['currparentplace'];

                                                   #
                                                   $courtname=$adoptList['courtname'];
                                                   $attorneyfname=$adoptList['attorneyfname'];

                                                    $zone=$adoptList['zcode'];
                                                    $woreda=$adoptList['wcode'];
                                                    $kebele=$adoptList['kcode'];
                                                    #RETRIVE ZONE NAME
                                                    $selectZ="SELECT * FROM zone WHERE num='$zone'";
                                                    $zResult=mysqli_query($con,$selectZ);
                                                    if ($zResult) {
                                                      $zlist=mysqli_fetch_assoc($zResult);
                                                      $zName=$zlist['name'];
                                                    }
                                                    $selectW="SELECT * FROM woreda WHERE num='$woreda'";
                                                    $wResult=mysqli_query($con,$selectW);
                                                    if ($wResult) {
                                                      $wlist=mysqli_fetch_assoc($wResult);
                                                      $wName=$wlist['name'];
                                                    }

                                                     $selectK="SELECT * from kebele WHERE num='$kebele' AND woreda='$woreda' AND zone='$zone'";
                                                    $result=mysqli_query($con,$selectK);
                                                    if ($result) {
                                                      
                                                      $klist=mysqli_fetch_assoc($result);
                                                      $kname=$klist['name'];
                                                    }
                                                    ?>
                                                    <!--======table begin for displaying adoption information=============================-->
                                                    <div class="col-md-12">
                                                      <table style="color: black;">
                                                        <tr><br><br><td width="100"></td><td style="font-weight: bold;"><u>Child Information</u></td><td width="250"></td><td style="font-weight: bold;"><u>Adoption Information</u></td></tr>
                                                      </table>
                                                      <table style="color: black;">
                                                        <tr>
                                                          <br>
                                                          <td width="10"></td><td><b>Full Name:&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><?php echo $fnameadopt." ".$mnameadopt." ".$lnameadopt;?></td><td width="100"></td><td><b>New Name:&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><?php echo $newfname." ".$newmname." ".$newlname;?></td>
                                                        </tr>
                                                        <tr><td><br></td></tr>
                                                        <tr>
                                                          <td width="10"></td><td><b>Sex:&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><?php echo $sexadopt; ?></td><td width="100"></td><td><b>Adopt person Full Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $currparentfname; ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td><br></td>
                                                        </tr>
                                                        <tr>
                                                          <td width="10"></td><td><b>Nationality:&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><?php echo $nationalityadopt; ?></td><td width="100"></td><td><b>Adopt person place:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $currparentplace; ?></td>
                                                        </tr>
                                                        <tr><td><br></td></tr>
                                                        <tr>
                                                          <td width="10"></td><td><b>DoB:&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><?php echo $dobadopt; ?></td><td width="100"></td><td><b>Court Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $courtname; ?></td>
                                                        </tr>
                                                        <tr><td><br></td></tr>
                                                        <tr>
                                                          <td width="10"></td><td><b>Mother Name:&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><?php echo $motherfname; ?></td><td width="100"></td><td><b>Attorney Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $attorneyfname; ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td><br><br></td>
                                                        </tr>
                                                        <tr>
                                                          <td width="10"></td><td><b>Adoption Place</b></td>
                                                        </tr>
                                                        <tr><td><br></td></tr>
                                                        <tr>
                                                          <td width="10"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Region:</b></td><td><?php echo "SNNPR";?></td></tr>
                                                        <tr><td><br></td></tr>
                                                        <tr>
                                                          <td width="10"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Zone:</b></td><td><?php echo $zone;?></td></tr>
                                                          <tr><td><br></td></tr>
                                                        <tr>
                                                          <td width="10"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Woreda:</b></td><td><?php echo $woreda;?></td></tr>
                                                        <tr><td><br></td></tr>
                                                        <tr>
                                                          <td width="10"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Kebele:</b></td><td><?php echo $kebele;?></td></tr>
                                                      </table>

                                                    </div>
                                               <?php }
                                              ?>

                                           </div>
                                           <div class="col-md-11" style="border: solid 2px;height: 500px;border-color: black;">
                                              <!--============================-->
                                              <div class="" style="">
                                                 <div>
                                                   <script type="text/javascript" src="ckeditor/ckeditor.js">
                                                     
                                                   </script>
                                                  
                                                     <label style="color: black;">Additional Information</label>
                                                <?php
                                                  if(isset($_POST['savereport'])) {
                                                  
                                                    $for=$_POST['forwhom'];
                                                    $title=$_POST['reportTitle'];
                                                    $reportdet=$_POST['birthreport'];
                                                    if (!empty($for) && !empty($title) && !empty($reportdet)) {
                                                       $insertRe="INSERT INTO report(eventnumber,forwhom,title,detail,zone,woreda,kebele,role,reportby,type) VALUES ('$adoptionnum','$for','$title','$reportdet','$zone','$woreda','$kebele','$role','$LoggedInName','Adoption')";
                                                       $InsertResult=mysqli_query($con,$insertRe);
                                                       if ($InsertResult) {
                                                         echo "<script>alert('Report is saved successfully');</script>";
                                                         echo "<p style='color:blue;'>Well Done !!!</p>";
                                                       }

                                                    }
                                                    elseif (empty($for)) {
                                                      echo "<p style='color:red;'>Please fill field for whom you want to send<p>";
                                                    }
                                                    elseif (empty($title)) {
                                                      echo "<p style='color:red;'>Please fill title of the report</p>";
                                                    }
                                                    elseif (empty($reportdet)) {
                                                      echo "<p style='color:red;'>Please file repot detail</p>";
                                                    }
                                                    else {
                                                      echo "<p style='color:red;'>Some error happended</p>";
                                                    }

                                             }

                                           ?>
                                              <textarea class="ckeditor  w3-input w3-hover-opacity" name="birthreport" style="height: 450px;color: black;">
                                                     </textarea>
                                                   
                                                 </div>
                                              </div>
                                           </div>

                                         </div>
                                         <br>
                                         <input type="submit" name="savereport" value="Save" style="margin-left: 100px;width: 100px;background-color: blue; color: white;">
                                         <a href="print-adoption-report.php?AdoptID=<?php echo $adoptionnum;?>" style="margin-left: 30px; color: blue;font-weight: bold;">Open</a>
                                    </form>
                                 
                                  </div>
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
