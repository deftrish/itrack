<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }
    // require 'includes/dbh.inc.php';
    require "adminheader.php";

    require 'includes/dbh.inc.php';

    $perPage = 6;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $query = "SELECT count(*) as total FROM feedback";
    
    $result = $conn->query($query);
    $row = $result->fetch_array();
    $totalPages = ceil($row['total'] / $perPage);

    $query = "SELECT * FROM feedback limit $startAt, $perPage";
    $result = $conn->query($query);
    

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
    <div class="container">

        <!--<div class="row">
        <div class="col-md-4">
        <div class="input-group">
            <form action="feedback.php" method="post">
            <input type="text" id="myInput" onkeyup="myFunction()" name="valueToSearch" placeholder="Value To Search">
            <span class="input-group-append">
            <button class="btn btn-outline-secondary border-left-0 border" type="button">
            <i class="fa fa-search"></i>
            </button>
            </span>
            </div>
            </div> -->

            <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input id="search" class="form-control py-2 border-right-0 border" type="text" placeholder="Search Comment" >
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
                        <th>Comments or Suggestions</th>
                        <th>Date</th>
                
                    </thead>
                    <tbody id="table-body">
                    <?php while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row['feed_comments'];?></td>
                    <td><?php echo $row['dateAns'];?></td>
                 
                </tr>
                <?php endwhile;?>
                    </tbody>
                </table>
                </table>
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
                            <a class="page-link" href="feedback.php?page=<?=$page-1?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                                <li class="page-item"><a class="page-link" href="feedback.php?page=<?=$page-1?>"><?=$page-1?></a></li>
                            <?php
                                }
                            ?>
                            <li class="page-item active"><a class="page-link" href="feedback.php?page=<?=$page?>"><?=$page?></a></li>
                            <?php
                                if($page<$totalPages && $totalPages>1){
                            ?>
                                <li class="page-item"><a class="page-link" href="feedback.php?page=<?=$page+1?>"><?=$page+1?></a></li>

                            <li class="page-item">
                            <a class="page-link" href="feedback.php?page=<?=$page+1?>" aria-label="Next">
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

    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
    $(document).ready(function(){
        let populateTable = function(k, v){
            tr = $('<tr></tr>');
            tr.append('<td>'+v.benNum+'</td>');
            tr.append('<td>'+v.feed_comments+'</td>');
            if(v.dateAns == null){
                tr.append('<td></td>');
            }else{
                tr.append('<td>'+v.dateAns+'</td>');
            }
            $('#table-body').append(tr);
        }
        let fetchData = function (event){
            let keyword = $('#search').val();
            console.log(keyword);
            $.ajax({
                type: "POST",
                url: "ajax/feedback.search.php",
                dataType: 'json',
                data: {
                    search : keyword,
                },
                success: function(response){
                    console.log(response);  
                    $('#table-body').html('');
                    $.each(response, populateTable);
                },
            });
        }
        $('#search').change(fetchData);
    })

    </script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    

</body>

</html>
