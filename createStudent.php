<?php require_once './dbConnection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADDING STUDENT</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php include './nav.php'; ?>
	<br/>
	<form method="POST" action="./insertStudentBack.php">
		<div class="row">
			<div class="col-2 offset-1">
				<input type="text" name="studentName" required class="form-control" placeholder="Type student name.." />
			</div>
			<div class="col-2">
				<select class="form-control" name="schoolBoard">
					<!-- <option value="-1">-Choose school board type-</option> -->
					<option value="1">CSM</option>
					<option value="2">CSMB</option>
				</select>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-2 offset-1">
				<button type="submit" class="btn btn-success btn-block">ADD</button>
			</div>
		</div>
	</form>
</body>
</html>