<?php 
	require_once './dbConnection.php'; 
	require_once './addGradeQueryInfo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD GRADE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php include './nav.php'; ?>
	<br/>
	<form method="POST" action="./addGradeBack.php">
		<input type="hidden" name="student" value="<?php echo $studentId; ?>" required />
		<div class="row">
			<div class="col-10 offset-1">
				<h3>Add grade for student <?php echo $studentName; ?></h3>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-2 offset-1">
				<input type="number" name="grade" required class="form-control" min="5" max="10" placeholder="MIN 5 - MAX 10" />
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