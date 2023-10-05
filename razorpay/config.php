<?php

$keyId = 'rzp_test_v7rj1cUpeAqSLA';
$keySecret = 'uX6AX3IPDxx4lzfb2tVo69MC';
$displayCurrency = 'INR';

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);


//Database

$conn = new mysqli('localhost','root','','ev');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error);
} 