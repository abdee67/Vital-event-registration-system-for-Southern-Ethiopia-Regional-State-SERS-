<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Slide</title>
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
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php 
            include("inc/head.php"); 
            include("inc/slide.php");
            include("inc/navigation.php"); 
            require '../connect.php'; 

            if (isset($_GET['sid'])) {
                $slide_id = $_GET['sid'];
                $query = "SELECT * FROM slider WHERE id='$slide_id'";
                $result = mysqli_query($con, $query);
                $slide = mysqli_fetch_array($result);
                $slide_name = $slide['slide_name'];
                $slide_url = $slide['slide_url'];
                $slide_image = $slide['slide_image'];
            }

            if (isset($_POST['updateslide'])) {
                $new_slide_name = $_POST['slidename'];
                $new_slide_url = $_POST['slideurl'];
                if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
                    $new_slide_image = $_FILES['image']['name'];
                    $new_slide_image_tmp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($new_slide_image_tmp, "slides_images/$new_slide_image");
                    $update_query = "UPDATE slider SET slide_name='$new_slide_name', slide_url='$new_slide_url', slide_image='$new_slide_image' WHERE id='$slide_id'";
                } else {
                    $update_query = "UPDATE slider SET slide_name='$new_slide_name', slide_url='$new_slide_url' WHERE id='$slide_id'";
                }
                $update_result = mysqli_query($con, $update_query);
                if ($update_result) {
                    echo "<script>alert('Slide has been updated successfully')</script>";
                    echo "<script>window.open('view-slide.php','_self')</script>";
                } else {
                    echo "<script>alert('Failed to update the slide')</script>";
                }
            }
            ?>
            <div class="right_col" role="main">
                <div class="row tile_count" style="border-bottom: 5px solid cadetblue;">
                    <div class="" style="margin-top: 10px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>EDIT SLIDE INFORMATION</b></i>
                            </h6>
                       </span>                      
                    </div>
                </div>
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item first-dash-item">
                                    <div class="inner-item dash-searc-form">
                                        <div class="w3-container">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="w3-section">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="w3-text-green">Slide Name</label>
                                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="Slide Name Here..." name="slidename" value="<?php echo $slide_name; ?>">
                                                            <?php 
                                                            if (isset($_POST['updateslide']) && empty($new_slide_name)) {
                                                                echo "<p class='w3-text-red'>Slide name cannot be empty</p>";
                                                            }
                                                            ?>
                                                            <label class="w3-text-green">Slide Url</label>
                                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="Slide url here..." name="slideurl" value="<?php echo $slide_url; ?>">
                                                            <?php 
                                                            if (isset($_POST['updateslide']) && empty($new_slide_url)) {
                                                                echo "<p class='w3-text-red'>Slide url cannot be empty</p>";
                                                            }
                                                            ?>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Slide Image</label>
                                                                <div class="col-md-6">
                                                                    <input type="file" name="image" class="form-control">
                                                                    <br>
                                                                    <img src="slides_images/<?php echo $slide_image; ?>" width="100" height="100" class="img-responsive">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="updateslide">Update Slide</button>
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
            <?php include("inc/footer.php"); ?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
</body>
</html>
