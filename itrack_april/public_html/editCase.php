<?php
    session_start();
    
    include 'includes/admin.inc.php';
    require "adminheader.php";
    include_once 'includes/admin.inc.php';
    
    if (isset($_POST['case-submit'])) {
        $compOffense = $_POST['compOffense'];
        $dateComi = $_POST['dateComi'];
        $compStatus = "Under Investigation";
        $compInv = $_POST['compInv'];
        $compRemarks = $_POST['compRemarks'];
       // $compCompl = $_POST['compCompl'];

        $sql = "UPDATE adminview  SET compOffense ='$compOffense', dateComi ='$dateComi', compStatus='$compStatus', 
        compInv='$compInv' compRemarks ='$compRemarks'";
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
    <br>
    <br>
    <div class="container">

    <?php if(isset($error)) : ?>
		<div class="alert alert-danger" role="alert">
            <?=$error?>
		</div>
    <?php endif ;?>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Offense: <input type="text" name="compOffense" value="<?=$result['compOffense']?>" placeholder="Offense">
        <input type="text" name="dateComi" value="<?=$result['dateComi']?>" placeholder="Date Committed">
        <!-- <input type="text" name="compStatus" placeholder="Status"> -->
        <input type="text" name="compInv" value="<?=$result['compInv']?>" placeholder="Investigator on Case">
        <input type="text" name="compRemarks" value="<?=$result['compRemarks']?>" placeholder="Remarks">
		<!-- <input type="password" name="compCompl" placeholder="Date Completed"> -->
        <button type="submit" name="case-submit">Submit</button>	  

	</form>
				
 
    
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    

</body>

</html>


<?php
    require "viewingfooter.php";
?>
