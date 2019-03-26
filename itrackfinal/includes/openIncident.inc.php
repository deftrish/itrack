<?php
    session_start();
    $userId = $_SESSION['userId'];
    include 'dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $sql = "UPDATE incident_mgmt set is_closed = 0, closed_by = null, resolved_at = null, date_time = '$date' where incidentTicket = $id";
    $conn->query($sql);
    header('Location: ../incidenthistory.php');

?>