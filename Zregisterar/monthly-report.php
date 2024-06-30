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
       <!--==============================ANNUAL REPORT BEGIS HERE==========================-->
        <div class="right_col" role="main">
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 10px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>MONTHLY EVENT REPORT</b></i>
                            </h6>
                        </span>                     
                     </div>
                </div>
                <div class="main-content table-responsive" id="content-wrapper">
                    <div class="container-fluid " >
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                    <!--============ANNUAL REPORT BEGINS HERE==============-->
                                    <div class="report">
                                        <form action="" method="POST" >
                                            <label class="w3-text-black">Choose Type</label>
                                                <select name="type" class="w3-input w3-text-black" >
                                                    <option class="w3-text-black">Choose Event Type here</option>
                                                    <option class="w3-text-black">Birth Event</option>
                                                    <option class="w3-text-black">Death Event</option>
                                                    <option class="w3-text-black">Marriage Event</option>
                                                    <option class="w3-text-black">Divorce Event</option>
                                                    <option class="w3-text-black">Adoption Event</option>
                                                </select>
                                            <br>
                                            <label class="w3-text-black">Choose Year</label>
                                            
                                                <select name="year" class="w3-input w3-text-black">
                                                    <option class="w3-text-black">Choose Year here</option>
                                                     <option class="w3-text-black">2019</option>
                                                     <option class="w3-text-black">2020</option>
                                                     <option class="w3-text-black">2021</option>
                                                     <option class="w3-text-black">2022</option>
                                                     <option class="w3-text-black">2023</option>
                                                     <option class="w3-text-black">2024</option>
                                                     <option class="w3-text-black">2025</option>
                                                     <option class="w3-text-black">2026</option>
                                                     <option class="w3-text-black">2027</option>
                                                     <option class="w3-text-black">2028</option>
                                                     <option class="w3-text-black">2029</option>
                                                     <option class="w3-text-black">2030</option>
                                                     <option class="w3-text-black">2031</option>
                                                     <option class="w3-text-black">2032</option>
                                                     <option class="w3-text-black">2033</option>
                                                     <option class="w3-text-black">2034</option>
                                                     <option class="w3-text-black">2035</option>
                                                     <option class="w3-text-black">2036</option>
                                                     <option class="w3-text-black">2037</option>
                                                     <option class="w3-text-black">2038</option>
                                                     <option class="w3-text-black">2039</option>
                                                     <option class="w3-text-black">2040</option>
                                                </select>
                                            <label class="w3-text-black">Choose Month</label>
                                                <select name="Month" class="w3-input w3-text-black">
                                                    <option class="w3-text-black">Choose Month here</option>
                                                    <option class="w3-text-black">January</option>
                                                    <option class="w3-text-black">February</option>
                                                    <option class="w3-text-black">March</option>
                                                    <option class="w3-text-black">April</option>
                                                    <option class="w3-text-black">May</option>
                                                    <option class="w3-text-black">June</option>
                                                    <option class="w3-text-black">July</option>
                                                    <option class="w3-text-black">August</option>
                                                    <option class="w3-text-black">September</option>
                                                    <option class="w3-text-black">October</option>
                                                    <option class="w3-text-black">November</option>
                                                    <option class="w3-text-black">December</option>
                                                </select>

                                                <input type="submit" class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="find" value="Continue">
                                        </form>
                                        <?php
                                            if (isset($_POST['find'])) {
                                                $_SESSION['type']=$_POST['type'];
                                                $_SESSION['year']=$_POST['year'];
                                                $_SESSION['month']=$_POST['Month'];
                                                $type= $_SESSION['type'];
                                                $month= $_SESSION['month'];
                                                echo "<br>";
                                                $year= $_SESSION['year'];
                                                if (($type=='Birth Event') && ($type!='Choose Event Type here') && ($year!='Choose Year here') && ($month!='Choose Month here')){
                                                   // echo "Birth Event";
                                                    echo "<script> window.location.replace('birth-monthly-report.php');</script>";


                                                }
                                                else if (($type=='Death Event') && ($type!='Choose Event Type here') && ($year!='Choose Year here') && ($month!='Choose Month here')){
                                                    //echo "Death Event";
                                                     echo "<script> window.location.replace('death-monthly-report.php');</script>";
                                                }
                                                elseif (($type=='Marriage Event') && ($type!='Choose Event Type here') && ($year!='Choose Year here') && ($month!='Choose Month here')){
                                                   // echo "Marriage Event";
                                                    echo "<script> window.location.replace('marriage-monthly-report.php');</script>";
                                                }
                                                elseif (($type=='Divorce Event') && ($type!='Choose Event Type here') && ($year!='Choose Year here') && ($month!='Choose Month here')){
                                                    //echo "Divorce Event";
                                                     echo "<script> window.location.replace('divoce-monthly-report.php');</script>";
                                                }
                                                elseif (($type=='Adoption Event') && ($type!='Choose Event Type here') && ($year!='Choose Year here') && ($month!='Choose Month here')){
                                                    //echo "Adoption Event";
                                                     echo "<script> window.location.replace('adoption-monthly-report.php');</script>";
                                                }
                                                elseif (($type=='Choose Event Type here') && ($year!='Choose Year here') ) {
                                                    echo "<script>alert('please choose valid event');</script>";
                                                    echo "<p class='w3-text-red w3-center'>please choose valid event</p>";
                                                }
                                                elseif (($year=='Choose Year here') && ($type!='Choose Event Type here') ) {
                                                   echo "<script>alert('please choose valid year');</script>";
                                                   echo "<p class='w3-text-red w3-center'>please choose valid year</p>";
                                                }
                                                elseif (($type=='Choose Event Type here') && ($year=='Choose Year here') ) {
                                                   echo "<script>alert('please choose valid event and year');</script>";
                                                   echo "<p class='w3-text-red w3-center'>please choose valid event and  year</p>";
                                                }
                                                elseif (($type=='Choose Event Type here') && ($year=='Choose Year here') &&($month=='Choose Month here') ) {
                                                    echo "<script>alert('please choose valid event,month  and year');</script>";
                                                   echo "<p class='w3-text-red w3-center'>please choose valid event, month  and  year</p>";
                                                }
                                                elseif ($month=='Choose Month here') {
                                                    echo "<script>alert('Please Choose Valid Month ');</script>";
                                                    echo "<p class='w3-text-red w3-center'> Please Choose Valid Month</p>";
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                    <!--============ANNUAL REPORT ENDS HERE===============-->
                                </div>
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
