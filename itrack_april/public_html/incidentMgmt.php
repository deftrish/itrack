<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }
    include 'includes/dbh.inc.php';
    $id = $_SESSION['userId'];

    $perPage = 6;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    if($_SESSION['type'] == 'itms'){
        $sql = "SELECT count(*) as total from incident_mgmt join users on incidentInv = idUsers where (escalated_to = 0 or escalated_to = $id) and is_closed = 0";
    }else{
        $sql = "SELECT count(*) as total from incident_mgmt join users on incidentInv = idUsers where complete = 0 and idUsers = $id";
    }
    
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $totalPages = ceil($row['total'] / $perPage);

    if($_SESSION['type'] == 'itms'){
        $sql = "SELECT * from incident_mgmt join users on incidentInv = idUsers where (escalated_to = 0 or escalated_to = $id) and  is_closed = 0  order by updated_at desc limit $startAt, $perPage";
    }else{
        $sql = "SELECT * from incident_mgmt join users on incidentInv = idUsers where complete = 0 and idUsers = $id order by updated_at desc limit $startAt, $perPage";
    }
    $result = $conn->query($sql);
	require "adminheader.php"; 
    

?>

<!DOCTYPE html>
<html lang="en">
<title>Incident Management</title>
<link rel="stylesheet" href="assets/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<body>
 <br>
	 <br>
	 <h1 class="loginheader" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Incident Management Log</h1>
	 <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input id="search" class="form-control py-2 border-right-0 border" type="text" placeholder="Search Ticket Number" class=form-control>
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
<button  type="newlog" id="newlog" class="btn btn-primary" formation="/homeitrack.php">
	<a href= "addIncident.php" style="color:white;text-decoration:none"> New Log</a> <!--New Log page: to follow -->
                           </button>
&nbsp; &nbsp; &nbsp; <button  type="incidenthistory" id="incidenthistory" class="btn btn-primary" formation="/homeitrack.php">
	<a href= "incidenthistory.php" style="color:white;text-decoration:none"> Incident History</a> <!--Incident History page: to follow -->
                           </button>
        </div>
<br>
        <!-- suggestion: Sort By date should be added next to the search bar -->

        <div class="row">
            <div class="container">            
                <table class="table table-striped" valign="middle">
                <thead>
                    <th>Incident Ticket Number</th>
                    <th>Incident</th>
                    <th>Date and Time Created</th>
                    <th>Filed by</th>
                    <th>Incident Report</th>
                    <th>Option</th>
                </thead>
                <tbody id="table-body">
                    <?php
                        if($conn->affected_rows == 0){
                    ?>
                        <tr>
                            <td>No Data</td>
                        </tr>
                            
                    <?php }else { 
                        while($row = $result->fetch_array()){
                            $report = $row['incidentReport'];
                            $id = $row['incidentTicket'];
                            $report = (strlen($report) > 20) ? substr($report, 0, 20) . '...' : $report;
                            $userName = $row['fnameUser'].' '.$row['lnameUser'];
                            if($_SESSION['type'] == 'itms' && $row['escalated_to'] != 0){
                                echo '<tr class="table-warning">';
                            } elseif($row['is_closed']){
                                echo '<tr class="table-success">';
                            } elseif ($row['is_returned']){
                                echo '<tr class="table-danger">';                                
                            }else{
                                echo '<tr>';
                            }
                            echo '<td>'.$row['incidentTicket'].'</td>';
                            echo '<td>'.$row['incident'].'</td>';
                            echo '<td>'.$row['date_time'].'</td>';
                            echo "<td>$userName</td>";
                            echo "<td>$report</td>";
                            if($_SESSION['type'] == 'itms'){
                                echo "<td><a class='btn btn-success btn-sm' href='itmsview_incidentmgmt.php?id=$id'>Edit Details</a></td>";
                            }else{
                                echo "<td><a class='btn btn-success btn-sm' href='userview_incidentMgmt.php?id=$id'>Edit Details</a>   <a class='btn btn-primary btn-sm' href='incidentDetails.php?id=$id'>View Logs</a></td>";
                            }
                            echo '</tr>';
                        }
                    } ?>
                </tbody>
            </table>
            <script src="js/jquery-3.3.1.min.js"></script>
            <script>
            $(document).ready(function(){
            var search = $('#search');
            search.change(function (event){
                keyword = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "ajax/incidentMgmt.search.php",
                    dataType: 'json',
                    data: {
                        search : keyword
                    },
                    success: function(response){
                        $('#table-body').html('');
                        $.each(response, function(k, v){
                            tr = $('<tr></tr>');
                            tr.append('<td>'+v.incidentTicket+'</td>');
                            tr.append('<td>'+v.incident+'</td>');
                            tr.append('<td>'+v.date_time+'</td>');
                            tr.append('<td>'+v.fnameUser + ' ' + v.lnameUser+'</td>');
                            tr.append('<td>'+v.report+'</td>');
                            if(v.dateCompl == null){
                                tr.append('<td></td>');
                            }else{
                                tr.append('<td>'+v.dateCompl+'</td>');
                            }
                            <?php if($_SESSION['type'] == 'itms'){ ?>
                                tr.append('<td><a class="btn btn-success btn-sm" href="itmsview_incidentmgmt.php?id='+ v.incidentTicket+'">Edit Details</a></td>');
                            <?php }else{ ?>
                                tr.append('<td><a class="btn-success btn-sm" href="userview_incidentMgmt.php?id='+ v.incidentTicket+'">Edit Details</a></td>');
                            <?php } ?>
                            $('#table-body').append(tr);
                        });
                        
                    }
                });
            });
        })
        </script>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <div class="center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                                if($page>1){
                            ?>
                            <li class="page-item">
                            <a class="page-link" href="incidentMgmt.php?page=<?=$page-1?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                                <li class="page-item"><a class="page-link" href="incidentMgmt.php?page=<?=$page-1?>"><?=$page-1?></a></li>
                            <?php
                                }
                            ?>
                            <li class="page-item active"><a class="page-link" href="incidentMgmt.php?page=<?=$page?>"><?=$page?></a></li>
                            <?php
                                if($page<$totalPages && $totalPages>1){
                            ?>
                                <li class="page-item"><a class="page-link" href="incidentMgmt.php?page=<?=$page+1?>"><?=$page+1?></a></li>

                            <li class="page-item">
                            <a class="page-link" href="incidentMgmt.php?page=<?=$page+1?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
</body>
</html>