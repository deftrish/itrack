<?php
    require "adminheader.php"; 
        include_once 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<title>Case Archive</title>

<link rel="stylesheet" href="assets/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
<body>
  


 <br>
     <br>
     <h1 class="loginheader" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Case Archive</h1>
     <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control py-2 border-right-0 border" type="text" placeholder="Search Ticket Number" class=form-control>
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
        <!-- suggestion: Sort By date should be added next to the search bar -->

        <div class="row">
            <div class="container">            
                <table class="table table-striped">
                <div style="overflow-y:auto;"> 
                <thead>
                    <th>Incident Ticket Number</th>
                    <th>Incident</th>
                    <th>Priority</th>
                    <th>Date and Time Created</th>
                    <th>Solution Required</th>
                    <th>Status</th>
                    <th>Date and Time Resolved</th>
                    <th>Resolved By</th>
                </thead>
                <tbody>
                    <tr>
                            <td>NO DATA</td>
                        </tr>
                    <?php
                        if($conn->affected_rows == 0){
                    ?>
                       
                            <!--pls edit-->
                    <?php }else { 
                        while($row = $result->fetch_array()){
                            $report = $row['incidentReport'];
                            $report = (strlen($report) > 20) ? substr($report, 0, 20) . '...' : $report;
                            $userName = $row['fnameUser'].' '.$row['lnameUser'];
                            echo '<tr>';
                            echo '<td>'.$row['incidentTicket'].'</td>';
                            echo '<td>'.$row['incident'].'</td>';
                            echo '<td>'.$row['date_time'].'</td>';
                            echo "<td>$userName</td>";
                            //hindi pa din po nakikita kung sino yung nagsubmit
                            echo "<td>$report</td>";
                            echo "<td><a href='itmsview_incidentmgmt.php'>Edit Details</a></td>";
                            echo '</tr>';
                        }
                    } ?>
                </tbody>
            </table>
        </div>

</body>
</html>
