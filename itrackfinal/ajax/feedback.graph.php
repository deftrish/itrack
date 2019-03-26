<?php
    session_start();
    require '../includes/dbh.inc.php';
    $sql = "SELECT 
        sum(case feed_process when 'napakahusay' then 1 else 0 end) as napakahusay,
        sum(case feed_process when 'mahusay' then 1 else 0 end) as mahusay,
        sum(case feed_process when 'hindimahusay' then 1 else 0 end) as hindimahusay,
        sum(case feed_process when 'nangangailangan' then 1 else 0 end) as nangangailangan        
    from feedback";
    
    $result = $conn->query($sql);

    $row = [];
    $case = $result->fetch_array();
    $row['process'] = $case;

    $sql = "SELECT 
        sum(case feed_accomodation when 'napakahusay' then 1 else 0 end) as napakahusay,
        sum(case feed_accomodation when 'mahusay' then 1 else 0 end) as mahusay,
        sum(case feed_accomodation when 'hindimahusay' then 1 else 0 end) as hindimahusay,
        sum(case feed_accomodation when 'nangangailangan' then 1 else 0 end) as nangangailangan        
    from feedback";
    
    $result = $conn->query($sql);

    $case = $result->fetch_array();
    $row['accomodation'] = $case;

    $sql = "SELECT 
        sum(case feed_service when 'napakahusay' then 1 else 0 end) as napakahusay,
        sum(case feed_service when 'mahusay' then 1 else 0 end) as mahusay,
        sum(case feed_service when 'hindimahusay' then 1 else 0 end) as hindimahusay,
        sum(case feed_service when 'nangangailangan' then 1 else 0 end) as nangangailangan        
    from feedback";

    $result = $conn->query($sql);

    $case = $result->fetch_array();
    $row['service'] = $case;

    $sql = "SELECT dateAns, count(*) as count, DAYNAME(dateAns) as date  from feedback
    WHERE  YEARWEEK(`dateAns`, 1) = YEARWEEK(CURDATE(), 1) GROUP BY dateAns";

    $result = $conn->query($sql);

    while($case = $result->fetch_array()){
        $row['date'][$case['date']] = $case['count'];

    }
    
    echo json_encode($row);
?>