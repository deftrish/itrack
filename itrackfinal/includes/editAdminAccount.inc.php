<?php
session_start();
if(!isset($_SESSION['userId'])){
	header("Location: ../index.php");
}
if(!isset($_POST['id'])){
    header("Location: ../accMgmt.php");
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
    $id = $_POST['id'];

	if (empty($firstName) || empty($middleName) ||empty($lastName) || empty($password) || empty($passwordRepeat) || empty($username)) {
		header("Location: ../editAdminAccount.php?id=$id&error=emptyfields"); 
		exit();
	}
	else if ($password !== $passwordRepeat){
		header("Location: ../editAdminAccount.php?id=$id&error=passswordcheck&rnumber=".$referenceNum."&fname=".$firstName); 
		exit();
	}
	else{

		$hashedPwd =password_hash($password, PASSWORD_DEFAULT);
		$sql = "UPDATE users fnameUser='$firstName', mnameUser='$middleName', lnameUser='$lastName', uidUsers='$username', pwdUsers='$hashedPwd', isAdmin = 1 where idUsers = $id";
		$conn->query($sql);
		$sql = "UPDATE admins userID = $id, admin_type= '$user_type'";
		$conn->query($sql);
		
		// mysqli_stmt_execute	($stmt);
		header('Location: ../acctMgmt.php');
		
		

	}

	mysql_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	header("Location ../editAdminAccount.php?editAdminAccount.php");
	exit();



}