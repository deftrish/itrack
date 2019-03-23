<?php
session_start();
if(!isset($_SESSION['userId'])){
    header('Location: index.php');
}
    require "adminheader.php";
?>
<?php
   include_once 'includes/admin.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>iTrack</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<style>

</style>

<body>
    <br>
<br>
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="input-group">
                    <input id="search" class="form-control py-2 border-right-0 border" type="text"placeholder="Search Blotter Entry Number/Offense" >
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select id="statusFilter" class="form-control py-2 border-right-0 border" id="exampleFormControlSelect1">
                         <option value="all" name="status">All</option>
                         <option value="under_investigation" name="status">Under Investigation</option>
                         <option value="cleared" name="status">Cleared</option>
                         <option value="solved" name="status">Solved</option>
                    </select>
                </div>
            </div>  
        </div>
        <br>
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
                        <th>Remarks</th>
                        <th> Date Completed </th>
                        <th> Edited By </th>
                        <th> Action </th>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sql = "SELECT* FROM adminview";
                        $select_case = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($select_case))
                        {
                            $benNum = $row['benNum'];
                            $compOffense = $row['compOffense'];
                            $dateComi = $row['dateComi'];
                            $compStatus = $row['compStatus'];
                            $compInv = $row['compInv'];
                            $compRemarks = $row['compRemarks'];
                            $dateCompl= $row['dateCompl'];
                            #`benNum`, `compOffense`, `dateComi`, `compStatus`, `compInv`, `compRemarks`, `dateCompl`

                            echo"<tr>";
                            echo "<td> $benNum </td>";
                            echo "<td> $compOffense </td>";
                            echo "<td> $dateComi </td>";
                        
                            if($compStatus == 'under_investigation'){
                                echo "<td class='text-danger'> Under Investigation </td>";        
                            }else if($compStatus == 'cleared'){
                                echo "<td class='text-infor'> Cleared </td>";        
                            }else if($compStatus == 'solved'){
                                echo "<td class='text-success'> Solved </td>";        
                            }else{
                                echo "<td > Status Unknown </td>";        
                            }
                            
                            echo "<td> $compInv </td>";
                            echo "<td> $compRemarks </td>";
                            echo "<td> $dateCompl </td>";
                            echo "<td>zz</td>";
                            echo "<td><a href='editRemarks.php?id=$benNum'>Edit Remarks</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <button  type="button" name="printReport" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= '#' style="color:white;text-decoration:none">Print Report</a>
                <!-- nagerror kapag nililink namin sa "printreport.php"-->
                </button>
            </div>
        </div>
    </div>
    
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function(){
            let populateTable = function(k, v){
                tr = $('<tr></tr>');
                tr.append('<td>'+v.benNum+'</td>');
                tr.append('<td>'+v.compOffense+'</td>');
                tr.append('<td>'+v.dateComi+'</td>');
                if(v.compStatus == 'under_investigation'){
                    tr.append("<td class='text-danger'> Under Investigation </td>");
                }else if(v.compStatus == 'cleared'){
                    tr.append("<td class='text-infor'> Cleared </td>");
                }else if(v.compStatus == 'solved'){
                    tr.append("<td class='text-success'> Solved </td>");    
                }else{
                    tr.append("<td> Status Unknown </td>");                        
                }
                
                tr.append('<td>'+v.compInv+'</td>');
                tr.append('<td>'+v.compRemarks+'</td>');
                if(v.dateCompl == null){
                    tr.append('<td></td>');
                }else{
                    tr.append('<td>'+v.dateCompl+'</td>');
                }
                tr.append('<td><a href="editRemarks.php?id='+ v.benNum+'">Edit Remarks</a></td>');
                $('#table-body').append(tr);
            }
            let fetchData = function (event){
                console.log("sfsdf");
                let keyword = $('#search').val();
                let filter = $('#statusFilter').val();
                $.ajax({
                    type: "POST",
                    url: "ajax/homeitrack.search.php",
                    dataType: 'json',
                    data: {
                        search : keyword,
                        filter : filter
                    },
                    success: function(response){
                        console.log(response);  
                        $('#table-body').html('');
                        $.each(response, populateTable);
                    },
                });
            }
            $('#search').change(fetchData);
            $('#statusFilter').change(fetchData);;
        })
    </script>
</body>

</html>

