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
.profilpic{
    width: 180px;
    height: 200px;
    margin-left: 60px;
    margin-top: 20px;
    margin-bottom: 20px;

    border:5px solid;
    border-color: blue;
    border-radius: 25px;
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

    <!--==============================USER DETAIL BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue; ">
                    <div style="margin-top: 5px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>BIRTH MONTHLY REPORT</b>";?> </h2></span>
                    </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper">
                	                          <!--==================Report print here=================-->
			              <script type="text/javascript">
			                  function printDiv(divname){
			                    var printcontents=document.getElementById(divname).innerHTML;
			                    w=window.open();
			                    w.document.write(printcontents);
			                    w.print();
			                    w.close();
			                    }

			                </script>
			                <form style="margin-top: -30px;">
			                   <input type="button" name="" onclick="printDiv('print-content')" value="Print Report" style="float: right; margin-bottom: -10px; margin-right: 5px;" class="w3-button w3-blue w3-btn-block w3-section w3-padding">
			                </form>
                <!--=====================Print Ends Here==============================-->
                    <div class="container-fluid" id="print-content">
                       <div class="row">
                           
                       </div>
                        <!--second row-->
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item" style="margin-top: -20px;">
                                	<?php
                                	   
                                	   $year=$_SESSION['year'];
                                	  // echo $year;
                                	?>
                                	<!--====================================Annual Report Begins Here===============-->
                                	<br>

                               <div class="report" style="border:thick solid black;">                                  
                                    <?php
                                        $today=date("M d,Y");
                                      ?>
                                      <h5 class="w3-text-black" style="float: right;font:sans-serif;margin-right: 5px;"><u>Date:-<?php echo $today;?></u></h5>
                                      <br><br>
                                      <div style="border-bottom: 3px solid gray;">
                                          <h3 class="w3-text-black " style="font:sans-serif;font-weight: bolder;margin-top: 20px;text-align: center;">SERS<br> <br> Vital Events Registraion and Reporting System</h3>
                                      </div>
                                      <br>
                                     
                                      <h4 class="w3-text-black" style="font-weight: bold;font:serif; text-align: center;">List Of Registered Birth Event In <?php echo "$year"; ?></h4>
                                      <br>
                                      <div class="birhteport" style="margin-left: 10px; align-items: center;">
                                      	      <style type="text/css">
                                                th {
                                                    background-color:blue;
                                                    color: white;
                                                   }  
                                               </style>                                    			   
                                        	<table border="1" class="w3-table-all">

                                      			   	<tr>
                                      			   		<thead>
	                                                      	<th class="small">Full Name</th>
	                                      			   		<th class="small">Sex</th>
	                                      			   		<th class="small">DoB</th>
	                                      			   		<th class="small">Nationality</th>
	                                      			   		<th class="small">Weight</th>
	                                      			   		<th class="small">Reg Type</th>
	                                      			   		<th class="small">Reg Date</th>                      			   				
                                      			   			</thead>

                                      			   		</tr>
                                      	<?php
                                      		$selectBirth="SELECT * FROM birthevent WHERE kebele='$KCode' AND woreda='$WCode' AND zone='$ZCode' AND regyear='$year'";
                                      		$birthResult=mysqli_query($con,$selectBirth);

                                      		$check=mysqli_num_rows($birthResult);
                                      				if ($check==0) {
                                      					echo "<script>alert('No Event In this year');</script>";
                                      					 echo "<script> window.location.replace('anual-report.php');</script>";
                                      				}

                                      		while ($birthlist=mysqli_fetch_array($birthResult)) {
                                      				
                                      			?>
                                      			   <tr>
                                      			   	<td><?php echo $birthlist['fname']." ".$birthlist['mname']." ".$birthlist['lname']; ?></td>	
                                      			   	<td><?php echo $birthlist['sex']; ?></td>
                                      			   	<td><?php echo $birthlist['day'] ; ?></td>
                                      			   	<td><?php echo $birthlist['nationality'];?></td>
                                      			   	<td><?php echo $birthlist['weight']; ?></td>
                                      			   	<td><?php echo $birthlist['regtype'] ; ?></td>
                                      			   	<td><?php echo $birthlist['regdate']; ?></td>

                                      			   </tr> 	
                                      	<?php	}

                                      	echo "</table>";

                                      	?>
                                      	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                      	<?php
                                      		#Get Kebele name
                                      		$selectKe="SELECT * FROM kebele WHERE num='$KCode' AND woreda='$WCode' AND zone='$ZCode'";
                                      		$KebeleR=mysqli_query($con,$selectKe);
                                      		$kebel=mysqli_fetch_array($KebeleR);
                                      		$name=strtoupper($kebel['name']);

                                      	   #Get the name of the user
                                      		 $LoggedInName=$_SESSION['LoginUsername'];
                                      		 $selectUser="SELECT * FROM memberuser where name='$LoggedInName'";
                                      		 $useResult=mysqli_query($con,$selectUser);
                                      		 $user=mysqli_fetch_array($useResult);
                                      		 $fullname=$user['FullName'];
                                           echo "<p style='color:black;font-weight:bold; margin-left:350px;'>$fullname</p>"; 
                                           //echo "<br>";
                                           echo "<p style='color:black;font-weight:bold; margin-left:350px;'> Vital Event Registrar of $name Kebele</p>"; 
                                      	?><br><br><br>
                                      </div>
                                  </div>
                                	<!--===================================Annual Report Ends Here==================-->
                                </div>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div> 
    <!--============================= BIRTH ANNUAL REPORT  ENDS HERE===========================-->
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
