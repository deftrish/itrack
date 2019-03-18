<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }
    // require 'includes/dbh.inc.php';
    require "adminheader.php";

    require 'includes/dbh.inc.php';

    if(isset($_POST['search'])){
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM feedback WHERE CONCAT('benNum', 'feed_comments', 'dateAns') LIKE '%$valueToSearch%'";
        $search_result = filterTable($query);
    }else{
        $query = "SELECT * FROM feedback";
        $result = $conn->query($query);
    }
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
                

                <form action="feedback.php" method="post">
            <input type="text" id="myInput" onkeyup="myFunction()" name="valueToSearch" placeholder="Value To Search"><br><br>

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
                        <th>Blotter Entry Number</th>
                        <th>Comments or Suggestions</th>
                        <th>Date</th>
                
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row['benNum'];?></td>
                    <td><?php echo $row['feed_comments'];?></td>
                    <td><?php echo $row['dateAns'];?></td>
                 
                </tr>
                <?php endwhile;?>
                    </tbody>
                </table>
                </table>
            </div>
        </div>

    </div>
    <script>
        function myFunction() {

// Declare variables 
var input = document.getElementById("myInput");
var filter = input.value.toUpperCase();
var table = document.getElementById("myTable");
var trs = table.tBodies[0].getElementsByTagName("tr");

// Loop through first tbody's rows
for (var i = 0; i < trs.length; i++) {

  // define the row's cells
  var tds = trs[i].getElementsByTagName("td");

  // hide the row
  trs[i].style.display = "none";

  // loop through row cells
  for (var i2 = 0; i2 < tds.length; i2++) {

    // if there's a match
    if (tds[i2].innerHTML.toUpperCase().indexOf(filter) > -1) {

      // show the row
      trs[i].style.display = "";

      // skip to the next row
      continue;

    }
  }
}

}
    </script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    

</body>

</html>


<?php
	require "viewingfooter.php";
?>
