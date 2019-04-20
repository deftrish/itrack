<?php
    session_start();
    $userId = $_SESSION['userId'];
    include 'dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    $id = $_GET['id'];
    $sql = "UPDATE incident_mgmt set complete = 1, updated_at =  '$date' where incidentTicket = $id";
    $conn->query($sql);
    header('Location: ../incidentMgmt.php');


    $sql = "INSERT INTO incident_history (date_time, user_id, action, description, incident_id) 
    VALUES ('$date', '$userId', 'Completed', 'This incident has been completed', '$id')";    
    $conn->query($sql);

?>