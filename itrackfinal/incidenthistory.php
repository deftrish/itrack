<?php
session_start();
	require "adminheader.php"; 
    

?>
<?php
   include_once 'includes/admin.inc.php';
?>
<!-- to follow na lang yung new header -->
<!DOCTYPE html>
<html lang="en">
<title>Incident Management</title>
<link rel="stylesheet" href="css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<body>
 <br>
	 <br>
	 <h1 class="loginheader" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Incident Management Log</h1>
	 <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input class="form-control py-2 border-right-0 border" type="text" placeholder="Search Ticket Number" class=form-control>
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>

</body>
</html>