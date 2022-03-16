<?php 

	require_once './dbConnection.php';
	ini_set("display_errors", "on");

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['student']) && $_GET['student'] != ""){
			$studentId = $_GET['student'];
			$broj_ocjena = pg_Fetch_row(pg_query($dbconn, "SELECT COUNT(*) FROM student_grade WHERE student_id = $studentId"))[0];

			$sqlBrojOcjena = "SELECT COUNT(*) FROM student_grade WHERE student_id = $1";
			$resBrojOcjena = pg_query_params($dbconn, $sqlBrojOcjena, array($studentId));
			$rowBrojOcjena = pg_fetch_row($resBrojOcjena);
			$brojOcjena = $rowBrojOcjena[0];

			if($brojOcjena > 0){
				exit("STUDENT HAS GRADES!");
			}else{
				$sqlDelete = "DELETE FROM students WHERE id = $1";
				$resDelete = pg_query_params($dbconn, $sqlDelete, array($studentId));

				if(!$resDelete){
					exit("ERROR WHILE EXECUTING QUERY!");
				}else{
					header("location: ./index.php");
					exit;
				}
			}
		}else{
			exit("STUDENT ID NOT SET!");
		}
	}else{	
		exit("ERROR");
	}

?>