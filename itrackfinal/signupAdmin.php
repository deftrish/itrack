<?php
 session_start();
    require "adminheader.php";
?>

<!DOCTYPE html>
<html lang="en">
<title>Sign up Admin</title>
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

                <form action="includes/signupAdmin.inc.php" method="post">
                    <h4 class="loginheader" align="left">Add Account</h4>

                    
            	
            	       <div class="row">
            		      <div class="col-lg-4">
            			     
            			     <b>First Name</b>
            			     <input type="text" name="fname" class=form-control placeholder="Enter your first name...">
                            </div></div>
                            
                            <div class="col-lg-4">
                            <b>Middle Name</b>
                            <input type="text" name="mname" class=form-control placeholder="Enter your middle name...">
                            </div>
                            
                            <div class="col-lg-4">
                            <b>Last Name</b>
                            <input type="text" name="lname" class=form-control placeholder="Enter your last name...">
                            </div>

                            <div class="col-lg-4">
                            <b>Username</b>
                            <input type="text" name="username" class=form-control placeholder="Enter your username..">
                            </div>

                            <div class="col-lg-4">
                            <b>email</b>
                            <input type="text" name="email" class=form-control placeholder="Enter your username..">
                            </div>

                            <div class="col-lg-4">
                            <b>Position</b>
                            <select name="position" class=form-control>
                                <option value="choose" selected>Choose...</option>
                                <option value="NUP">NUP</option>
                                <option value="PO1">PO1</option>
                                <option value="PO2">PO2</option>
                                <option value="PO3">PO3</option>
                                <option value="SPO1"> SPO1</option>
                                <option value="SPO2">SPO2</option>
                                <option value="SPO3">SPO3</option>
                            </select>
                            </div>

                        <div class="row">
                        <div class="col-lg-4">
                            <b>Role in the system</b>
                            <select name="role" class=form-control>
                                <option value="didm"> DIDM Admin </option>
                                <option value="itms"> ITMS Admin </option>
                                <option value="investigator"> Duty investigator </option>
                                <option value="incharge"> Police in-charge </option>
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

                           <div class="row">
                            <div class="col-lg-4">
                            <br>
                           <button  type="submit" name="signup-submitAd" id="signup-submit" class="btn btn-primary">
                            <a style="color:white;text-decoration:none"> Submit</a>
                           </button>
                           </div>

                           <button  type="cancel" name="signup-cancelAd" id="signup-cancel" class="btn btn-primary">
                            <a style="color:white;text-decoration:none"> Cancel</a>
                            </button>       
                            </div>
                            </div>

                           </form>
                           </div>
                           </div>
                           </div>
</body>
</html>


