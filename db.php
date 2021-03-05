<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hackathon";

$con = new mysqli($host, $user, $password, $database);

if ($con->connect_error) {
    echo $con->error();
}
