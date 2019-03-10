<?php
	require "adminheader.php";
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
                        <th>Comments/Suggestions</th>
                        <th>Date and Time</th>
                
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT* FROM feedback";
                        $select_feedback = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($select_feedback))
                        {
                            $benNum = $row['benNum'];
                            $feedbackAns = $row['feedbackAns'];
                            $dateAns = $row['dateAns'];
                            #`benNum`, `feedbackAns`, `dateAns`

                            echo"<tr>";
                            echo "<td> $benNum </td>";
                            echo "<td> $feedbackAns </td>";
                            echo "<td> $dateAns </td>";
                   
                          
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
