<?php 

	if(isset($_GET['student']) && $_GET['student'] != ""){
		$studentId = $_GET['student'];

		$sqlInfo = "SELECT name FROM students WHERE id = $1";
		$resInfo = pg_query_params($dbconn, $sqlInfo, array($studentId));

		if(!$resInfo){
			exit("STUDENT DOESN'T EXIST!");
		}else{
			$rowInfo = pg_fetch_row($resInfo);
			$studentName = $rowInfo[0];
			// var_dump($studentName);
		}
		// student moze da ima maksimum 4 ocjene!
	}else{
		exit("STUDENT ID NOT SET!");
	}
?>