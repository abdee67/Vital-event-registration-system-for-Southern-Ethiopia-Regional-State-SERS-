  <div id="news" class="w3-modal " style="margin-top: -20px;">
            <div class="w3-modal-content">
                 <header class="w3-container w3-blue">
                    <span onclick="getElementById('news').style.display='none'" class="w3-button w3-blue" style="float: right;">&times;</span>
                    <br>
                    <h2 class="w3-text-white w3-center">Upload News</h2>
                  </header>
                   <script type="text/javascript" src="../ckeditor/ckeditor.js">
                                    
                    </script>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <label class="w3-text-blue text text-center">News Title</label><br>
                        <input type="text" name="title" class="w3-input w3-center" value=" <?php if(isset($_POST['edit'])){ if(isset($_SESSION['title'])){echo $_SESSION['title'];} } ?>" required>
                                    <label class="w3-text-blue w3-center">News Content Here</label><br>
                                    <textarea class="ckeditor w3-input" name="news" rows="10" placeholder="inform drug here..." rows="30" cols="8"><?php if(isset($_POST['edit'])){ if(isset($_SESSION['news'])){echo $_SESSION['news'];}  } ?></textarea>
                                        <?php 
                                            if(isset($_POST['send'])){
                                                if(empty($text)){
                                                    echo "<p class='w3-text-red w3-center'>empty report!!</p>"; 
                                                }

                                                if(empty($text)){
                                                    echo "<script>";
                                                        echo "report();";
                                                    echo "</script>";
                                                }
                                            }
                                         ?>
                            <input type="file" name="image">
                            <input type="submit" class="btn btn-primary form-control" name="post" value="Post News">
                        </form>
                        <?php 
                            $success=0;
                            if(isset($_POST['post'])){
                                echo "<script>";
                                    echo "uploadNews()";
                                echo "</script>";
                                $con=mysqli_connect("localhost","root","","vera");
                                $news=$_POST['news'];
                                $title=$_POST['title'];
                                $image=$_FILES['image']['name'];
                                $_SESSION['text']=$news;
                                $extension=strtolower(substr($image, strpos($image, '.')+1));
                                if(!empty($news)&&!empty($title)){
                                    $time=time();
                                    $date=date('Y M D H:i:s',$time);
                                    if($extension=="jpg" || $extension=="gif" || $extension=="jpeg" || $extension=="png"||empty($image)){
                                            $check="SELECT * FROM news WHERE content='$news' ";
                                            if($jo=mysqli_query($con,$check)){
                                                $affected=mysqli_num_rows($jo);
                                                if($affected!=0){
                                                    echo "<script>alert('This news is already posted, no change made to update');</script>";
                                                   # echo "<p class='w3-text-red w3-center'>This news is already posted, no change made to update</p>";
                                                }
                                                else
                                                {
                                                  $success=1;
                                                  $post="INSERT INTO news (title,content,postedtime,image)values('$title','$news','$date','$image')";
                                                  if($jo=mysqli_query($con,$post)){
                                                  $_SESSION['news']=$news;
                                                  $_SESSION['title']=$title;
                                                 echo "<script>alert('News successfully Posted!');</script>";
                                                 #echo "<p class='w3-text-blue w3-center'>News successfully Posted!</p>";
                                            }
                                            else
                                                echo "something went wrong";
                                                }
                                            }
                                            else{
                                                echo "not done";
                                            }
                                            }
                                        else 
                                        {
                                            echo "<p class='w3-text-red'>Selected file is not an image file</p>";
                                        }
                            }
                            else
                                echo "<p class='w3-text-red w3-center' >Empty text or title</p>";
                        }
                        if($success==1)
                            {
                            ?>
                            <p class="w3-center"><em>News will displayed like</em></p>
                            <div class="container w3-center well">
                                <p><b><?php echo $_SESSION['title']; ?></b></p><br>
                                <small><?php echo $_SESSION['news']; ?></small>
                            </div>
                            <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="POST">
                                <input type='submit' name='edit' value='edit' class='form-control'>
                            </form>
                            <?php
                        }
                     ?>
                </div>
            </div>