<?php
if (isset($_POST['signup-submit'])) {

require 'admin.inc.php';

//$username = $_POST['uid'];
//$email = $_POST['mail'];
//$password = $_POST['pwd'];
//$passwordRepeat = $_POST['pwd-repeat'];

$benNum = $_POST['benNum'];
$fnameUser = $_POST['fnameUser'];
$mnameUser = $_POST['mnameUser'];
$lnameUser = $_POST['lnameUser'];
$emailUsers = $_POST['emailUsers'];
$pwdUsers = $_POST['pwdUsers'];
$cpwdUsers = $_POST['pwd-repeat'];

if (empty($benNum) || empty($fnameUser) || empty($mnameUser) || empty($lnameUser) || empty($emailUsers) || empty(pwdUsers)) {
 	header("Location: ../signupComplainant.php?error=emptyfields&benNum=".$benNum."&emailUsers=".$emailUsers); 
 	exit();
}
else if (!filter_var($emailUsers, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $benNum)){
	header("Location: ../signupComplainant.php?error=invalidmail uid"); 

}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
	header("Location: ../signupComplainant.php?error=invalidmail&uid=".$benNum); 
 	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $benNum)) {
	header("Location: ../signupComplainant.php?error=invaliduid&mail=".$emailUsers); 
 	exit();
}
else if ($pwdUsers !== $cpwdUsers){
	header("Location: ../signupComplainant.php?error=passswordcheck&uid=".$benNum."&emailUsers=".$emailUsers); 
 	exit();
}
else{

	    $sql = "SELECT benNum FROM users WHERE benNum=?";
	    $stmt = mysqli_stmt_init($conn);
	    if (!mysqli_stmt_prepare($stmt, $sql)) {
	    	header("Location: ../signupComplainant.php?error=sqlerror");
	    	exit();
	    }
	    else {
	    	mysqli_stmt_bind_param($stmt, "s", $benNum);
	    	mysqli_stmt_execute($stmt);
	    	mysqli_stmt_store_result($stmt);
	    	$resultCheck = mysqli_stmt_num_rows($stmt);
	    	if ($resultCheck > 0){
	    		header("Location: ../signupComplainant.php?error=usertaken&emailUsers=".$emailUsers);
	    		exit();

	    	}
 
	    	else {
	    		$sql = "INSERT INTO users (benNum, emailUsers, pwdUsers) VALUES (?, ?, ?)";
	    		$stmt = mysqli_stmt_init($conn);
	    		if (!mysqli_stmt_prepare($stmt, $sql)){
	    			header("Location: ../signupComplainant.php?error=sqlerror");
	    			exit();
	    		}
	    		else {
	    			$hashedPwd =password_hash($pwdUsers, PASSWORD_DEFAULT);

	    			mysqli_stmt_bind_param($stmt, "sss", $benNum, $emailUsers, $hashedPwd);
	    			mysqli_stmt_execute($stmt);
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