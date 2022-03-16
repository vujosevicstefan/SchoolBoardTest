<?php require_once './dbConnection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php require_once './nav.php'; ?>
	<br/>
	<div class="row">
		<div class="col-2 offset-1">
			<a href="./createStudent.php" class="btn btn-success btn-block">Add student</a>
		</div>
	</div><br/>

	<div class="row">
		<div class="col-10 offset-1">
			<table class="table">
  				<thead>
  					<tr>
  						<th scope="col">#</th>
      					<th scope="col">Name</th>
      					<th scope="col">School board</th>
      					<th scope="col">Edit</th>
      					<th scope="col">Delete</th>
      					<th scope="col">Add grade</th>
      					<th scope="col">Grades</th>
      					<th scope="col">Report</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php require_once './studentTableInfo.php' ?>
  				</tbody>
  			</table>
		</div>
	</div>
</body>
</html>