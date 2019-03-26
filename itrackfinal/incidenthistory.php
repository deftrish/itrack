<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }
    $id = $_SESSION['userId'];
    include 'includes/dbh.inc.php';
    if($_SESSION['type'] == 'itms'){
        $sql = "SELECT * from incident_mgmt left join users user2 on closed_by = user2.idUsers  join users user1 on incidentInv  = user1.idUsers where is_closed = 1";
    }else{
        $sql = "SELECT * from incident_mgmt left join users user2 on closed_by = user2.idUsers  join users user1 on incidentInv  = user1.idUsers where is_closed = 1 and incidentInv = $id";
    }
    $result = $conn->query($sql);
	require "adminheader.php"; 
    

?>

<!DOCTYPE html>
<html lang="en">
<title>Incident History</title>
<link rel="stylesheet" href="assets/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<body>
<br>
     <br>
     <h1 class="loginheader" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Incident History</h1>
     <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input id="search" class="form-control py-2 border-right-0 border" type="text" placeholder="Search Ticket Number/Incident" class=form-control>
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
<button  type="incidentMgmt" id="incidenMgmt" class="btn btn-primary" formation="/homeitrack.php">
    <a href= "incidentMgmt.php" style="color:white;text-decoration:none"> Back to Incident Log</a> <!--Incident History page: to follow -->
                           </button>
        </div>
<br>
        <div class="row">
            <div class="container">            
                <table class="table table-striped">
                <thead>
                    <th>Incident Ticket Number</th>
                    <th>Incident</th>
                    <th>Date and Time Created</th>
                    <th>Filed by</th>
                    <th>Incident Report</th>
                    <th>Date and Time Resolved</th>
                    <th>Options</th>
                </thead>
                <tbody id="table-body">
                    <?php
                        if($conn->affected_rows == 0){
                    ?>
                            
                    <?php }else { 
                        while($row = $result->fetch_array()){
                            $id = $row['incidentTicket'];
                            $report = $row['incidentReport'];
                            $report = (strlen($report) > 20) ? substr($report, 0, 20) . '...' : $report;
                            $userName = $row['fnameUser'].' '.$row['lnameUser'];
                            $resolvedAt = $row['resolved_at'];
                            echo '<tr>';
                            echo '<td>'.$id.'</td>';
                            echo '<td>'.$row['incident'].'</td>';
                            echo '<td>'.$row['date_time'].'</td>';
                            echo "<td>$userName</td>";
                            echo "<td>$report </td>";
                            echo "<td>$resolvedAt</td>";
                            //pareflect yung short description here located at "edit details"
                            // echo "<td></td>";
                            // insert date and time resolve
                            // echo "<td><a href='itmsview_incidentmgmt.php'>Edit Details</a></td>";
                            echo "<td><a href='reopenIncident.php?id=$id'>View Incident</a></td>";
                            echo '</tr>';
                        }
                    } ?>
                </tbody>
            </table>
        <!--try q lang to ah! -->
        <script src="js/jquery-3.3.1.min.js"></script>
            <script>
            $(document).ready(function(){
            var search = $('#search');
            search.change(function (event){
                keyword = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "ajax/incidentHistory.search.php",
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
                            tr.append('<td>'+v.resolved_at+'</td>');
                            
                            //kuya ayaw lumabas ng resolvedAt "undefined"
                            tr.append('<td><a href="reopenIncident.php?id='+v.incidentTicket+'">View Incident</a></td>');
                            $('#table-body').append(tr);
                        });
                        
                    }
                });
            });
        })
        </script>                        
                       
</body>
</html>