<?php
ob_start(); //Turns on output buffering
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$conn = mysqli_connect("localhost", "root", "","social_network_db");
if (mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
}