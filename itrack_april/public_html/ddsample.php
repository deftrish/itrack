<?php
	require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta  charset="utf-8">
	<title>Dropdown</title>
</head>
<body>
	<form method="post">
		<center>
			<label>Select shit:</label>
			<select name="chooserank">
				<option>select...</option>
				<option value="SPO1">SPO1</option>
				<option value="SPO2">SPO2</option> 
				<option value="SPO3">SPO3</option>
			</select>
			<button type="submit" name="submit">submittt</button>
		</center>
	</form>

</body>
</html>