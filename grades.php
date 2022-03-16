<?php 
    use Models\Grade;

    require './Models/Grade.php';

	require_once './dbConnection.php'; 

	require_once './gradesQueryInfo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>GRADES</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php include './nav.php'; ?>
	<div class="row">
		<div class="col-10 offset-1">
			<h3>List of grades for student <?php echo $studentName; ?> <span style="float: right;"><a href="./addGrade.php?student=<?php echo $studentId; ?>">Add grade</a></span></h3>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-10 offset-1">
			<table class="table">
  				<thead>
  					<tr>
  						<th scope="col">#</th>
      					<th scope="col">Grade</th>
      					<th scope="col">Edit</th>
      					<th scope="col">Delete</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php 
  						require_once './studentGradesInfo.php';
  					?>
  				</tbody>
  			</table>
  		</div>
  	</div>

</body>
</html>