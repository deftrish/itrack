<?php
    session_start();
    $userId = $_SESSION['userId'];
    include 'dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $sql = "UPDATE incident_mgmt set is_returned = 0, is_closed = 1, closed_by = $userId, resolved_at = '$date', updated_at = '$date' where incidentTicket = $id";
    $conn->query($sql);
    $sql = "INSERT INTO incident_history (date_time, user_id, action, description, incident_id) 
    VALUES ('$date', '$userId', 'Resolved', 'This incident has been resolved', '$id')";    
    $conn->query($sql);
    header('Location: ../incidentMgmt.php');

?>