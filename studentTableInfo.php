<?php 
	$sqlStudents = "
		SELECT 
			s.id, s.name, sb.name 
		FROM students s
		JOIN school_boards sb ON sb.id = s.school_board_id
	";
	$resStudents = pg_query($sqlStudents);

	while($rowStudents = pg_fetch_row($resStudents)){
		$studentId = $rowStudents[0];
		$studentName = $rowStudents[1];
		$studentSchoolBoard = $rowStudents[2];

		echo "<tr>";
			echo "<td>$studentId</td>";
			echo "<td>$studentName</td>";
			echo "<td>$studentSchoolBoard</td>";
			echo "<td><a class=\"btn btn-success\" href=\"./editStudent.php?student=$studentId\">Edit</a></td>";
			echo "<td><a class=\"btn btn-danger\" href=\"./deleteStudentBack.php?student=$studentId\">Delete</a></td>";
			echo "<td><a class=\"btn btn-success\" href=\"./addGrade.php?student=$studentId\">Add</a></td>";
			echo "<td><a class=\"btn btn-primary\" href=\"./grades.php?student=$studentId\">Show</a></td>";
			echo "<td><a class=\"btn btn-primary\" href=\"./report.php?student=$studentId\">Report</a></td>";
		echo "</tr>";
	}
?>			