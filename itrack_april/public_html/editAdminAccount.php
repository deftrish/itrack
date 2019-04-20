<?php
    session_start();
    if(!isset($_GET['id'])){
        header('Location: acctMgmt.php');
    }
    require('includes/dbh.inc.php');
    $id = $_GET['id'];
    $sql = "SELECT * from users join admins on userID = idUsers where idUsers = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_array();


    $firstName = $row['fnameUser'];
    $middleName = $row['mnameUser'];
    $lastName = $row['lnameUser'];
    $userName = $row['uidUsers'];
    $type = $row['admin_type'];

    require "adminheader.php";
?>

<!DOCTYPE html>
<html lang="en">
<title>Edit Admin Account</title>
<head>
  
    </head>

<body>

<br>
    <div class="container">

        <div class="row">
            <div class="col-lg-3"></div></div>
            <div class="card">
                 <div class="card-body">            

            
                <div id="iu">

                <form action="includes/editAdminAccount.inc.php" method="post">
                    <h4 class="loginheader" align="left">Add Account</h4>

                    
            	
            	       <div class="row">
            		      <div class="col-lg-4">
            			     
            			     <b>First Name</b>
            			     <input type="text" name="fname" class=form-control value="<?=$firstName?>" placeholder="Enter your first name...">
                            </div></div>
                            
                            <div class="row">
                            <div class="col-lg-4">
                            <b>Middle Name</b>
                            <input type="text" name="mname" class=form-control value="<?=$middleName?>" placeholder="Enter your middle name...">
                            </div></div>
                            
                            <div class="row">
                            <div class="col-lg-4">
                            <b>Last Name</b>
                            <input type="text" name="lname" class=form-control value="<?=$lastName?>" placeholder="Enter your last name...">
                            </div>
                            </div>
                            
                            <div class="row">
                            <div class="col-lg-4">
                            <b>Username</b>
                            <input type="text" name="username" class=form-control value="<?=$userName?>" placeholder="Enter your username...">
                            </div></div>

                            <div class="row">
                            <div class="col-lg-4">
                            <b>Position</b>
                            <select name="position" name="dropdown" onmousedown="if(this.options.length>3)
                            {this.size=3;}" onchange='this.size=0;' onblur='this.size=0;' class=form-control>
                                <option value="choose" disabled selected hidden>Choose...</option>
                                <option value="NUP">NUP</option>
                                <option value="PO1">PO1</option>
                                <option value="PO2">PO2</option>
                                <option value="PO3">PO3</option>
                                <option value="SPO1"> SPO1</option>
                                <option value="SPO2">SPO2</option>
                                <option value="SPO3">SPO3</option>
                                <option value="SPO4">SPO4</option>
                                <option value="PINSP">PINSP</option>
                                <option value="PSINSP">PSINSP</option>
                                <option value="PCINSP">PCINSP</option>
                                <option value="PSUPT">PSUPT</option>
                                <option value="PSSUPT">H</option>
                                <option value="PDIR">PDIR</option>
                                <option value="PDDG">PDDG</option>
                                <option value="PDG">PDG</option>
                            </select>
                            </div></div>
                        <input type="hidden" name="id" value="<?=$id?>" >
                        <div class="row">
                        <div class="col-lg-4">
                            <b>Role in the system</b>
                            <select name="role" class=form-control>
                                <option value="choose" disabled selected hidden>Choose...</option>
                                <option value="didm" <?php echo $type == 'didm'? 'selected' : '' ;?> > DIDM Admin </option>
                                <option value="itms" <?php echo $type == 'itms'? 'selected' : '' ;?>> ITMS Admin </option>
                                <option value="investigator" <?php echo $type == 'investigator'? 'selected' : '' ;?>> Duty investigator </option>
                                <option value="incharge" <?php echo $type == 'incharge'? 'selected' : '' ;?>> Police in-charge </option>
                            </select>
                        </div></div>

                   
                        <div class="row">
                        <div class="col-lg-4">
                                 <b>Password</b>
                             <input type="password" name="password" class=form-control placeholder="Enter a password...">
                            </div>
                            
                            <div class="col-lg-4">
                            <b>Confirm Password</b>
                            <input type="password" name="cpassword" class=form-control placeholder="Re-enter password...">
                            </div> </div>

                            <br>

                            <div class="row">
                            <div class="col-lg-4">
                           <input  type="submit" name="signup-submitAd" id="signup-submit" class="btn btn-primary" value="Update">
                           </div>

                           <div class="col-lg-4">
                           <button  type="cancel" name="signup-cancelAd" id="signup-cancel" class="btn btn-primary">
                            <a  href="acctMgmt.php" style="color:white;text-decoration:none"> Cancel</a>
                            </button>       
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            </div>
                            </div>
                           </form>
                           </div>
                           </div>
                           </div>
</body>
</html>

<?php
	require "viewingfooter.php";
?>
