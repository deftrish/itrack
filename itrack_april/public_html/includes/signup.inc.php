<?php
if (isset($_POST['signup-submit'])) {

require 'dbh.inc.php';

$refnum = $_POST['benNum'];
$username = $_POST['uidUsers'];
$firstname = $_POST['fnameUser'];
$middlename = $_POST['mnameUser'];
$lastname = $_POST['lnameUser'];
$email = $_POST['emailUsers'];
$password = $_POS['pwdUsers'];
$passwordRepeat = $_POST['cpwdUsers'];

//checking if fields are not empty
if (empty($refnum) || empty($username) || empty($firstname) || empty($middlename) 
|| empty($lastname) || empty($email) || empty($password) || empty($passwordRepeat)) {
//?error shit will be the url info 
	 header("Location: ../signupComplainant.php?error=emptyfields&benNum=".$refnum."&uidUsers=".$username.
	 "&fnameUser=".$firstname."&mnameUser=".$middlename."&lnameUser=".$lastname."&emailUsers=".$email); 
 	exit();
}
// either elseif or else if will do doesnt matter sa php lmao
else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
	header("Location: ../signupComplainant.php?error=invaliduidmail"); 

}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
	header("Location: ../signupComplainant.php?error=invaliduid=".$username); 
 	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
	header("Location: ../signupComplainant.php?error=invaliduidUsers&mail=".$email); 
 	exit();
}
else if ($password !== $passwordRepeat){
	header("Location: ../signupComplainant.php?error=passswordcheck&uidUsers=".$username."&mail=".$email); 
 	exit();
}
else{

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";   
        //init means initialize
        $stmt = mysqli_stmt_init($conn); 
	    if (!mysqli_stmt_prepare($stmt, $sql)) {
	    	header("Location: ../signupComplainant.php?error=sqlerror");
	    	exit();
	    }
	    else {
            //"s" means u are passing strong 
	    	mysqli_stmt_bind_param($stmt, "s", $username);
	    	mysqli_stmt_execute($stmt);
	    	mysqli_stmt_store_result($stmt);
	    	$resultCheck = mysqli_stmt_num_rows($stmt);
	    	if ($resultCheck > 0){
	    		header("Location: ../signupComplainant.php?error=usertaken&email=".$email);
	    		exit();

	    	}
 
	    	else {
	    		$sql = "INSERT INTO users (benNum, uidUsers, fnameUser, mmnameUser, lnameUser
                emailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?, ?, ?)";
	    		$stmt = mysqli_stmt_init($conn);
	    		if (!mysqli_stmt_prepare($stmt, $sql)){
	    			header("Location: ../signupComplainant.php?error=sqlerror");
	    			exit();
	    		}
	    		else {
                     
	    			$hashedPwd =password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "issssss", $refnum, $username, $firstname, $middlename, $lastname,
                    $email, $hashedPwd);
	    			mysqli_stmt_execute($stmt);
	    			header("Location: ../signupComplainant.php?signup=success");
	    			exit();
	    	}
	    }
}

}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	header("Location ../signupComplainant.php");
	exit();



}