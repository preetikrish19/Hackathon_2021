<?php
session_start();
if(isset($_POST['email'])) {
    include 'db.php';
    $email = $con->real_escape_string($_POST['email']);
    $pwd = $con->real_escape_string( $_POST['pwd']);

    $query = "SELECT * FROM user WHERE email='$email'";
    if ($result = $con->query($query)) {
        $row = $result->fetch_assoc();
        if ($pwd == $row['password']) {
            $_SESSION['userid'] = $row['uid'];
            $_SESSION['username'] = $row['name'];
            echo "SUCCESS";
        } else {
            echo 'Incorrect Password';
        }
    } else {
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}