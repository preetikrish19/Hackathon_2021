<?php
session_start();
if(isset($_POST['email'])) {
    include 'db.php';
    $email = $con->real_escape_string($_POST['email']);

    $query = "SELECT * FROM user WHERE email='$email'";
    if($result = $con->query($query)){
        if($result->num_rows >0){
            echo "EXIST";
        }else{
            echo "EMAIL DOESN'T EXIST";
        }
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}