<?php
session_start();

if(isset($_POST['email'])){
    include "db.php";
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $pwd = $con->real_escape_string($_POST['pwd']);

    $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$pwd');";

    if ($con->query($query)){
        echo "SUCCESS";
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}