<?php
    session_start();
    include 'dbh.inc.php';

    $id = $_GET['id'];
    $sql = "UPDATE users set isDeleted = 1 where idUsers = $id";
    $conn->query($sql);
    header('Location: ../acctMgmt.php');

?>