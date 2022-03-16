<?php 

	if(isset($_GET['student']) && $_GET['student'] != ""){
		$studentId = $_GET['student'];

		$sqlInfo = "SELECT id, name, school_board_id FROM students WHERE id = $1";
		$resInfo = pg_query_params($dbconn, $sqlInfo, array($studentId));
	

		if(!$resInfo){
			exit("STUDENT DOESN'T EXIST!");
		}else{
			$rowInfo = pg_fetch_row($resInfo);

            $student = new Models\Student($rowInfo[0],$rowInfo[1],$rowInfo[2], null);

            $sqlSchoolBoard = "SELECT id, name FROM school_boards WHERE id = $1";
            $resSchoolBoard = pg_query_params($dbconn, $sqlSchoolBoard, array($studentId));
            if(!$resInfo){
			    exit("BOARD DOESN'T EXIST!");
		    } else {
                $rowSchoolBoard = pg_fetch_row($resSchoolBoard);

                $board = new Models\Board($rowSchoolBoard[0], $rowSchoolBoard[1]);

                $student->setBoard($board);
            }
		}
	}else{
		exit("STUDENT ID NOT SET!");
	}
?>