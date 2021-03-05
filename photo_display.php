<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_db = 'hackathon';

$mysqli = mysqli_connect(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);
if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
  else{
    echo "connected successfully";
  }
  $conn = mysqli_connect("localhost", "root", "", "hackathon");
  if (isset($_POST['submit'])) {

      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "uploads/".$filename;
      $sql = "INSERT INTO `images`(`name`) VALUES ( '$filename' )";
      if (move_uploaded_file($filename, $folder))  {
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
  if($mysqli->query($sql))
  {
    //Success
    echo "inserted successfully";
    }
  else{
    echo 'query error' . $mysqli->error;
  }

?>
