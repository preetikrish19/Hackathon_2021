<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hackathon";

$con = new mysqli($host, $user, $password, $database);

if ($con->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
}
