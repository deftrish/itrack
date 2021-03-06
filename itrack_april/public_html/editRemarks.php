<?php
    session_start();
    
    include 'includes/admin.inc.php';
    require "adminheader.php";
    if(!isset($_SESSION['userId'])){
        header('Location: index.php');
    }
    $userId = $_SESSION['userId'];
    if (isset($_POST['case-submit'])) {
        $compRemarks = $_POST['compRemarks'];
        $id = $_POST['benNum'];
        $date = date('Y-m-d H:i:s');
       // $compCompl = $_POST['compCompl'];

        $sql = "INSERT INTO remarks (remark, adminview_id, userID, created_at) VALUES ('$compRemarks', $id, $userId, '$date')";
        if (!$conn->query($sql)){
            $error = "Something went wrong";
        }
        $remarksId = $conn->insert_id;
        $sql = "UPDATE adminview SET remark_id ='$remarksId' where benNum = $id";
        if (!$conn->query($sql)){
            $error = "Something went wrong";
        }else{
            header("Location: homeitrack.php?");
        }
    }
    $id = $_GET['id'];
    $sql="SELECT * FROM adminview WHERE benNum = $id";

    $result = $conn->query($sql);
    $result = mysqli_fetch_assoc($result)


    
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>iTrack</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <br>
    <br>
    <div class="container">
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?=$error?>
            </div>
        <?php endif ;?>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <table class="table">
                <h1>Case Details</h1>
                    <tbody>
                        <tr>
                            <td>Offense</td>
                            <td><?=$result['compOffense']?></td>
                        </tr>
                        <tr>
                            <td>Investigator on Case</td>
                            <td><?=$result['compInv']?></td>
                        </tr>
                        <tr>
                         <td> Status</td>
                         <td> <?=$result['compStatus']?></td>
                        </tr>
                        <tr>
                            <td> Current Remark</td>
                            <td> <?=$result['compRemarks']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class=form-group>
                    <label for="compRemarks">Remarks</label>
                    <input class="form-control" type="text" name="compRemarks" value="" placeholder="Remarks">
                    <input type="hidden" name="benNum" value="<?=$id ?>"
                </div>
                    <!-- <input type="password" name="compCompl" placeholder="Date Completed"> -->
                    <button class="btn btn-primary" type="submit" name="case-submit">Submit</button>	  
                </form>
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
