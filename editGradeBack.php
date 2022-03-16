<?php 

	require_once './dbConnection.php';


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['studentGradeId']) && $_POST['studentGradeId'] != "" && isset($_POST['grade']) && $_POST['grade'] != "" && isset($_POST['studentId']) && $_POST['studentId'] != ""){
			$studentGradeId = $_POST['studentGradeId'];
			$grade = $_POST['grade'];
			$grade = (int) $grade;
			$studentId = $_POST['studentId'];

			if($grade < 5 || $grade > 10){
				exit("GRADE MUST BE >= 5 AND <= 10");
			}

			$sqlUpdate = "
				UPDATE student_grade 
				SET
					grade = $1
				WHERE
					id = $2 
			";
			$resUpdate = pg_query_params($dbconn, $sqlUpdate, array($grade, $studentGradeId));

			if(!$resUpdate){
				exit("ERROR WHILE EXECUTING QUERY!");
			}else{
				header("location: ./grades.php?student=$studentId");
				exit;
			}
		}else{
			exit("STUDENT ID CANNOT BE EMPTY!");
		}
	}else{
		exit("POST NOT SET!");
	}
?>