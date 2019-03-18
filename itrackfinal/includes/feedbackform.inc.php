<?php
session_start();
if(!isset($_SESSION['userId'])){
	header('Location: ../index.php');
}
if (isset($_POST['submit-feedback'])) {
	if(!isset($_POST['benNum'])){
		header('Location: ../index.php');
	}
	require 'dbh.inc.php';

	$userId = $_SESSION['userId'];
	$process = $_POST['process'] ?? '';
	$accomodate = $_POST['accomodate'] ?? '';
	$service = $_POST['service'] ?? '';
	$comment = $_POST['comment'];
	$benNum = $_POST['benNum'];


	$sql = "INSERT INTO feedback (userId, benNum, feed_process, feed_accomodation, feed_service, feed_comments,dateAns) VALUES (?, ?, ?, ?, ?, ?,NOW())";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ssssss', $userId, $benNum, $process, $accomodate, $service, $comment);
	$stmt->execute();
	$stmt->close();
	header("Location: ../feedbackform.php?status=success");

	// 	else {
	// 		mysqli_stmt_bind_param($stmt, "ssss", $process,$accomodate,$service,$comment);
	// 		mysqli_stmt_execute($stmt);
	// 		exit();
	// }
}
?>        

<?php
	header("Location ../feedbackform.php?feedbackform.php");
	exit();
?>