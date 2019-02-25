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
            <div class="container">
            	<table id="myTable">
                <table class="table table-striped">
                    <thead>
                        <th>Blotter Entry Number</th>
                        <th>Offense</th>
                        <th>Date Committed</th>
                        <th>Status</th>
                        <th>Investigator on Case</th>
                        <th>Remarks</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>444444-62587-65</td>
                            <td>Kaso ni Maria</td>
                            <td>10-23-2018</td>
                            <td>CLEARED</td>
                            <td>SPO1 Cruz</td>
                            <td>More info on how to file a case</td>
                        </tr>
                        <tr>
                            <td>444444-62587-65</td>
                            <td>Kaso ni Maria</td>
                            <td>10-23-2018</td>
                            <td>CLEARED</td>
                            <td>SPO1 Cruz</td>
                            <td>More info on how to file a case</td>
                        </tr>
                        <tr>
                            <td>444444-62587-65</td>
                            <td>Kaso ni Maria</td>
                            <td>10-23-2018</td>
                            <td>CLEARED</td>
                            <td>SPO1 Cruz</td>
                            <td>More info on how to file a case</td>
                        </tr>
                        <tr>
                            <td>444444-62587-65</td>
                            <td>Kaso ni Maria</td>
                            <td>10-23-2018</td>
                            <td>CLEARED</td>
                            <td>SPO1 Cruz</td>
                            <td>More info on how to file a case</td>
                        </tr>
                        <tr>
                            <td>444444-62587-65</td>
                            <td>Kaso ni Maria</td>
                            <td>10-23-2018</td>
                            <td>CLEARED</td>
                            <td>SPO1 Cruz</td>
                            <td>More info on how to file a case</td>
                        </tr>
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
