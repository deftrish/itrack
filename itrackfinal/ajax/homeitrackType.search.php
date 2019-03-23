<?php
    require '../includes/dbh.inc.php';
    $keyword = $_POST['search'];
    // $keyword = "1";
    if($keyword == 'all'){
        $sql = "SELECT * from adminview";
    }else{
        $sql = "SELECT * from adminview where compStatus = '$keyword'";
    }
    $result = $conn->query($sql);

    $row = [];
    while($case = $result->fetch_array()){
        $row[] = $case;
    }
    echo json_encode($row);
?>