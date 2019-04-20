<?php
    require '../includes/dbh.inc.php';
    $keyword = $_POST['search'];
    $filter = $_POST['filter'];
    // $keyword = "1";
    $sql = "SELECT* FROM adminview left join 
    (
        SELECT  remark, remarks.adminview_id, CONCAT(fnameUser, ' ',lnameUser) as name
        from remarks right join
        (
            SELECT max(created_at) as maxDate, adminview_id from remarks group by adminview_id
        )
        as remarks2 on remarks2.adminview_id = remarks.adminview_id
        join users on remarks.userID = users.idUsers where remarks2.maxDate = remarks.created_at
    )
    as remarks on adminview_id = benNum";
    if($filter == 'all'){
        $sql =  $sql." where compOffense like '%$keyword%' or benNum like '%$keyword%'";
    }else{
        $sql = $sql." where (compOffense like '%$keyword%' or benNum like '%$keyword%') and compStatus = '$filter'";
    }
    $result = $conn->query($sql);

    $row = [];
    while($case = $result->fetch_array()){
        $row[] = $case;
    }
    echo json_encode($row);
?>