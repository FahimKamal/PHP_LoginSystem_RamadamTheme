<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "userInfo1";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}