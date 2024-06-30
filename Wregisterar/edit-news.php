<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User Information</title>
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
        .dash-item .inner-item img{
            max-width: 40px;
            border-radius: 50%;
        }
        .dash-item .inner-item .title {
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
            <?php include("inc/slide.php"); ?>
            <?php include("inc/navigation.php"); ?>
            <!-- USER DETAIL BEGINS HERE -->
            <div class="right_col" role="main" style="background-color: <?php if(isset($col)){echo $col;} ?>;">
                <div class="row tile_count" style="border-bottom: 5px solid cadetblue;">
                    <div style="margin-top: 10px;">
                       <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> EDIT NEWS INFORMATION</b></i>
                            </h6>
                        </span>                     
                    </div>
                </div>
                <!-- Main Content -->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                    <div class="inner-item dash-searc-form">
                                        <?php
                                        # GET CURRENT USER INFORMATION USING TITLE
                                        if(isset($_GET['UId'])){
                                            $title = $_GET['UId'];

                                            $selecttitle = "SELECT * FROM news WHERE title='$title'";
                                            $resulttitle = mysqli_query($con, $selecttitle);
                                            $titlelist = mysqli_fetch_array($resulttitle);
                                            $titleName = $titlelist['title'];
                                            $content = $titlelist['content'];
                                        }
                                        ?>

                                        <div class="w3-container">
                                            <form action="update-news.php?newsId=<?php echo $title; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="w3-section">
                                                    <div class="row">
                                                        <label class="w3-text-blue">TITLE</label>
                                                        <input class="w3-input" type="text" name="title" value="<?php echo $titleName; ?>">
                                                    </div>
                                                    <div class="row">
                                                        <label class="w3-text-blue">CONTENT</label>
                                                        <textarea class="ckeditor" name="news"><?php echo $content; ?></textarea>
                                                    </div>
                                                </div>
                                                <input class="w3-btn w3-blue" type="submit" name="updatenews" value="Update News">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Content -->
            </div>
            <!-- USER DETAIL ENDS HERE -->
            <?php include("inc/footer.php"); ?>
        </div>
    </div>
</body>
</html>