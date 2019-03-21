<?php
    require '../includes/dbh.inc.php';
    $keyword = $_POST['search'];
    $sql = "SELECT * from incident_mgmt join users on incidentInv = idUsers where (incident like '%$keyword%' or incidentTicket like '%$keyword%') and is_closed = 0";
    $result = $conn->query($sql);

    $row = [];
    while($case = $result->fetch_array()){
        $report = $case['incidentReport'];
        $case['report'] = (strlen($report) > 20) ? substr($report, 0, 20) . '...' : $report;
        $row[] = $case;
    }
    echo json_encode($row);
?>