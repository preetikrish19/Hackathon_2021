<?php
include "db.php";
  if (isset($_POST['submit'])) {

      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "uploads/".$filename;
      $sql = "INSERT INTO `images`(`name`) VALUES ( '$filename' )";
      if (move_uploaded_file($tempname, $folder))  {
            //echo $msg = "Image uploaded successfully";
            echo "<script>";
            echo "alert('Details sent to database successfully!!');";
            //echo "window.location.href = 'index.php';";
            echo "</script>";
        }
  else{
            echo "<script>";
            echo "alert('Image not uploaded');";
            //echo "window.location.href = 'index.php';";
            echo "</script>";
            //echo $msg = "Failed to upload image";
      }
    }
  if($con->query($sql))
  {
    //Success
    echo "inserted successfully";
    }
  else{
    echo 'query error' . $mysqli->error;
  }

?>
