<?php 
	require_once './dbConnection.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['studentName']) && $_POST['studentName'] != "" && isset($_POST['schoolBoard']) && $_POST['schoolBoard'] != ""){
			$studentName = $_POST['studentName'];
			$schoolBoard = $_POST['schoolBoard'];

			$sqlAdd = "INSERT INTO students (name, school_board_id) VALUES ($1, $2)";
			$resAdd = pg_query_params($dbconn, $sqlAdd, array($studentName, $schoolBoard));

			if(!$resAdd){
				// exit("<pre>".$sqlAdd."</pre>");
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