<?php

$servername = "itrack.webstarterz.com";
$dBUsername = "cp897744_itrack";
$dBPassword = "itrackpassword";
$dBName = "cp897744_itrackDB";

$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);

if ($conn->connect_errno){
	die("connection failed: ".mysqli_connect_error());
}