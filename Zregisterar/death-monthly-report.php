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
    border-color: green;
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

    <!--==============================Death Report BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue; ">
                    <div style="margin-top: 5px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo " "." ".'<b>'." DEATH MONTHLY REPORT".'</b>';?> </h2></span>
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
                                	   $month= $_SESSION['month'];
                                	  
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
                                          <h3 class="w3-text-black " style="font:sans-serif;font-weight: bolder;margin-top: 20px;text-align: center;">SNNPR<br> <br> Vital Events Registraion Agency</h3>
                                      </div>
                                      <br>
                                     
                                      <h4 class="w3-text-black" style="font-weight: bold;font:serif; text-align: center;">List Of Registered Death Event in <?php echo "$month".",". "$year"; ?></h4>
                                      <br>
                                      <div class="birhteport" style="margin-left: 10px; align-items: center;color: black;">
                                      	      <style type="text/css">
                                                th {
                                                    background-color:blue;
                                                    color: white;
                                                   }  
                                               </style>                                    			   
                                        	<table border="" class="w3-table-all" style="color: black;">

                                      			   	<tr>
                                      			   		<thead>
	                                                      	<th class="small">Full Name</th>
	                                      			   		<th class="small">Sex</th>
	                                      			   		<th class="small">DoB</th>
	                                      			   		<th class="small">Nationality</th>
	                                      			   		<th class="small">Religion</th>
	                                      			   		<th class="small">Job</th>
	                                      			   		<th class="small">Cause of Death</th>
	                                      			   		<th class="small">Reg Date</th>                      			   				
                                      			   			</thead>

                                      			   		</tr>
                                      	<?php
                                      		$selectDeath="SELECT * FROM deathevent WHERE zcode='$ZCode' AND regyear='$year' AND regmonth='$month'";
                                      		$deathResult=mysqli_query($con,$selectDeath);

                                      		$check=mysqli_num_rows($deathResult);
                                      				if ($check==0) {
                                      					echo "<script>alert('No Event Registered In Period You Provide Please Choose Valid Year or Month');</script>";
                                      					 echo "<script> window.location.replace('monthly-report.php');</script>";
                                      				}

                                      		while ($deathlist=mysqli_fetch_array($deathResult)) {
                                      				
                                      			?>
                                      			   <tr>
                                      			   	<td><?php echo $deathlist['title']." ".$deathlist['fname']." ".$deathlist['mname']." ".$deathlist['lname']; ?></td>	
                                      			   	<td><?php echo $deathlist['sex']; ?></td>
                                      			   	<td><?php echo $deathlist['dob'] ; ?></td>
                                      			   	<td><?php echo $deathlist['nationality'];?></td>
                                      			   	<td><?php echo $deathlist['religion']; ?></td>
                                      			   	<td><?php echo $deathlist['job'] ; ?></td>
                                      			   	<td><?php echo $deathlist['cause']; ?></td>
                                      			   	<td><?php echo $deathlist['dateofdeath']; ?></td>

                                      			   </tr> 	
                                      	<?php	}

                                      	echo "</table>";

                                      	?>
                                      	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                        <?php
                                          #Get Zone name
                                          $selectZo="SELECT * FROM zone WHERE num='$ZCode'";
                                          $zoneR=mysqli_query($con,$selectZo);
                                          $zone=mysqli_fetch_array($zoneR);
                                          $name=strtoupper($zone['name']);

                                           #Get the name of the user
                                           $LoggedInName=$_SESSION['LoginUsername'];
                                           $selectUser="SELECT * FROM memberuser where name='$LoggedInName'";
                                           $useResult=mysqli_query($con,$selectUser);
                                           $user=mysqli_fetch_array($useResult);
                                           $fullname=$user['FullName'];
                                           echo "<p style='color:black;font-weight:bold; margin-left:350px;'>$fullname</p>"; 
                                           //echo "<br>";
                                           echo "<p style='color:black;font-weight:bold; margin-left:350px;'> Vital Event Registrar of $name Zone</p>"; 
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
    <!--============================= DEATH ANNUAL REPORT  ENDS HERE===========================-->
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
