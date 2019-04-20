<?php
    require '../includes/dbh.inc.php';
    $keyword = $_POST['search'];
    // $keyword = "1";
    $sql = "SELECT * from feedback where benNum like '%$keyword%' or feed_comments like '%$keyword%'";
    
    $result = $conn->query($sql);

    $row = [];
    while($case = $result->fetch_array()){
        $row[] = $case;
    }
    echo json_encode($row);
?>