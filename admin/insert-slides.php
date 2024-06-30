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
    height: 230px;
    margin-left: 60px;
    margin-top: 23px;
    margin-bottom: 20px;

    border:5px solid;
    border-color: green;
    border-radius: 25px;
   }

</style>
<script type="text/javascript">
         function validateFName(){
            var fullname = document.getElementById("fullname").value;
            
            if(fullname.length == 0){
                produceprompt("empty field","fullnameP","red");   
                return false;
            }
            if(!username.match(/^[A-Za-z]*\s{0}[A-Za-z]*$/)){
                produceprompt("invalid input","fullnameP","red"); 
                return false;
            }
            produceprompt("valid","fullnameP","green");   
            return true;
        }
</script>

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

    <!--==============================INSERT SLIDE IMAGE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>INSERT SLIDE IMAGE</b></i>
                            </h6>
                       </span>                      
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
                                    
         <!---==================Begin adding user back end =================-->
           <?php 
                if(isset($_POST['addimage'])){
               
                $slidename=$_POST['slidename'];
                $slideurl=$_POST['slideurl'];
                $image=$_FILES['image']['name'];
                $slide_image_tmp = $_FILES['image']['tmp_name'];
                $extension=strtolower(substr($image, strpos($image, '.')+1));
                if(isset($_POST['addimage']) ){
                    if(!empty($slidename) && !empty($slideurl) && !empty($image)){
                    if (preg_match("/^[A-Za-z]/",$slidename)) { 
                       if(preg_match("/^[A-Za-z]/",$slideurl)){
                                    if($extension=='jpg'||$extension=='png'||$extension=='gif'||$extension=='jpeg'){
                                                $check="SELECT * from slider where slide_name='$slidename' and slide_url='$slideurl' ";
                                                $count=mysqli_num_rows(mysqli_query($con,$check));
                                                if($count==1){
                                                    echo "<script>";
                                                        echo "alert('slide is already registered')";
                                                    echo "</script>";
                                                    echo "<p class='w3-text-red w3-center'>Another slide registered found with similar information</p>";
                                                }
                                                else
                                                {
                                                    $target_dir = "slides_images/";
                                                    $target_file = $target_dir . basename($image);
                                            $insert="INSERT INTO slider (slide_name,slide_url,slide_image) VALUES('$slidename','$slideurl','$image')";
                                            if(mysqli_query($con,$insert)){
                                                if(move_uploaded_file($slide_image_tmp, $target_file)){
                                                    echo "<p style='color:green;text-align:center;'>Slide Registered Successfully";
                                                }
                                                else
                                                    echo "not done";
                                            }
                                            else
                                                echo "not well done";
                                                }
                                        }else
                                        {
                                            echo "<p class='w3-text-red'>Invalid image format</p>";
                                        }  

                                }
                }
                else{
                    echo "<p class='w3-text-red'>Invalid name format</p>";
                }


                   $time=time();
                   $date=date('Y M D @ H:i:s',$time);               
                   //register($fname,$lname,$email,$phone,$password);
                }

            }

        }

     ?>
         <!--===================End of Back end of adding user==============-->
     <div class="w3-container">
            <form action="" method="POST" enctype="multipart/form-data" >
                 <div class="w3-section">
                    <div class="row">
                        <div class="col-md-5">
                            <label class="w3-text-bblue">Slide Name</label>
                            <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="Slide Name here.." name="slidename" id="slidename"  onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 "value="<?php if(isset($slidename)){echo $slidename;} ?>">
                            <p id="slidenameP"></p>

                                <?php 
                                        if(isset($_POST['addimage'])&&empty($slidename)){

                                            echo "<p class='w3-text-red'>Slide name  must be provided</p>";
                                        }
                                        elseif(isset($_POST['addimage'])&&!preg_match("/^[A-Za-z]/",$slidename)){
                                            echo "<p class='w3-text-red'>invalid Slide Name format!</p>";
                                        }
                                 ?>
                                <label class="w3-text-blue">Sldie Url</label>
                                <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="Slide url here.." name="slideurl"  onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) " id="slideurl" value="<?php if(isset($slideurl)){echo $slideurl;} ?>">
                                <?php 
                                        if(isset($_POST['addimage'])&&empty($slideurl)){

                                            echo "<p class='w3-text-red'>slide url  must be provided</p>";
                                        }
                                        elseif(isset($_POST['addimage'])&&!preg_match("/^[A-Za-z]/",$slideurl)){
                                            echo "<p class='w3-text-red'>invalid slide url format!</p>";
                                        }
                                 ?>
                               
                                 <label class="w3-text-blue">Image</label>
                                 <input type="file" name="image" class="w3-input">    

                         </div>

                        </div> 
                        <button class="w3-button button-primary w3-blue w3-btn-block w3-section w3-padding" name="addimage">Upload</button>
                             </div>
                            </form>
                
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
