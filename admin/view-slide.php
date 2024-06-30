<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Slides</title>
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
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }
        .table img {
            max-width: 100px;
            height: auto;
        }
        .action-buttons a {
            margin: 0 5px;
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
            ?>
            <div class="right_col" role="main">
                <div class="row tile_count" style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>VIEW SLIDE IMAGES</b></i>
                            </h6>
                       </span>                     
                    </div>
                </div>
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item first-dash-item">
                                    <div style="float: right;">
                                        <form action="" method="POST">
                                            <input type="text" name="sname" placeholder="Slide Name.." style="border-radius: 5%;border-color: blue;padding-left: 10px;">
                                            <input type="submit" name="searchslide" value="Search" style="border-color: blue;border-radius: 5%;background-color: blue;color: white;">
                                        </form>
                                    </div>
                                    <?php
                                    if (isset($_POST['searchslide'])) {
                                        $slidename = $_POST['sname'];
                                        $resultPerPage = 10;
                                        $query = "SELECT * FROM slider WHERE slide_name='$slidename'";
                                        $run = mysqli_query($con, $query);
                                        $num = mysqli_num_rows($run);
                                        $numberOfPages = ceil($num / $resultPerPage);
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $thisPageResult = ($page - 1) * $resultPerPage;
                                        $sql = "SELECT * FROM slider WHERE slide_name='$slidename'";
                                        $run = mysqli_query($con, $sql);
                                        $check = mysqli_num_rows($run);
                                        if (!empty($slidename) && $check == 0) {
                                            echo "<p style='color:red;text-align:center;'>No Slide with Provided slidename</p>";
                                        }
                                    ?>
                                    <table class="w3-table-all table table-bordered table-hover">
                                        <style type="text/css">
                                            th {
                                                background-color:blue;
                                                color: white;
                                            }
                                        </style>
                                        <thead>
                                            <tr>
                                                <th>Slide ID</th>
                                                <th>Slide Name</th>
                                                <th>Slide Image</th>
                                                <th colspan="3" style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($run)) { ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['slide_name']; ?></td>
                                                <td><img src="slides_images/<?php echo $row['slide_image']; ?>" class="img-responsive"></td>
                                                <td class="action-buttons">
                                                    <a href="view-slide.php?UIddelete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
                                                    <a href="edit-slide.php?sid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <h3 class="w3-center w3-text-blue">
                                        <?php for ($page = 1; $page <= $numberOfPages; $page++) {
                                            echo "<a href=\"view-slide.php?page=" . $page . "\" class=\"w3-button btn btn-link\">" . $page . "</a> ";
                                        } ?>
                                    </h3>
                                    <?php
                                    } else {
                                        $resultPerPage = 10;
                                        $query = "SELECT * FROM slider";
                                        $run = mysqli_query($con, $query);
                                        $num = mysqli_num_rows($run);
                                        $numberOfPages = ceil($num / $resultPerPage);
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $thisPageResult = ($page - 1) * $resultPerPage;
                                        $sql = "SELECT * FROM slider LIMIT $thisPageResult, $resultPerPage";
                                        $run = mysqli_query($con, $sql);
                                    ?>
                                    <table class="w3-table-all table table-bordered table-hover">
                                        <style type="text/css">
                                            th {
                                                background-color:blue;
                                                color: white;
                                            }
                                        </style>
                                        <thead>
                                            <tr>
                                                <th>Slide ID</th>
                                                <th>Slide Name</th>
                                                <th>Slide Image</th>
                                                <th colspan="3" style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($run)) { ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['slide_name']; ?></td>
                                                <td><img src="slides_images/<?php echo $row['slide_image']; ?>" class="img-responsive"></td>
                                                <td class="action-buttons">
                                                    <a href="delete-slide.php?UIddelete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
                                                    <a href="edit-slide.php?sid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <h3 class="w3-center w3-text-blue">
                                        <?php for ($page = 1; $page <= $numberOfPages; $page++) {
                                            echo "<a href=\"view-slide.php?page=" . $page . "\" class=\"w3-button btn btn-link\">" . $page . "</a> ";
                                        } ?>
                                    </h3>
                                    <?php } ?>
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
