<?php
session_start();
if(!isset($_SESSION['userId'])){
	header("Location: ../index.php");
}
if (isset($_POST['signup-submitAd'])) {

	require 'dbh.inc.php';

	$firstName = $_POST['fname'];
	$middleName = $_POST['mname'];
	$lastName = $_POST['lname'];
	$username = $_POST['username'];
	$position = $_POST['position'];
	$user_type = $_POST['role'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['cpassword'];

	if (empty($firstName) || empty($middleName) ||empty($lastName) || empty($password) || empty($passwordRepeat) || empty($username)) {
		header("Location: ../signupAdmin.php?error=emptyfields"); 
		exit();
	}
	else if ($password !== $passwordRepeat){
		header("Location: ../signupAdmin.php?error=passswordcheck&rnumber=".$referenceNum."&fname=".$firstName); 
		exit();
	}
	else{

		$hashedPwd =password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (fnameUser, mnameUser, lnameUser, uidUsers, pwdUsers, isAdmin) VALUES ('$firstName', '$middleName', '$lastName', '$username', '$hashedPwd', 1)";
		$conn->query($sql);
		$id = $conn->insert_id;
		$sql = "INSERT INTO admins (userID, admin_type) VALUES ($id, '$user_type')";
		$conn->query($sql);
		
		// mysqli_stmt_execute	($stmt);
		header('Location: ../acctMgmt.php');
		
		

	}

	mysql_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	header("Location ../signupAdmin.php?signupAdmin.php");
	exit();



}