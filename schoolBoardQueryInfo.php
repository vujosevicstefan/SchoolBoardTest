<?php 
	$sqlSchoolBoard = "SELECT id, name FROM school_boards";
	$resSchoolBoard = pg_query($dbconn, $sqlSchoolBoard);

	while($rowSchoolBoard = pg_fetch_row($resSchoolBoard)){

		$board_ = new Models\Board($rowSchoolBoard[0],$rowSchoolBoard[1]);

		if($board_->getId() == $student->getSchoolBoardId()){
			$selected = "selected";
		}else{
			$selected = "";
		}

		echo "<option value=".$board_->getId()." $selected>".$board_->getName()."</option>";
	}
?>