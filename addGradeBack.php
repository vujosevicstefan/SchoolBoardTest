<?php 

	require_once './dbConnection.php';
	ini_set("display_errors", "on");

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['student']) && $_POST['student'] != "" && isset($_POST['grade']) && $_POST['grade'] != ""){
			$studentId = $_POST['student'];
			$grade = $_POST['grade'];
			$grade = (int) $grade;

			if($grade < 5 || $grade > 10){
				exit("BAD FORMAT FOR GRADE!");
			}

			$sqlStudentNumberGrades = "SELECT COUNT(*) FROM student_grade WHERE student_id = $1";
			$resStudentNumberGrades = pg_query_params($dbconn, $sqlStudentNumberGrades, array($studentId));
			$rowStudentNumberGrades = pg_fetch_row($resStudentNumberGrades);
			$studentNumberGrades = $rowStudentNumberGrades[0];

			if($studentNumberGrades < 4){
				$sqlInsertGrade = "INSERT INTO student_grade (student_id, grade) VALUES ($1, $2)";
				$resInsertGrade = pg_query_params($dbconn, $sqlInsertGrade, array($studentId, $grade));

				if(!$resInsertGrade){
					exit("ERROR WHILE EXECUTING QUERY!");
				}else{
					header("location: ./grades.php?student=$studentId");
					exit;
				}
			}else{
				exit("A STUDENT CAN HAVE 1 to 4 GRADES!");
			}
			// provjeri da li vec ima unesene ocjene, ako ima, mora ih biti ne vise od 4
		}else{
			exit("STUDENT ID CANNOT BE EMPTY!");
		}
	}else{
		exit("POST NOT SET!");
	}
?>