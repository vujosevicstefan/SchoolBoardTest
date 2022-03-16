<?php 
	require_once './dbConnection.php'; 

	require_once './editGradeQueryInfo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDITING GRADE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php include './nav.php'; ?>
	<br/>
	<form method="POST" action="./editGradeBack.php">
		<div class="row">
			<input type="hidden" name="studentGradeId" value="<?php echo $studentGradeId; ?>" required />
			<input type="hidden" name="studentId" value="<?php echo $studentId; ?>" required />
			<div class="col-2 offset-1">
				<input type="number" min="5" max="10" name="grade" required class="form-control" value="<?php echo $grade; ?>" />
			</div>
		</div><br/>
		<div class="row">
			<div class="col-2 offset-1">
				<button type="submit" class="btn btn-success btn-block">SAVE</button>
			</div>
		</div>
	</form>
</body>
</html>