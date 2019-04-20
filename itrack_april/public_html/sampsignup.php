<!DOCTYPE html>
<html lang="en">
<title>Sign up Admin</title>
<head>


    </head>

<body>

<br>
    <div class="container">

        <div class="signup_row">
            <div class="col-lg-3"></div>
            <div class="card">
                 <div class="card-body">            

            
                <div id="iu">

            	   <form class="form-group">
                    <h4 class"loginheader" align="left">Sign up</h4>

                    
            	
            	       <div class="row">
            		      <div class="col-lg-4">
            			     
            			     <b>First Name</b>
            			     <input type="text" name="fname" class=form-control placeholder="Enter your first name...">
                            </div>
                            
                            <div class="col-lg-4">
                            <b>Middle Name</b>
                            <input type="text" name="mname" class=form-control placeholder="Enter your middle name...">
                            </div>
                            
                            <div class="col-lg-4">
                            <b>Last Name</b>
                            <input type="text" name="lname" class=form-control placeholder="Enter your last name...">
                            </div>


                            <div class="col-lg-4">
                            <b>Position</b>
                            <select name="dropdown" name="dropdown" class=form-control>
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

                            <div class="col-lg-4">
                            <b>Qualifier</b>

                            <input type="selectbox" name="qualifier" class=form-control>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-4">
                            <b>PRO</b>
                            <select name="dropdown" name="dropdown" class=form-control>
                                <option value="choose" selected>Choose...</option>
                                <option value="NCRPO">NCRPO</option>
                                <option value="PRO1">PRO 1</option>
                                <option value="PRO2">PRO 2</option>
                                <option value="PRO3">PRO 3</option>
                                <option value="PRO4-A">PRO4-A</option>
                                <option value="PRO4-B">PRO4-B</option>
                                <option value="PRO5">PRO4 5</option>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <b>PPO</b>
                            <select name="dropdown" name="dropdown" class=form-control>
                                <option value="choose" selected>Choose...</option>
                            </select>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-4">
                            <b>PCP</b>
                            <select name="dropdown" name="dropdown" class=form-control>
                                <option value="choose" selected>Choose...</option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>

                        
                        <div class="col-lg-4">
                            <b>WCPC</b>
                            <br>
                        <form action="">
                                <input type="radio" name="answer" value="yes"> Yes
                                <input type="radio" name="answer" value="no"> No
                              
                        </form>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-lg-4">
                            <b>Investigator</b>
                        <form action="">
                                <input type="radio" name="answer" value="yes"> Yes
                                <input type="radio" name="answer" value="no"> No
                              
                        </form>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-4">
                                 <b>Password</b>
                             <input type="text" name="password" class=form-control placeholder="Enter a password...">
                            </div>
                            
                            <div class="col-lg-4">
                            <b>Confirm Password</b>
                            <input type="text" name="cpassword" class=form-control placeholder="Re-enter password...">
                            </div>
                           
                            <div class="col-lg-4">
                            <br>
                           <button  type="submit" id="sendsignup" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= "complainant_view.php" style="color:white;text-decoration:none"> Submit</a>
                           </button>

                           <button  type="cancel" id="cancelsignup" class="btn btn-primary" formation="/homeitrack.php">
                            <a href= "complainant_signup.php" style="color:white;text-decoration:none"> Cancel</a>
                            </button>       
                            </div>

                           
                           </div>

                    
                             
                        </div>


                    </form></div>        
        
                  </form>

            </div>
</body>
</html>
