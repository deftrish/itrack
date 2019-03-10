<?php
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
    <br>
    <br>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <a href="addCase.php" class="btn btn-success">Add</a>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control py-2 border-right-0 border" type="text" value="search" >
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>

        
            <div class="col-md-4">
                <div class="form-group">
                    
                    <select class="form-control" id="exampleFormControlSelect1">
                         <option value="0">Status</option>
                         <option value="1">Under Investigation</option>
                         <option value="2">Cleared</option>
                         <option value="3">Solved</option>
                    </select>
            
                </div>
            </div>

        </div>

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
                        <th>Action</th>
                    </thead>
                    <tbody>
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
                            echo "<td> $compStatus </td>";
                            echo "<td> $compInv </td>";
                            echo "<td> $compRemarks </td>";
                            echo "<td> $dateCompl </td>";
                            echo "<td><a href='editCase.php?id=$benNum'>Edit</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                </table>
            </div>
        </div>
    </div>
    
    
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    

</body>

</html>


<?php
    require "viewingfooter.php";
?>
