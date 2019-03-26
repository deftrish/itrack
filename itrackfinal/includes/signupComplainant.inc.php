<?php
session_start();
if(isset($_SESSION['userId'])){
	header("Location: ../index.php");
}
if (isset($_POST['signup-submit'])) {

	require 'dbh.inc.php';

	$referenceNum = $_POST['rnumber'];
	$firstName = $_POST['fname'];
	$middleName = $_POST['mname'];
	$lastName = $_POST['lname'];
	$userName = $_POST['uidUsers'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['cpassword'];

	if (empty($referenceNum) || empty($firstName) || empty($middleName) ||empty($lastName) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signupComplainant.php?error=emptyfields"); 
		exit();
	}
	else if ($password !== $passwordRepeat){
		header("Location: ../signupComplainant.php?error=passswordcheck&rnumber=".$referenceNum."&fname=".$firstName); 
		exit();
	}
	else{

		$sql = "SELECT * FROM adminview WHERE benNum = $referenceNum";
		$result = $conn->query($sql);
		if ($conn->affected_rows == 0){
			header("Location: ../signupComplainant.php?error=refererenceNumber");
			exit();
		}
		$row = $result->fetch_array();
		if($row['userID']){
			header('Location: ../signupComplainant.php?error=accountExist');
			exit();
		}
		$sql = "INSERT INTO users (fnameUser, mnameUser, lnameUser, uidUsers, pwdUsers, isAdmin) VALUES (?, ?, ?, ?, ?, 0)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signupComplainant.php?error=sqlerrors");
			exit();
		}
		$hashedPwd =password_hash($password, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "sssss", $firstName, $middleName, $lastName, $userName, $hashedPwd);
		mysqli_stmt_execute($stmt);
		$id = mysqli_stmt_insert_id($stmt);
		$sql = "UPDATE adminview set userID = $id where benNum = $referenceNum";
		$conn->query($sql);
		$_SESSION['userId'] = $id;
		$_SESSION['userUid'] = $userName;
		$_SESSION['isAdmin'] = false;
		header("Location: ../feedbackform.php");
	}

		mysql_stmt_close($stmt);
		mysqli_close($conn);


}else{

	header("Location ../signupComplainant.php?signupComplainant.php");
	exit();

}