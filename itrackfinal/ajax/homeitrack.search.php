<?php
    require '../includes/dbh.inc.php';
    $keyword = $_POST['search'];
    $filter = $_POST['filter'];
    // $keyword = "1";
    if($filter == 'all'){
        $sql = "SELECT * from adminview where compOffense like '%$keyword%' or benNum like '%$keyword%'";
    }else{
        $sql = "SELECT * from adminview where (compOffense like '%$keyword%' or benNum like '%$keyword%') and compStatus = '$filter'";
    }
    $result = $conn->query($sql);

    $row = [];
    while($case = $result->fetch_array()){
        $row[] = $case;
    }
    echo json_encode($row);
?>