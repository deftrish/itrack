<?php
    session_start();
    
    require "adminheader.php";
    require 'includes/admin.inc.php';

    $sql = "SELECT * FROM users join admins on admins.userID = users.idUsers  where isAdmin = 1 and isDeleted = 0";
    $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<style>
.content {
  max-width: 800px;
  margin: auto;
  background: white;
  padding: 10px;
}
.btn-xl {
    background-color: #e4e4e4;
    border: 2px;
    padding: 10px 20px;
    font-size: 20px;
    color: black;
    border-radius: 10px;
    width:50%;    //Specify your width here
    
}

</style>
<head>
    <meta charset="UTF-8">
    <title>iTrack</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<style>


</style>

<body>
<br>
<br>

<div class="content">
</div>

<div class="container">
        <a href="signupAdmin.php" class="btn-xl">+ Add Account</a>
        <a href="accountArchive.php" style="background: #24ADE1;color:white" class="btn-xl">Archive</a>
    <br>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Options<th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['idUsers'];
                            $name = $row['fnameUser'] . ' '  . $row['lnameUser'];
                            switch($row['admin_type']){
                                case 'didm':
                                    $userType = 'DIDM Admin';
                                    break;
                                case 'itms':
                                    $userType = 'ITMS Admin';
                                    break;
                                case 'investigator':
                                    $userType = 'Duty intestigator';
                                    break;
                                case 'incharge':
                                    $userType = 'Police in-charge';
                                    break;
                                default:
                                    $userTyp = 'Unknown';

                            }
                            echo "<tr>";
                            echo "<td>$name</td>";
                            echo "<td>$userType</td>";
                            echo "<td><a href='editAdminAccount.php?id=$id'>Edit Account</a>|<a href='includes/deleteAccount.inc.php?id=$id' class='text-danger'>Delete</a></td>";
                            echo "</tr>";
                        }

                    ?>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>


<?php
	require "viewingfooter.php";
?>
