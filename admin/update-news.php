<?php
require '../connect.php';
$success = 0;
$con = mysqli_connect("localhost", "root", "", "vera");

if (isset($_POST['updatenews'])) {
    $title = $_GET['newsId'];
    $titlename = $_POST['title'];
    $content = $_POST['news'];

    if (!empty($titlename) && !empty($content)) {
        $time = time();
        $date = date('Y M D H:i:s', $time);

        $updatequery = "UPDATE news SET content='$content', title='$titlename' ,postedtime='$date' WHERE title='$title'";
        $result = mysqli_query($con, $updatequery);
        if ($result) {
            echo "<script> alert('Record updated successfully');</script>";
            echo "<p class='w3-text-blue w3-center'>Record updated successfully</p>";
            header("location:view_news.php");
            exit;
        }
        if($result != 0){
            echo "<script> alert('News Already Posted!');</script>";
        } 
        
    } else {
        echo "<p class='w3-text-red w3-center'>Empty text or title</p>";
    }
}


?>
<!-- Include CKEditor from CDN -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

