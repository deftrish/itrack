<?php
session_start();
$error = isset($_GET['error'])? $_GET['error'] : null;
require "loginheader.php";
?>


<!DOCTYPE html>
<html lang="en">
<title>Complainant Sign up</title>
<head>
  
    </head>

<body>

<br>
    <div class="container">

        <div class="row">
            <div class="col-lg-"></div>
            <div class="card">
                 <div class="card-body">            

            
                <div id="iu">

                    <form action="includes/signupComplainant.inc.php" method="post">
                    <h4 class="loginheader" align="left">Sign up</h4>
                    <?php if($error) : ?>
                    <div class="alert alert-danger">
                    <?php
                        if($error == 'emptyfields'){
                            echo 'Please Complete the From';
                        }elseif ($error == 'passswordcheck') {
                            echo 'Password do not match';
                        }elseif ($error == 'refererenceNumber'){
                            echo 'Reference Number doesn\'t exist';
                        }elseif ($error == 'accountExist') {
                            echo 'Existing Account is already associated to the Ref. Number';
                        }
                    ?>
                    </div>
                    <?php endif ;?>
                    
            	
            	       <div class="row">
            		      <div class="col-lg-6">
            			     
            			     <b>Reference Number*</b>
            			     <input type="text" name="rnumber" class=form-control placeholder="Enter your reference number...">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                            <b>First Name</b>
                            <input type="text" name="fname" class=form-control placeholder="Enter your first name...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <b>Middle Name</b>
                            <input type="text" name="mname" class=form-control placeholder="Enter your first name...">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                            <b>Last Name</b>
                            <input type="text" name="lname" class=form-control placeholder="Enter your last name...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <b>Username</b>
                            <input type="text" name="uidUsers" class=form-control placeholder="Enter your last name...">
                            </div>
                        </div>
                            
                        <div class="row">
                        <div class="col-lg-6">
                                 <b>Password*</b>
                             <input type="password" name="password" class=form-control placeholder="Enter a password...">
                            </div>
                            
                            <div class="col-lg-6">
                            <b>Confirm Password*</b>
                            <input type="password" name="cpassword" class=form-control placeholder="Re-enter password...">
                            </div>
                        </div>
                           
                        <div class="row">
                            <div class="col-lg-6">
                            <br>
                            <input class="btn btn-primary" type="submit" name="signup-submit">


                            <a class="btn btn-primary" href= "index.php" style="color:white;text-decoration:none"> Cancel</a>
                       </div>


                            
                     


                           

                           
                           </div>

                    
                             
                        </div>



        
                  </form>

            </div>
</body>
</html>

