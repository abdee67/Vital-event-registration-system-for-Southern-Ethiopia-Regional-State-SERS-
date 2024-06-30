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
  table th{
  	background-color:rgba(255, 99, 71, 0.2);
    color: black;
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

    <!--==============================USER DETAIL BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue; ">
                    <div style="margin-top: 3px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo " "." ".'<b>'."TOTAL VITAL EVENTS REPORTS".'</b>';?> </h2></span>
                    </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                       <div class="row">
                           
                       </div>
                        <!--second row-->
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                            <!--=============Print Report Begins here=============-->
                             <script type="text/javascript">
                                function printDiv(divname){
                                  var printcontents=document.getElementById(divname).innerHTML;
                                  w=window.open();
                                  w.document.write(printcontents);
                                  w.print();
                                  w.close();
                                  }

                              </script>
                              <form style="margin-top: -10px; margin-bottom: -10px;">
                                 <input type="button" name="" onclick="printDiv('print-content')" value="Print Report" style="float: right; margin-bottom: -10px; margin-right: 5px;" class="w3-button w3-blue w3-btn-block w3-section w3-padding">
                              </form>
                            <!--=============Print Report Ends Here===============-->

                   					<!--birth event report start from here====================-->
                   					<!--=========Birth Event backend begins here============-->

                            <div style="border:thick solid black; padding: 15px;" id="print-content" >

                   					<?php
                   					   #Select all registered birth event 
                   						$selectBirth="SELECT * FROM birthevent WHERE 1 ";
                   						$birthResult=mysqli_query($con,$selectBirth);
										          $birthcountAll=mysqli_num_rows($birthResult);

                   						#Select birth event of registered female
                   						$selectbirthFemale="SELECT * FROM birthevent WHERE  sex='Female' ";
                   						$birthFemaleRes=mysqli_query($con,$selectbirthFemale);
                   						
                   					    $countFemaleBirth=mysqli_num_rows($birthFemaleRes);
                   						#Select birth event registered of male
                   						$selectbirthMale="SELECT * FROM birthevent WHERE  sex='Male' ";
                   						$birthMaleRes=mysqli_query($con,$selectbirthMale);
                   						
                   						$countMaleBirth=mysqli_num_rows($birthMaleRes);

                   						#Calculate the percent of female from birth event
                   						if ($birthcountAll != 0) {
											$femaleper = ($countFemaleBirth * 100) / $birthcountAll;
											$malePer = ($countMaleBirth * 100) / $birthcountAll;
										} else {
											// Handle the case where $birthcountAll is zero
											// For example, set $femaleper and $malePer to zero or another default value
											$femaleper = 0;
											$malePer = 0;
										}
										

                   						#Count normal child from registered event =============================-->
                   						$selectNormal="SELECT * FROM birthevent WHERE weight>=2.5";
                   						$normalRes=mysqli_query($con,$selectNormal);
                   						
                   						$countNormal=mysqli_num_rows($normalRes);
                   						#Count underweight child
                   						$selectUnder="SELECT * FROM birthevent WHERE  weight<2.5";
                   						$underRes=mysqli_query($con,$selectUnder);
                   					
                   						$countUnder=mysqli_num_rows($underRes);
                   						#=========Normal Weight Parcentage==================-->
										if ($birthcountAll !=0) {
											$normalPer=($countNormal * 100)/$birthcountAll;
										}
										else {
											$normalPer = 0;
										}
                   						
                   						#=========Underweight Parcentage==============
										if ($birthcountAll !=0){
											$underPer=($countUnder * 100)/$birthcountAll;
										}
                                        else{
											$underPer=0;
										}
                   						#================active Regstration=============
                   						$selectActiveBirth="SELECT * FROM birthevent WHERE regtype='Active'";
                   						$activeRes=mysqli_query($con,$selectActiveBirth);
                   						
                   						$countActive=mysqli_num_rows($activeRes);

                   						#===============passive registratioon==============
                   						$selectPassiveBirth="SELECT * FROM birthevent WHERE  regtype='Passive'";
                   						$passiveRes=mysqli_query($con,$selectPassiveBirth);
                   						
                   						$countPassive=mysqli_num_rows($passiveRes);

                   						#==================active and passive registration pecent
										if ($birthcountAll !=0){									
                   						$activePer=($countActive*100)/$birthcountAll;                  						                 					
                   						$passivePer=($countPassive*100)/$birthcountAll;
										}
                   						else{
											$activePer=0;
											$passivePer=0;
										}
                   					?>
                   					<!--=========Birth Event backend ends here==============-->
                                	<h3 style="color: black;font-family: Georgia, Serif;font-weight: bold;">1. Birth Vital Event </h3>

                                	<table border="" class="w3-table-all" style="color: black;font-family: Georgia, Serif;">
                                		<thead>
                                			<tr>
                                			  <th colspan="4" style="text-align: center;" class="small">Sex</th>
                                			  <th colspan="4" style="text-align: center;" class="small">Child Condition</th>
                                			  <th colspan="4" style="text-align: center;" class="small">Registration Type</th>
                                			  <th rowspan="3">Total</th>
                                			</tr>
                                			<tr> 
                                        <th colspan="2" style="text-align: center;" class="small">Female</th>
                                				<th colspan="2" style="text-align: center;" class="small">Male</th>
                                			
                                				<th colspan="2" style="text-align: center;" class="small">Normal</th>
                                				<th colspan="2" style="text-align: center;" class="small">Underweight</th>
                                				<th colspan="2" style="text-align: center;" class="small">Active</th>
                                				<th colspan="2" style="text-align: center;" class="small">Passive</th>
                                			</tr>
                                			<tr>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                			</tr>

                                		</thead>
                                		<tr>
                                			<td><?php echo $countFemaleBirth; ?></td> <td><?php echo round($femaleper,3) ; ?></td> <td><?php echo $countMaleBirth; ?></td><td><?php echo round($malePer,3); ?> </td> <td><?php echo $countNormal; ?></td> <td><?php echo round($normalPer,3); ?></td> <td><?php echo $countUnder; ?></td><td><?php echo round($underPer,3); ?></td><td><?php echo $countActive; ?></td><td><?php echo round($activePer,3); ?></td><td><?php echo  $countPassive; ?></td><td><?php echo round($passivePer,3); ?></td><td><?php echo $birthcountAll; ?></td>
                                		</tr>
                                			
                                		
                                	</table>
                                	<!--==========================Birth total ends here======================-->
                                	<?php
                                		#=====================death beckend begins here==============================
                                		$selectDeath="SELECT *FROM deathevent where   1";
                                		$alldeathRes=mysqli_query($con,$selectDeath);
	                                	$countalldeath=mysqli_num_rows($alldeathRes);
	                                	#===============================Count dead female
	                                	$selectFemaleDead="SELECT *FROM deathevent where   sex='Female'";
	                                	$deadFemaleRes=mysqli_query($con,$selectFemaleDead);
	                                	$countdeadFemale=mysqli_num_rows($deadFemaleRes);
	                                		#===============================Count dead male
	                                	$selectMaleDead="SELECT *FROM deathevent where   sex='Male'";
	                                	$deadMaleRes=mysqli_query($con,$selectMaleDead);
	                                	$countdeadMale=mysqli_num_rows($deadMaleRes);

	                                	#==========female and male dead parcent
										if ($countalldeath !=0) {
											$deadFemalePer=($countdeadFemale * 100)/$countalldeath;
											$deadMalePer=($countdeadMale * 100)/$countalldeath;

										}
										else{
											$deadFemalePer=0;
											$deadMalePer=0;
										}
	                                	
	                                	#============Cause 1 of death===================================
	                                	$selectCause1="SELECT *FROM deathevent where  cause='Cancer' ";
	                                	$causeRes1=mysqli_query($con,$selectCause1);
	                                	$causeCount1=mysqli_num_rows($causeRes1);
										if ($countalldeath != 0) {
											$parcent1 = ($causeCount1 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent1 = 0;
										}

	                                	#============Cause 2 of death===================================
	                                	$selectCause2="SELECT *FROM deathevent where   cause='HIV' ";
	                                	$causeRes2=mysqli_query($con,$selectCause2);
	                                	$causeCount2=mysqli_num_rows($causeRes2);
										if ($countalldeath != 0) {
											$parcent2 = ($causeCount2 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$percent2 = 0;
										}
	                                    #============Cause 3 of death===================================
	                                	$selectCause3="SELECT *FROM deathevent where  cause='Mental illnes' ";
	                                	$causeRes3=mysqli_query($con,$selectCause3);
	                                	$causeCount3=mysqli_num_rows($causeRes3);
										if ($countalldeath != 0) {
											$parcent3 = ($causeCount3 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent3 = 0;
										}
	                                    #============Cause 4 of death===================================
	                                	$selectCause4="SELECT *FROM deathevent where  cause='Malaria' ";
	                                	$causeRes4=mysqli_query($con,$selectCause4);
	                                	$causeCount4=mysqli_num_rows($causeRes4);
										if ($countalldeath != 0) {
											$parcent4 = ($causeCount4 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent4 = 0;
										}
	                                    #============Cause 5 of death===================================
	                                	$selectCause5="SELECT *FROM deathevent where  cause='Intestinal helminthiasis' ";
	                                	$causeRes5=mysqli_query($con,$selectCause5);
	                                	$causeCount5=mysqli_num_rows($causeRes5);
										if ($countalldeath != 0) {
											$parcent5 = ($causeCount5 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent5 = 0;
										}
	                                    #============Cause 6 of death===================================
	                                	$selectCause6="SELECT *FROM deathevent where  cause='Tuberculosis' ";
	                                	$causeRes6=mysqli_query($con,$selectCause6);
	                                	$causeCount6=mysqli_num_rows($causeRes6);
										if ($countalldeath != 0) {
											$parcent6 = ($causeCount6 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent6 = 0;
										}
	                                	#============Cause 7 of death===================================
	                                	$selectCause7="SELECT *FROM deathevent where   cause='Skin diseases' ";
	                                	$causeRes7=mysqli_query($con,$selectCause7);
	                                	$causeCount7=mysqli_num_rows($causeRes7);
										if ($countalldeath != 0) {
											$parcent7 = ($causeCount7 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent7 = 0;
										}										
										#============Cause 8 of death===================================
	                                	$selectCause8="SELECT *FROM deathevent where   cause='Meningitis' ";
	                                	$causeRes8=mysqli_query($con,$selectCause8);
	                                	$causeCount8=mysqli_num_rows($causeRes8);
										if ($countalldeath != 0) {
											$parcent8 = ($causeCount8 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent8 = 0;
										}
	                                	#============Cause 9 of death===================================
	                                	$selectCause9="SELECT *FROM deathevent where   cause='Measles' ";
	                                	$causeRes9=mysqli_query($con,$selectCause9);
	                                	$causeCount9=mysqli_num_rows($causeRes9);
										if ($countalldeath != 0) {
											$parcent9 = ($causeCount9 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent9 = 0;
										}
	                                	#============Cause 10 of death===================================
	                                	$selectCause10="SELECT *FROM deathevent where  cause='Pneumonia' ";
	                                	$causeRes10=mysqli_query($con,$selectCause10);
	                                	$causeCount10=mysqli_num_rows($causeRes10);
										if ($countalldeath != 0) {
											$parcent10 = ($causeCount10 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent10 = 0;
										}
	                                	#============Cause 11 of death===================================
	                                	$selectCause11="SELECT *FROM deathevent where  cause='Bronchitis' ";
	                                	$causeRes11=mysqli_query($con,$selectCause11);
	                                	$causeCount11=mysqli_num_rows($causeRes11);
										if ($countalldeath != 0) {
											$parcent11 = ($causeCount11 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent11 = 0;
										}
	                                	#============Cause 12 of death===================================
	                                	$selectCause12="SELECT *FROM deathevent where    cause='Diarrhea' ";
	                                	$causeRes12=mysqli_query($con,$selectCause12);
	                                	$causeCount12=mysqli_num_rows($causeRes12);
										if ($countalldeath != 0) {
											$parcent12 = ($causeCount12 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent12 = 0;
										}
	                                	#============Cause 13 of death===================================
	                                	$selectCause13="SELECT *FROM deathevent where   cause='Car Accident' ";
	                                	$causeRes13=mysqli_query($con,$selectCause13);
	                                	$causeCount13=mysqli_num_rows($causeRes13);
										if ($countalldeath != 0) {
											$parcent13 = ($causeCount13 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent13 = 0;
										}
	                                	#============Cause 14 of death===================================
	                                	$selectCause14="SELECT *FROM deathevent where   cause='Fire' ";
	                                	$causeRes14=mysqli_query($con,$selectCause14);
	                                	$causeCount14=mysqli_num_rows($causeRes14);
										if ($countalldeath != 0) {
											$parcent14 = ($causeCount14 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent14 = 0;
										}
	                                	#============Cause 15 of death===================================
	                                	$selectCause15="SELECT *FROM deathevent where  cause='Earthquek' ";
	                                	$causeRes15=mysqli_query($con,$selectCause15);
	                                	$causeCount15=mysqli_num_rows($causeRes15);
										if ($countalldeath != 0) {
											$parcent15 = ($causeCount15 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent15 = 0;
										}
	                                	#============Cause 16 of death===================================
	                                	$selectCause16="SELECT *FROM deathevent where  cause='Drought' ";
	                                	$causeRes16=mysqli_query($con,$selectCause16);
	                                	$causeCount16=mysqli_num_rows($causeRes16);
										if ($countalldeath != 0) {
											$parcent16 = ($causeCount16 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent16 = 0;
										}
	                                	#============Cause 17 of death===================================
	                                	$selectCause17="SELECT *FROM deathevent where  cause='Flooding' ";
	                                	$causeRes17=mysqli_query($con,$selectCause17);
	                                	$causeCount17=mysqli_num_rows($causeRes17);
	                                	if ($countalldeath != 0) {
											$parcent17 = ($causeCount17 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent17 = 0;
										}

	                                    #============Cause 18 of death===================================
										$selectCause18 = "SELECT * FROM deathevent WHERE cause = 'Other'";
										$causeRes18 = mysqli_query($con, $selectCause18);
										$causeCount18 = mysqli_num_rows($causeRes18);
										
										// Check if $countalldeath is not zero before performing division
										if ($countalldeath != 0) {
											$parcent18 = ($causeCount18 * 100) / $countalldeath;
										} else {
											// Handle the case where $countalldeath is zero
											// For example, set $percent18 to zero or another default value
											$parcent18 = 0;
										}
										

                                	?>

                                	<!--=========================Death total event begins here===============-->
                                	<br>
                                	<h3 style="color: black;font-family: Georgia, Serif;font-weight: bold;">2. Death Vital Event </h3>
                                	<table border="1" class="w3-table-all" style="color: black;font-family: Georgia, Serif;">
                                		<thead>
                                			
                                			<tr>
                                				<th colspan="4" style="text-align: center;" class="small">Sex</th>
                                				<th rowspan="3" class="small">Total</th>
                                			</tr>
                                			<tr>
                                				<th colspan="2" style="text-align: center;" class="small">Male</th>
                                				<th colspan="2" style="text-align: center;">Female</th>
                                			</tr>
                                			<tr>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                				<th style="text-align: center;" class="small">Total</th>
                                				<th style="text-align: center;" class="small">Percent(%)</th>
                                			</tr>
                                		</thead>
                                		<tr>
                                			<td><?php echo $countdeadMale; ?></td><td><?php echo $deadMalePer ?></td>
                                			<td><?php echo $countdeadFemale; ?></td><td><?php echo $deadFemalePer; ?></td>
                                			<td><?php echo $countalldeath; ?></td>
                                		</tr>
                                		<tr>
                                			<th colspan="3" style="text-align: center;" class="small">Cause of Death in detail</th>

                                		</tr>
                                		<tr>
                                			<th style="text-align: center;" class="small">Cause</th>
                                			<th style="text-align: center;" class="small">Total</th>
                                			<th style="text-align: center;" class="small">Parcent(%)</th>
                                		</tr>
                                		<!--=================Car Accident===========-->
                                		<?php
                                			if ($causeCount13!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Car Accident</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount13;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent13;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!--======================Fire======================-->
                                		<?php
                                			if ($causeCount14!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Fire</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount14;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent14;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>

                                		<!--======== Earthquek======-->

                                		<?php
                                			if ($causeCount15!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Earthquek</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount15;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent15;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!--===============Drought====================-->

                                		<?php
                                			if ($causeCount16!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Drought</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount16;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent16;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!--================Flooding==============-->

                                		<?php
                                			if ($causeCount17!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Flooding</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount17;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent17;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!--=========================cancer==============-->

                                		<?php
                                			if ($causeCount1!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Cancer</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount1;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent1;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!--=======HIV===================-->

                                		<?php
                                			if ($causeCount2!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>HIV</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount2;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent2;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!-------=================Mental Illness===========-->

                                		<?php
                                			if ($causeCount3!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Mental Illness</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount3;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent3;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!-------=================Malaria===========-->
                                		<?php
                                			if ($causeCount4!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Malaria</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount4;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent4;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!-------================= Intestinal helminthiasis ===========-->

                                		<?php
                                			if ($causeCount5!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Intestinal helminthiasis</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount5;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent5;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!-------=================Tuberchlosis===========-->
                                		 <?php
                                			if ($causeCount6!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Tuberchlosis</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount6;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent6;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		 <!-------=================Skin Disease===========-->
                                		<?php
                                			if ($causeCount7!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Skin Disease </p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount7;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent7;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>

                                		<!-------=================Meningitis===========-->
                                		<?php
                                			if ($causeCount8!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Meningitis</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount8;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent8;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!-------=================Measleas===========-->
                                		<?php
                                			if ($causeCount9!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Measleas</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount9;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent9;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!-------=================Phemonia===========-->
                                		 <?php
                                			if ($causeCount10!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Phemonia</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount10;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent10;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                          
                                		<!-------=================Bronchitis===========-->
                                		 <?php
                                			if ($causeCount11!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Bronchitis</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount11;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent11;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		 ?>
                                		<!-------=================Diarrhea===========-->
                                		<?php
                                			if ($causeCount12!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Diarrhea</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount12;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent12;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                		<!-------=================Other Diseases===========-->
                                		<?php
                                			if ($causeCount18!=0) {
                                				?>
                                				<tr>
                                					<td>
                                						<p style='font-weight:bold;'>Other Diseases</p>
                                					</td>
                                					<td>
                                						<?php echo $causeCount18;?>
                                					</td>
                                					<td>
                                						<?php echo $parcent18;?>
                                					</td>
                                				</tr>
                                			<?php }
                                		?>
                                	</table>
                                	<!--==============Death event report ends here============================-->
             
                                	<!--=============Marriage Event report here begins here=======-->
                                  <?php
                                    #============count married 
                                    $selectAllMarried="SELECT *FROM birthevent where  maritialStatus='Married' ";
                                    $allMarriedRes=mysqli_query($con,$selectAllMarried);
                                    $countAllMarrg=mysqli_num_rows($allMarriedRes);
									if ($birthcountAll !=0){
										$marriagePer=($countAllMarrg * 100)/$birthcountAll;
									}
									else{
										$marriagePer=0;
									}
                                      #============count married female
                                    $selectFeMarried="SELECT *FROM birthevent where    maritialStatus='Married' ";
                                    $FeMarriedRes=mysqli_query($con,$selectFeMarried);
                                    $countFeMarrg=mysqli_num_rows($FeMarriedRes);
                                     if ($birthcountAll !=0){
										$MarriedFemPer=($countFeMarrg * 100)/$birthcountAll;
									 }
									 else{
										$MarriedFemPer=0;
									 }
									#============count married male
                                    $selectMaMarried="SELECT *FROM birthevent where    maritialStatus='Married' AND sex='Male' ";
                                    $MaMarriedRes=mysqli_query($con,$selectMaMarried);
                                    $countMaMarrg=mysqli_num_rows($MaMarriedRes);
                                    if ($birthcountAll !=0){
										$MarriageMaPer=($countMaMarrg * 100)/$birthcountAll;
									}
									else{
										$MarriageMaPer=0;
									}                             
                                  ?>
								                 	<br>
                                	<h3 style="color: black;font-family: Georgia, Serif;font-weight: bold;">3. Marriage Vital Event </h3>
                                	<table border="1" class="w3-table-all" style="color: black;font-family: Georgia, Serif;">
                                		<thead>
                                			<tr>
                                				<th colspan="4" class="small" style="text-align: center;">Sex</th>
                                				<th rowspan="3">Total Married (%)</th>
                                			</tr>
                                			<tr>
                                				<th colspan="2" class="small" style="text-align: center;">Male</th>
                                				<th colspan="2" class="small" style="text-align: center;">Female</th>
                                			</tr>	
                                			<tr>
                                				<th class="small" style="text-align: center;">Total</th>
                                				<th class="small" style="text-align: center;">Percent(%)</th>
                                				<th class="small" style="text-align: center;">Total</th>
                                				<th class="small" style="text-align: center;">Percent(%)</th>
                                			</tr>
                                			
                                		</thead>
                                    <tr>
                                      <td>
                                        <?php echo $countMaMarrg;?>
                                      </td>
                                      <td>
                                        <?php echo round($MarriageMaPer,3);?>
                                      </td>
                                      <td>
                                        <?php echo $countFeMarrg;?>
                                      </td>
                                      <td>
                                        <?php echo round($MarriedFemPer,3); ?>
                                      </td>
                                      <td>
                                        <?php echo round($marriagePer,3); ?>
                                      </td>
                                    </tr>
                                		
                                	</table>
                                	<!--==================Marriage Report Ends here===============-->
                                	<!--=============Adoption Event report here begins here=======-->
							                 		<br>
                                  <!--===========================Divorce backend begins heere============-->
                                    <?php
                                    #============count married 
                                    $selectAllDivorced="SELECT *FROM birthevent where  maritialStatus='Divorced' ";
                                    $allDivorcedRes=mysqli_query($con,$selectAllDivorced);
                                        $countAllDivorced=mysqli_num_rows($allDivorcedRes); echo "<br>";
										if ($birthcountAll !=0){
											$divorcePer=( $countAllDivorced *100)/$birthcountAll;
										}
										else{
											$divorcePer=0;
										}                                      #============count married female
                                   
                                   $selectFeDivorced="SELECT *FROM divorceevent where  status='divorced'";
                                    $FeDivorcedRes=mysqli_query($con,$selectFeDivorced);
                                    $countFeDivorced=mysqli_num_rows($FeDivorcedRes);
                     
									if ($birthcountAll !=0){
										$DivorcedFemPer=( $countFeDivorced *100)/$birthcountAll;
									}
									else{
										$DivorcedFemPer=0;
									}                         
								 #============count divoced male
                                   $selectMaDivorced="SELECT *FROM divorceevent where  status='divorced'";
                                    $MaDivorcedRes=mysqli_query($con,$selectMaDivorced);
                                     $countMaDivorced=mysqli_num_rows($MaDivorcedRes);
                                    
									 if ($birthcountAll !=0){
										$DivorcedMaPer=( $countMaDivorced *100)/$birthcountAll;
									}
									else{
										$DivorcedMaPer=0;
									}
                                  ?>
                                  <!--===========================Divorce backend ends here===============-->

                                	<h3 style="color: black;font-family: Georgia, Serif;font-weight: bold;">4. Divorce Vital Event </h3>
                                	<table border="1" class="w3-table-all" style="color: black;font-family: Georgia, Serif;">
                                		<thead>
                                			<tr>
                                				<th colspan="4" class="small" style="text-align: center;">Sex</th>
                                				<th rowspan="3">Total Divorced(%)</th>
                                			</tr>
                                			<tr>
                                				<th colspan="2" class="small" style="text-align: center;">Male</th>
                                				<th colspan="2" class="small" style="text-align: center;">Female</th>
                                			</tr>	
                                			<tr>
                                				<th class="small" style="text-align: center;">Total</th>
                                				<th class="small" style="text-align: center;">Percent(%)</th>
                                				<th class="small" style="text-align: center;">Total</th>
                                				<th class="small" style="text-align: center;">Percent(%)</th>
                                			</tr>
                                			
                                		</thead>
                                    <tr>
                                      <td>
                                        <?php
                                          echo $countMaDivorced;
                                        ?>
                                      </td>
                                      <td>
                                        <?php
                                          echo round($DivorcedMaPer,3);
                                        ?>
                                      </td>
                                      <td>
                                        <?php
                                          echo $countFeDivorced;
                                        ?>
                                      </td>
                                      <td>
                                        <?php
                                        echo round($DivorcedFemPer,3);
                                        ?>
                                      </td>
                                      <td>
                                        <?php
                                          echo round($divorcePer,3);
                                        ?>
                                      </td>
                                    </tr>
                                		
                                	</table>
                                	<!--========================Divorce event report ends here=================-->
                                  <!--====================Adoption Backend begins here=======================-->
                                  <?php
                                    $selectAllAdotption="SELECT *FROM adoptevent where 1";
                                    $allAdoptRes=mysqli_query($con,$selectAllAdotption);
                                    $countAllAdopt=mysqli_num_rows($allAdoptRes);
                                    #=========male Adoted
                                    $selectFemaleAdotption="SELECT *FROM adoptevent where sexadopt='Female'";
                                    $femaleAdoptRes=mysqli_query($con,$selectFemaleAdotption);
                                    $countFemaleAdopt=mysqli_num_rows($femaleAdoptRes);
									if ($birthcountAll !=0){
										$femaleAdoptPer=( $countFemaleAdopt *100)/$birthcountAll;
									}
									else{
										$femaleAdoptPer=0;
									}                                    #=============Female Adopted

                                    $selectMaleAdotption="SELECT *FROM adoptevent where sexadopt='Male'";
                                    $maleAdoptRes=mysqli_query($con,$selectMaleAdotption);
                                    $countMaleAdopt=mysqli_num_rows($maleAdoptRes);
                                if ($birthcountAll !=0){
									$maleadoptPer=( $countMaleAdopt *100)/$birthcountAll;
								}
								else{
									$maleadoptPer=0;
								}

                                  ?>
                                  <!--====================Adoption Backend ends here==========================-->
                                	<!---======================Adoption event report begind here===============-->
                          
							                		<br>
                                	<h3 style="color: black;font-family: Georgia, Serif;font-weight: bold;">5. Adoption Vital Event </h3>
                                	<table border="1" class="w3-table-all" style="color: black;font-family: Georgia, Serif;">
                                		<thead>
                                			<tr>
                                				<th colspan="4" class="small" style="text-align: center;">Sex</th>
                                				<th rowspan="3">Total</th>
                                			</tr>
                                			<tr>
                                				<th colspan="2" class="small" style="text-align: center;">Male</th>
                                				<th colspan="2" class="small" style="text-align: center;">Female</th>
                                			</tr>	
                                			<tr>
                                				<th class="small" style="text-align: center;">Total</th>
                                				<th class="small" style="text-align: center;">Percent(%)</th>
                                				<th class="small" style="text-align: center;">Total</th>
                                				<th class="small" style="text-align: center;">Percent(%)</th>
                                			</tr>
                                		</thead>
                                      <tr>
                                        <td>
                                          <?php echo $countMaleAdopt; ?>
                                        </td>
                                        <td>
                                          <?php echo round($maleadoptPer,3); ?>
                                        </td>
                                        <td>
                                          <?php echo $countFemaleAdopt; ?>
                                        </td>
                                        <td>
                                          <?php echo round($femaleAdoptPer); ?>
                                        </td>
                                        <td>
                                          <?php echo $countAllAdopt; ?>
                                        </td>
                                      </tr>
                                	</table>

                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div> 
    <!--==============================USER DETAILS ENDS HERE===========================-->
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
