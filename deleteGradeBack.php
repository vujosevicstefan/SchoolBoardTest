<?php 
	require_once './dbConnection.php';

	if(isset($_GET['studentGrade']) && $_GET['studentGrade'] != "" && isset($_GET['student']) && $_GET['student'] != ""){
		$studentGrade = $_GET['studentGrade'];
		$studentId = $_GET['student'];

		$sqlCheck = "SELECT COUNT(*) FROM student_grade WHERE id = $1 AND student_id = $2";
		$resCheck = pg_query_params($dbconn, $sqlCheck, array($studentGrade, $studentId));
		$rowCheck = pg_fetch_row($resCheck);
		$check = $rowCheck[0];

		if($check == 1){
			$sqlDelete = "DELETE FROM student_grade WHERE id = $1";
			$resDelete = pg_query_params($dbconn, $sqlDelete, array($studentGrade));

			if(!$resDelete){
				exit("ERROR WHILE EXECUTING QUERY!");
			}else{
				header("location: ./grades.php?student=$studentId");
				exit;
			}
		}else{
			exit("THIS GRADE DOESN'T EXIST!");
		}
	}else{
		exit("STUDENT GRADE ID MUST BE SET!");
	}
?>