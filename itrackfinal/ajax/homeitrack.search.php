<?php
    require '../includes/dbh.inc.php';
    $keyword = $_POST['search'];
    // $keyword = "1";
    $sql = "SELECT * from adminview where compOffense like '%$keyword%' or benNum like '%$keyword%'";
    $result = $conn->query($sql);

    $row = [];
    while($case = $result->fetch_array()){
        $row[] = $case;
    }
    echo json_encode($row);
?>