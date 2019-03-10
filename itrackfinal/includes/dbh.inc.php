<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "dbitrack";

$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

if ($conn->connect_errno){
	die("connection failed: ".mysqli_connect_error());
}