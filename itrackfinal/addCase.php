<?php
    session_start();
    
    include 'includes/admin.inc.php';
    require "adminheader.php";
    include_once 'includes/admin.inc.php';
    
    if (isset($_POST['case-submit'])) {
        $compOffense = $_POST['compOffense'];
        $dateComi = $_POST['dateComi'];
        $compStatus = "under_investigation";
        $compInv = $_POST['compInv'];
        $compRemarks = $_POST['compRemarks'];

        $sql = "INSERT INTO adminview (compOffense, dateComi, compStatus, compInv, compRemarks) 
        VALUES ('$compOffense', '$dateComi', '$compStatus', '$compInv', '$compRemarks')";      
        if (!$conn->query($sql)){
            $error = "Something went wrong";
        }else{
            header("Location: homeitrack.php?");
        }
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
    .content {
  max-width: 250px;
  margin: auto;
  background: white;
  padding: 10px;
}

</style>
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
    <div class="content">

    <?php if(isset($error)) : ?>
		<div class="alert alert-danger" role="alert">
            <?=$error?>
		</div>
    <?php endif ;?>
    <div class="center">
    <div class="col-md-12">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" text-align="left" method="post">
        <br>
        <br>
        <br>
        Offense: <br><input type="text" name="compOffense" placeholder=""><br>
        Date Committed:<br> <input type="text" name="dateComi" placeholder=""><br>
        <!-- <input type="text" name="compStatus" placeholder="Status"> -->
        Investigator on Case: <br><input type="text" name="compInv" placeholder=""><br>
        Remarks: <br><input type="text" name="compRemarks" placeholder="">
		<!-- <input type="password" name="compCompl" placeholder="Date Completed"> -->
        <br>
        <br>
        <button type="submit" name="case-submit">Submit</button>	  

	</form>
				
    </div>
    </div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    

</body>

</html>


<?php
    require "viewingfooter.php";
?>
