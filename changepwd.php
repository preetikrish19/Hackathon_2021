<?php
session_start();
if(isset($_POST['email'])) {
    include 'db.php';
    $email = $con->real_escape_string($_POST['email']);
    $pwd = $con->real_escape_string($_POST['pwd']);

    $query = "UPDATE user SET password='$pwd' WHERE email='$email'";
    if($con->query($query)){
       echo "SUCCESS";
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}