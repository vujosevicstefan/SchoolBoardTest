<?php 
	if(isset($_GET['studentGrade']) && $_GET['studentGrade'] != ""){
		$studentGradeId = $_GET['studentGrade'];

		$sqlInfo = "SELECT grade, student_id FROM student_grade WHERE id = $1";
		$resInfo = pg_query_params($dbconn, $sqlInfo, array($studentGradeId));

		if(!$resInfo){
			exit("STUDENT GRADE DOESN'T EXIST!");
		}else{
			$rowInfo = pg_fetch_row($resInfo);
			$grade = $rowInfo[0];
			$studentId = $rowInfo[1];
			// var_dump($student_name);
		}
	}else{
		exit("STUDENT ID NOT SET!");
	}
?>