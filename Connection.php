<?php

$con = mysqli_connect("localhost","root","root","account");
if (!$con) {
    die("Connection failed: " . $con->connect_error);
    }
?>