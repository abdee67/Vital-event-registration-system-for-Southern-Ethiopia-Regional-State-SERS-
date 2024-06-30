<?php
require '../connect.php';

if (isset($_GET['UIddelete'])) {
    $slide_id = $_GET['UIddelete'];
    
    // Fetch the slide details to get the image file name
    $query = "SELECT slide_image FROM slider WHERE id='$slide_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $slide = mysqli_fetch_array($result);
        $slide_image = $slide['slide_image'];

        // Delete the slide record from the database
        $delete_query = "DELETE FROM slider WHERE id='$slide_id'";
        if (mysqli_query($con, $delete_query)) {
            // Delete the slide image from the server
            if (file_exists("slides_images/$slide_image")) {
                unlink("slides_images/$slide_image");
            }
            echo "<script>alert('Slide has been deleted successfully')</script>";
        } else {
            echo "<script>alert('Failed to delete the slide')</script>";
        }
    } else {
        echo "<script>alert('Slide not found')</script>";
    }
    echo "<script>window.open('view-slide.php','_self')</script>";
} else {
    echo "<script>window.open('view-slide.php','_self')</script>";
}
?>
