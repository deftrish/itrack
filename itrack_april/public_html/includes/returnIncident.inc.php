<?php
    session_start();
    $userId = $_SESSION['userId'];
    include 'dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $comment = $_GET['comment'];
    $sql = "UPDATE incident_mgmt set comment = '$comment', is_returned = 1, is_closed = 0, closed_by = null, resolved_at = null, updated_at = '$date' where incidentTicket = $id";
    $conn->query($sql);
    $sql = "INSERT INTO incident_history (date_time, user_id, action, description, incident_id) 
    VALUES ('$date', '$userId', 'Returned', 'This incident has been returned with a comment: $comment', '$id')";    
    $conn->query($sql);
    header("Location: ../userview_incidentMgmt.php?id=$id");
?>