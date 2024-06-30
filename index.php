<?php 
	require 'connect.php';
	require 'try.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> WEB BASED SERS REGION VITAL EVENT REGISTRATION SYSTEM </title>

	 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
	 	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>

			<style>
		 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');

body{
	font-family: 'Playfair Display','Times New Roman';
}
		div.gallery {
			margin: 5px;
			border: 1px solid #ccc;
			float: left;
			width: 180px;
		}

		div.gallery:hover {
			border: 1px solid #777;
		}

		div.gallery img {
			width: 100%;
			height: auto;
		}

		div.desc {
			padding: 15px;
			text-align: center;
		}
		.container {
		  display: flex;
		  justify-content: space-between;
		}
		.carousel-inner {
height: 85vh;
}
.carousel-item img {
width: 100%;
height: 100%;
object-fit: cover;
}
.header-section {
height: 500px;
background-size: cover;
background-position: center;
display: flex;
align-items: center;
justify-content: center;
text-align: center;
color: white;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.header-title {
margin-top: 200px;
font-family: 'Poppins', sans-serif;
font-size: 50px;
font-weight: 700;
animation: fadeInDown 2s;
}

.header-subtitle {
font-size: 24px;
margin-top: 10px;
animation: fadeInUp 2s;
}

.header-btn {
margin-top: 20px;
animation: fadeInUp 2s;
}

@keyframes fadeInDown {
from {
	opacity: 0;
	transform: translateY(-50px);
}
to {
	opacity: 1;
	transform: translateY(0);
}
}

@keyframes fadeInUp {
from {
	opacity: 0;
	transform: translateY(50px);
}
to {
	opacity: 1;
	transform: translateY(0);
}
}
			
</style>
		
 </head>
<body>
	<!--NAVIGATION PART-->

	<div class="w3-top">
		<?php 	
		require 'navbar.php';
	 ?>
	</div>
<<div class="container-fluid" id="slider">
    <div class="row" style="height: 100%;">
        <div class="col-md-12" style="height: 100%;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="1000" style="height: 100%;">
                <ol class="carousel-indicators">
                    <?php
                    $get_slides = "SELECT * FROM slider";
                    $run_slides = mysqli_query($con, $get_slides);
                    $count = 0;
                    while ($row_slides = mysqli_fetch_array($run_slides)) {
                        if ($count == 0) {
                            echo "<li data-target='#myCarousel' data-slide-to='$count' class='active'></li>";
                        } else {
                            echo "<li data-target='#myCarousel' data-slide-to='$count'></li>";
                        }
                        $count++;
                    }
                    ?>
                </ol>
                <div class="carousel-inner" style="height: 100%;">
                    <?php
                    $run_slides = mysqli_query($con, $get_slides);
                    $count = 0;
                    while ($row_slides = mysqli_fetch_array($run_slides)) {
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                        $slide_url = $row_slides['slide_url'];
						$image_url = "http://localhost/Vital%20Event%20Registration%20System/admin/slides_images/$slide_image";
                        if ($count == 0) {
                            echo "<div class='carousel-item active' style='height: 100%; position: relative;'>";
                        } else {
                            echo "<div class='carousel-item' style='height: 100%; position: relative;'>";
                        }
                        echo "<a href='$image_url'>";
                        echo "<img src='admin/slides_images/$slide_image' class='img-responsive' style='width: 100%; height: 100%; object-fit: cover;' alt='$slide_name'>";
                        echo "<section class='header-section' style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;'>";
                        echo "<div>";
                        echo "<h1 class='header-title w3-hover-opacity w3-hide-small' style='color: #fff;'>WELCOME TO <br> WEB BASED VITAL EVENT REGISTRATION SYSTEM</h1>";
                        echo "<p class='header-subtitle w3-hide-small' style='color: #fff;'>Efficient. Secure. Reliable.</p>";
                        echo "</div>";
                        echo "</section>";
                        echo "</a>";
                        echo "</div>";
                        $count++;
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function mymod() {
        document.getElementById('start-modal').style.display = 'inline';
    }
</script>
	<section class="section w3-text-black col-md-6" style="border-spacing: 2px;height: 350px;background-image: url('img/image.jpg');background-repeat: repeat;">
		<div class="w3-container w3-center ">
			
			<h2 style="font-family: Elephant; font-size: 25px;white-space: 3px;color: white;font-weight: bolder">WEB BASED VITAL EVENT REGISTRATION SYSTEM<BR> FOR SERS</h2><br>
			<p style="text-align: left; font-family: Harlow Solid Italic;font-size: 20px;margin-left: 25px;color: white;" >
			Vital registration system is the continuous, permanent, compulsory and universal recording of the occurrence and characteristics of statics pertaining to the population as provided through decree or regulation in accordance with the legal requirements of a country. 
		    </p>
		</div>
		
	</section>
	<!--comtinue from section 1-->
	<section class="section w3-blue w3-text-black col-md-6" style="height: 350px;background-image: url('img/image.jpg');">
		<div class="w3-container w3-center ">
			<p style="text-align: left; font-family: Harlow Solid Italic;font-size: 20px;margin-left: 25px;color: white;">
			A well developed and functioning census  registration system ensures the collecting, counting demographic, socio-economic related data at a specific time of all people since a country or part of a country and of all events including births,mrigrtion,marriages,and deaths 
			and issues relevant certificates as proof of such registration.
		    </p>
		</div>
		
	</section>
	<!--=========================LOGIN BEGINS HERE==================-->
	<!-- ==========================LOGIN MODAL=================================-->
	<div style="text-align: center; width: 300px;">
		<div id="start-modal" class="w3-modal">
		<div class="w3-modal-content">
			<header class="w3-container w3-blue">
			<span onclick="getElementById('start-modal').style.display='none'" class="w3-button w3-blue w3-hover-red" style="float: right;">&times;</span>

			  <div style="text-align: center;">
			  	<img src="images/login.png" width="100" height="100" style="border-radius: 100%;">
			  </div>
				<h2 style="text-align: center; size: 30px;">LOGIN PAGE</h2>
			
			</header>

			<?php 
			
				if(isset($_POST['login']))
				{
					$name=$_POST['name'];//FOR SECURITY ISSUE
					$password=$_POST['password'];//FORE SECURITY ISSUE
					$_SESSION['uname']=$name;
					$password=md5($password);
					login($name,$password);

					$checkQuery="SELECT * FROM memberuser where name='$name' AND password='$password' ";
					if($run=mysqli_query($con,$checkQuery)){
						$row=mysqli_fetch_array($run);
						$numRows=mysqli_num_rows($run);


					}	
					if(isset($_SESSION['uname'])){
						$jo=$_SESSION['uname'];
					}

				}
			 ?>
			<div class="w3-container">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
    <div class="w3-section">
        <label><b>Username</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="name" value="" autocomplete="off" required>
        <?php 
            if(isset($_POST['login'])) {
                if(empty($name)) {
                    echo "<p class='w3-text-red'><em>Please enter Username!</em></p>";
                }
            }
        ?>
        <label><b>Password</b></label>
		<input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter your password" name="password" value="" autocomplete="off" required>        <?php 
            if(isset($_POST['login'])) {
                if(empty($password)) {
                    echo "<p class='w3-text-red'><em>Please enter Password!</em></p>";
                } elseif(!empty($name) && !empty($password) && $numRows == 0) {
                    echo "<p class='w3-text-red'><em>Invalid Username and Password Combination!</em></p>";
                }
            }
        ?>
        <button id="login" class="w3-button w3-block w3-blue w3-section w3-padding" type="submit"  name="login">Login</button>
    </div>
</form>

				<?php 


					if(isset($_POST['login']))
					{
						
						if(empty($name)||empty($password)||$numRows==0)
						{
							echo "<script>";
								echo"mymod();";
							echo "</script>";
						}
					}
				 ?>
			</div>
		</div>
	</div>	
	</div>
	<!--=========================LOGIN ENDS HERE====================-->
	<!--SECTION 2-->
	<section class="section w3-light-grey" style="background-image:'img.jpg'">
		<div class="w3-container w3-center">
			<!--<i class="fa fa-cog"></i>
			<h2 class="text text-success" style="font-family:Baskerville Old Face;">Lets Begin..</h2><br>--><!--/////////////////////////////////////////////////////////////LETS BEGIN CONTAINER!-->
			<div class="w3-container">
				<div class="row" style="background-image: 'img.jpg'">
					<div class="col-md-4 well text text-left" style="font-family: Harlow Solid Italic;height: 250px;"><h3 class="w3-blue w3-center">Vital Events  Registration</h3>
					Vital  registration is the process by which vital events is recorded in the vital events register by the local admnistration through the region. It provides
                    the first legal recognition of the registrant.
                    <br>
					Most five important vital events registration currently in practice are: Birth registration, marriage  registration, death registration,divorce registration and sometimes adoption.
					</div>
					<div class="col-md-4 well text text-left" style="font-family: Harlow Solid Italic;height: 250px;"><h3 class="w3-blue w3-center">Vital Events Certificates</h3>
					After vital events record of particular registrant is registered successfully vital events registrar generates for registered certificates as soon as vital events registration is finished. 
					<br>
					This certificate is used as a source of individual registrant information through the country.
					</div>
					<div class="col-md-4 well text text-left" style="font-family: Harlow Solid Italic;height: 250px;"><h3 class="w3-blue w3-center">Report</h3>
						All level of events registration offices in the region are responsible for generating different reports depending on the vital event registered at their level for different governmental and non governmental organization for whom want these records.
						<br>
						Depending on report generated by vital events registration offices corresponding organizations take their own action to solve any problems related with thes events through the region.
					</div>
				</div>
			</div>
		</div>
	</section>
<!--News Heading-->
<h1 class="w3-text-shadow w3-center w3-text-white" style="font-weight: bolder;background-color:blue;"> NEWS AND EVENTS</h1>
	<section id="news" class="section w3-dark-gray">

		<div class="container">
			
			<div class="container">
				<div class="row">
<?php 
	//$con=mysqli_connect("localhost","root","Al-aziiz67?","vers");
	$resultPerPage=3;
	$query="SELECT *FROM news";
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
			$sql="SELECT * FROM news order by id desc LIMIT $thisPageResult,$resultPerPage ";
			if($run=mysqli_query($con,$sql)){
				while($row=mysqli_fetch_array($run)){
				
				?>
				<a href="news.php?newsId=<?php echo $row['id']; ?> "><p class="" style="font-family: Algerian; color: yellow; margin-left: 50px;"><?php echo $row['title']; ?></p></a>
				<a href="news.php?newsId= <?php echo $row['id']; ?> "><p class="w3-center"><?php echo substr($row['content'], 0,100) ?>...</p>
				<small class="w3-right">	posted at <?php echo $row['postedtime']; ?></small>	<br>		<hr>
				</a><?php
			}
			}
			else
				echo "not done";?>
			<?php
			 ?></div>
				</div>
			</div>
		</div>		
	</div>
	<br><br>
<div class="w3-center"><h3 class="text text-center"><?php 	
					for($page=1;$page<$numberOfPages;$page++){
							
						echo " <a href=\"index.php?page=".$page." \" class=\"w3-button\">".$page."</a> ";
						}

				 ?></h3></div>
		</div>
	</section>
	<!--ABOUT SECTION-->
	<section class="section" id="about" style="margin-top: -30px;margin-bottom: -55px;">
		<div class="w3-container">
			<div class="w3-row">
				<div class="w3-col m5">
					<img src="img/aboutt.jpg" style="height: 338px;">
				</div>

				<div class="w3-col m7">
					<button onclick="myFunction('Demo1')" class="w3-button w3-block w3-left-align w3-blue" style="font-weight: bolder;font-size: 20px;">
					WEB BASED VITAL EVENT REGISTRATION SYSTEM FOR <BR> SERS REGION </button>

					<div id="Demo1" class="w3-container w3-show"><!--this will enable content to be shown by default-->
					 <h4> <strong>SERS vital events registration agency </strong> </h4>
					  <p> South Eastern Regional State is one of Ethiopia’s Regional State which establish 
						Vital events registration agency to direct, coordinate and support the registration of vital events at regional 
						level and transfer records of vital events to appropriate organs.</p>
						<p>Since vital events records has many advantages for individual persons, governmental and non-governmental 
						organizations these events handled carefully.</p>
						<br><br>
					</div>
					<button onclick="myFunction('vitalevents')" class="w3-button w3-block w3-left-align w3-blue">
					web based vital event registration system Info!!</button>
					<div id="vitalevents" class="w3-container w3-hide">
					 <table border="1" class="w3-table-all w3-text-black">
					 		<b><p class="w3-center w3-text-black"> Vital Event Registration</p></b>
							 <style type="text/css">
							th{
								background-color:blue;
							}
							</style>
					 		<th>Number</th>
					 		<th>Event Type</th>
					 		<th>Period</th>
					 		<tr>
					 			<td>1</td><td>Birth</td><td>3 month</td>
					 		</tr>
					 		<tr>
					 			<td>2</td><td>Death </td><td>1 month</td>
					 		</tr>
					 		<tr>
					 			<td>3</td><td>Marriage </td><td>1 month</td>
					 		</tr>
					 		<tr>
					 			<td>4</td><td>Divorce </td><td>1 month</td>
					 		</tr>
					 		<tr>
					 			<td>5</td><td>Adoption </td><td>1 month</td>
					 		</tr>
					 	
					 </table><br>
					</div>
					<button onclick="myFunction('lorem')" class="w3-button w3-block w3-left-align w3-blue">
					web based vital registration system Policy!!</button><br>

					<div id="lorem" class="w3-container w3-hide">
						<h3>Obligation to declare birth</h3>
						<ul>
							 <li>The birth of a child shall be declared by the father or mother of the child, 
								 in their default, by the guardian of the child or,
								  in default of guardian, by the person who has taken care of the child. </li>
							 <li>Where the child is abandoned or his parents are unknown, any person who knows such condition 
								 shall have the duty to report same to the nearest police or other relevant government organ. </li>
								 <li>A police officer or any other government organ which has received a report in accordance 
									 with this Article shall have the duty to declare the birth to the officer of civil status of 
									 the nearest administrative  office within three days from the date of receipt of the report. </li>
						</ul>
						<h3>Obligation to declare marriage</h3>
						<p>
							<ul>
								<li>
								Where marriage is celebrated before an officer of civil status, 
								the officer of civil status who observed the marriage ceremony shall immediately register the marriage.
								</li>
								<li>
								Where marriage is celebrated by religious or customary ceremony, 
								the couples shall present to an officer of civil status, for registration,
								 the evidence of the marriage referred to in Article 33 of this Proclamation. 
								</li>
							</ul>
						</p>
						<h3>Obligation to declare divorce</h3>
						<p>
						The divorcing partners or one of them shall present the decision of the competent court on the divorce to 
						an officer of civil status for registration of the divorce within the period specified under sub-article (1)
						 of Article 18 of this Proclamation. 
						</p>
						<h3>Obligation to declare death</h3>
						<ul>
							<li>Any person who used to live with the deceased shall declare the death for registration. </li>
							<li>In the absence of persons used to live with the deceased, his relatives by consanguinity or affinity, 
								close neighbors or any person who knows his death shall declare the death for registration. </li>
								<li>
								Any police which has received a report on the death of a person by accidental or unknown cause and 
								whose identity is not known shall declare the death for registration within three days following 
								the date of receipt of the report. 
								</li>
						</ul>
					</div><br>
				</div>
			</div>
		</div>
		
	</section>
	<!--Contact Heading Start here-->
	<section id="contact" class="section w3-blue w3-text-white" style="margin-top: -40px;">
			<div class="container">
				<h2><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;GET IN TOUCH</h2>
			</div>
	</section>

	<!--contact-->
	<section  class="section" style="margin-top: -30px;">
		<div class="w3-container">
			
			 <div class="col-md-6">

				<div class="w3-container w3-blue" style="height: 80px;">
				  <h2 style="padding: 3%;"><i class="fa fa-edit" style="font-size: 40px;"></i>&nbsp;&nbsp;WRITE TO US.</h2>

				</div>

				<form class="w3-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
					<br>
				<label >Your Name</label>

				<input required="" class="w3-input" type="text" name="name">

				<label >Email</label>
				<input required="" class="w3-input" type="email" name="email">
				<label>Message</label>
				<textarea name="message" required="" class="w3-input w3-border" style="resize: none;"></textarea><br>
				<button class="w3-btn w3-blue" type="submit" name="send">Send</button><br><br>
				</form>
			 </div> 
			 <!--==================================-->
			 <div class="col-md-6">

				<div class="w3-container w3-blue" style="height: 80px;">
				  <h2 style="padding: 5%;"><i class="fa fa-phone" style="font-size: 40px;"></i>&nbsp;&nbsp;CONTACT US.</h2>
				</div>

				<div class="row">
					<div class="col-sm-1" style="margin-top: 20px; margin-left: 50px;">
						<i class="fa fa-map-marker" style="font-size: 30px;"></i>

					</div>
					<div class="col-xs-10" style="margin-top: 15px;" >

								<h4>SERS,ARBAMINCH,ETHIOPIA</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-1" style="margin-top: 20px; margin-left: 50px;">
								<i class="fa fa-envelope-o" style="font-size: 30px;"></i>
					</div>
					<div class="col-xs-10" style="margin-top: 15px;">
								<h4>vers@gov.et</h4>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-1" style="margin-top: 20px; margin-left: 50px;">
							<i class="fa fa-phone" style="font-size: 30px;"></i>
					</div>
					<div class="col-xs-10" style="margin-top: 15px;">

								<h4>+251 77764845</h4>
					</div>
				</div>

			 </div> 
			 <!--==================================-->
		</div>
		<?php 
			if(isset($_POST['send'])){
				$name=htmlentities($_POST['name']);
				$email=htmlentities($_POST['email']);
				$message=htmlentities($_POST['message']);
				$date=time();
				$date=date('Y M D @ H:i');
				$query="INSERT INTO comment(name,email,message,date) values('$name','$email','$message','$date')";
				if(mysqli_query($con,$query)){
					echo "Message successfully sent!";
					echo "<script>";
						echo 'alert("Message successfully sent! Thank You!");';
					echo "</script>";
				}
				else
					echo "<script>alert('Something happened');</script>";


			}
		 ?>
	</section>
<!--=======================HELP AND SUPPORT -->
		<div class="w3-container" id="help">
			
			 <div class="col-md-12">

				<div class="w3-container w3-blue" style="height: 80px;">
				  <h2 style=" text-align: center;">&nbsp;&nbsp;HELP AND SUPPORT.</h2>
				
				</div>
				<div class="help">
					<p style="font-style: serif;margin-left: 40px;">Registraion of vital events is a crucial things. please register in time</p>
					<p style="font-style: serif;margin-left: 40px;">Here the following table is the time of event to be registered. Depending on this period of registration any individuals should go to his/her kebele(local admnistration) and register the event.</p>
					 <table border ="" class="w3-table-all w3-text-black">
					 		<b><p class="w3-center w3-text-white"> Vital Event Registration periods</p></b>
					 		<style type="text/css">
					 			th{
					 				background-color:blue;
					 			}
					 		</style>
					 		<th>Number</th>
					 		<th>Event Type</th>
					 		<th>Period</th>
					 		<tr>
					 			<td>1</td><td>Birth</td><td>3 month</td>
					 		</tr>
					 		<tr>
					 			<td>2</td><td>Death </td><td>1 month</td>
					 		</tr>
					 		<tr>
					 			<td>3</td><td>Marriage </td><td>1 month</td>
					 		</tr>
					 		<tr>
					 			<td>4</td><td>Divorce </td><td>1 month</td>
					 		</tr>
					 		<tr>
					 			<td>5</td><td>Adoption </td><td>1 month</td>
					 		</tr>
					 	
					 </table>
					 <h3 style="text-align: center;font-style:italic;color:red;font-weight:bolder;">SOLUTION FOR SOCIAL SERVICE PROBLEM IS IN YOUR HAND !! </h3>
				</div>
			 </div> 
			 <!--==================================-->
		</div>
<!--=================HELP AND SUPPORT===================-->
<footer class="w3-black w3-padding-xlarge w3-center">
    <div class="w3-container">
        <h2 class="w3-text-white" style="margin-top: 22px; font-weight: bolder;">SOUTH EASTERN REGIONAL STATE  <br> VITAL EVENT REGISTRATION SYSTEM</h2>
        <div class="w3-row" style="color: white;">
            <div class="w3-col m4">
                <h4 class="w3-text-white" style="font-weight: bolder;">CONTACT US</h4>
                <p><i class="fa fa-map-marker"></i> ARBAMINCH</p>
                <p><i class="fa fa-mobile"></i> +251 977764845</p>
                <p><i class="fa fa-envelope"></i> email@arbaminch.com</p>
            </div>
            <div class="w3-col m4">
                <h4 class="w3-text-white" style="font-weight: bolder;">QUICK LINKS</h4>
                <p><a href="index.php">Home</a></p>
                <p><a href="#about">About us</a></p>
                <p><a href="#help">Help and Support</a></p>
            </div>
            <div class="w3-col m4">
                <h4 class="w3-text-white" style="font-weight: bolder;">WORKING TIME</h4>
                <p><i class="fa fa-clock-o"></i> Monday-Friday 8:00 AM - 5:00 PM</p>
            </div>
        </div>
    </div>
    <p class="w3-text-white">Copyright &copy; Protected by SERS vital events registration system.May 2024.</p>
</footer>

	

</body>
</html> 