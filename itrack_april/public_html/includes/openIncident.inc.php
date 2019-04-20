<?php
    session_start();
    $userId = $_SESSION['userId'];
    include 'dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $sql = "UPDATE incident_mgmt set updated_at = '$date', is_closed = 0, closed_by = null, resolved_at = null, date_time = '$date', complete = 0 where incidentTicket = $id";
    $conn->query($sql);

    $sql = "INSERT INTO incident_history (date_time, user_id, action, description, incident_id) 
    VALUES ('$date', '$userId', 'Re-open', 'This incident has been re opened', '$id')";    
    $conn->query($sql);

    header('Location: ../incidenthistory.php');

?>