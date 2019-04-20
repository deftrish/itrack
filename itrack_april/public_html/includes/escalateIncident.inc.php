<?php
    session_start();
    $userId = $_SESSION['userId'];
    include 'dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    $id = $_POST['ticketId'];
    $user = $_POST['userId'];
    $sql = "SELECT * FROM users where idUsers = $user";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['fnameUser'].' '.$row['lnameUser'];
    
    $sql = "UPDATE incident_mgmt set escalated_to = $user, updated_at = '$date' where incidentTicket = $id";
    $conn->query($sql);

    $sql = "INSERT INTO incident_history (date_time, user_id, action, description, incident_id) 
    VALUES ('$date', '$userId', 'Escalated', 'This incident has been escalated to  $name', '$id')";    
    $conn->query($sql);

    header("Location: ../incidentMgmt.php?id=$id");
?>