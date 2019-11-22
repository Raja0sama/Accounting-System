<?php

$con = dbconnection();
if (!$con) {
    die("Connection failed: " . $con->connect_error);
    }
?>
