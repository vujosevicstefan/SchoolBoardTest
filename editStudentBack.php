<?php 

	require_once './dbConnection.php';
	ini_set("display_errors", "on");

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['studentId']) && $_POST['studentId'] != "" && isset($_POST['studentName']) && $_POST['studentName'] != "" && isset($_POST['schoolBoard']) && $_POST['schoolBoard'] != ""){
			$studentId = $_POST['studentId'];
			$studentName = $_POST['studentName'];
			$schoolBoard = $_POST['schoolBoard'];

			$sqlUpdate = "
				UPDATE students 
				SET
					name = $1,
					school_board_id = $2
				WHERE
					id = $3
			";
			$resUpdate = pg_query_params($dbconn, $sqlUpdate, array($studentName, $schoolBoard, $studentId));

			if(!$resUpdate){
				exit("ERROR WHILE EXECUTING QUERY!");
			}else{
				header("location: ./index.php");
				exit;
			}
		}else{
			exit("STUDENT NAME CANNOT BE EMPTY!");
		}
	}else{
		exit("POST NOT SET!");
	}
?>