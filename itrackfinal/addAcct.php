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

        $sql = "INSERT INTO adminview (compOffense, dateComi, compStatus, compInv, compRemarks) 
        VALUES ('$compOffense', '$dateComi', '$dateInv', '$compStatus' '$compInv', '$compRemarks')";      
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
        <br>
        <br>
        <br>
        Offense: <br><input type="text" name="compOffense" placeholder="">
        Date Committed:<br> <input type="text" name="dateComi" placeholder="">
        <!-- <input type="text" name="compStatus" placeholder="Status"> -->
        Investigator on Case: <br><input type="text" name="compInv" placeholder="">
        Remarks: <br><input type="text" name="compRemarks" placeholder="">
		<!-- <input type="password" name="compCompl" placeholder="Date Completed"> -->
        <br>
        <br>
        <button type="submit" name="case-submit">Submit</button>	  

	</form>
				
 
    
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    

</body>

</html>


<?php
    require "viewingfooter.php";
?>
