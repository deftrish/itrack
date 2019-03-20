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

	    $sql = "SELECT benNum FROM adminview WHERE benNum = ?";
	    $stmt = mysqli_stmt_init($conn);
	    if (!mysqli_stmt_prepare($stmt, $sql)) {
	    	header("Location: ../signupComplainant.php?error=sqlerror");
	    	exit();
	    }
	    else {
	    	mysqli_stmt_bind_param($stmt, "s", $referenceNum);
	    	mysqli_stmt_execute($stmt);
	    	mysqli_stmt_store_result($stmt);
	    	$resultCheck = mysqli_stmt_num_rows($stmt);
	    	if ($resultCheck > 0){
	    		header("Location: ../signupComplainant.php?error=referencenumbertaken&mail=".$firstname);
	    		exit();

	    	}
 
	    	else {
	    		$sql = "INSERT INTO users (fnameUser, mnameUser, lnameUser, uidUsers, pwdUsers, isAdmin) VALUES (?, ?, ?, ?, ?, ?, 0)";
	    		$stmt = mysqli_stmt_init($conn);
	    		if (!mysqli_stmt_prepare($stmt, $sql)){
	    			header("Location: ../signupComplainant.php?error=sqlerror");
	    			exit();
	    		}
	    		else {
	    			$hashedPwd =password_hash($password, PASSWORD_DEFAULT);

	    			mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $middleName, $lastName, $userName, $hashedPwd);
					mysqli_stmt_execute($stmt);
					$_SESSION['userId'] = mysqli_stmt_insert_id($stmt);
					$_SESSION['isAdmin'] = false;
	    			header("Location: ../signupComplainant.php?signup=success");
	    			exit();
	    	}
	    }
}

}
	mysql_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	header("Location ../signupComplainant.php?signupComplainant.php");
	exit();



}