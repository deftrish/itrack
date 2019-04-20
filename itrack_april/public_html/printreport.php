<?php
    session_start();
    require "adminheader.php";
?>

<!DOCTYPE html>
<html lang="en">
<title>Case Report Details</title>
<head>
    <meta charset="UTF-8">
    <title>iTrack</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <br>

    <div class="container">

        <div class="row">
            <div class="col-md-8">
            <div class="input-group">
            <b>Start Date</b>
            <input type="date" name="incidentdate" class=form-control>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>End Date</b>&nbsp;
            <input type="date" name="incidentdate" class=form-control>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select class="form-control" id="exampleFormControlSelect1">
                         <option value="choose" name="status">Status</option>
                         <option value="underinvestigation" name="status">Under Investigation</option>
                         <option value="cleared" name="status">Cleared</option>
                         <option value="solved" name="status">Solved</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button  type="button" name="searchdaterange" class="btn btn-primary" formation="/homeitrack.php">
            <a href= "#" style="color:white;text-decoration:none">Go</a>
            </button>    
            </div>
            </div>
            </div>
             

<br>
<br>
<h1 class="loginheader">Case Report Details</h1>
        <div class="row">
            <div class="col-md-12">
            <table id="myTable">
                <table class="table table-striped">
                    <thead>
                        <th> Blotter Entry Number</th>
                        <th>Offense</th>
                        <th>Date Committed</th>
                        <th>Status</th>
                        <th>Investigator on Case</th>
                        <th> Date Completed </th>
                    </thead>
                    <tbody id="table-body">
                    <tr>
                    <td>1</td>
                    <td>Pagnanakaw ng kotse</td>
                    <td> 03/22/2019</td>
                    <td>UNDER INVESTIGATION</td>
                    <td>SPO2 Tepes</td>
                    <td> 03/23/2019</td>
                    </tr>
                    </tbody>
                    </table>
                    <button  type="button" name="printReport" class="btn btn-primary" formation="/homeitrack.php">
                    <a href= "#" style="color:white;text-decoration:none">Print Report</a>
                    </button>
                    
                    &nbsp;&nbsp;&nbsp;
                    <button  type="cancel" name="signup-cancelAd" id="signup-cancel" class="btn btn-primary">
                            <a  href="homeitrack.php" style="color:white;text-decoration:none"> Cancel</a>
                   </button>
    
            </div>
            </div>
</div>
</body>
</html>