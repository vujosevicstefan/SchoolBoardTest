<?php 
	$rbr = 0;

	$sqlStudentGrades = "SELECT id, grade, student_id FROM student_grade WHERE student_id = $1";
	$resStudentGrades = pg_query_params($dbconn, $sqlStudentGrades, array($studentId));

	while($rowStudentGrades = pg_fetch_row($resStudentGrades)){
		$rbr++;
		
		$studentGrade = new Models\Grade($rowStudentGrades[0], $rowStudentGrades[2], $rowStudentGrades[1]);

		echo "<tr>";
			echo "<td>$rbr</td>";
			echo "<td>".$studentGrade->getGrade()."</td>";
			echo "<td><a class=\"btn btn-success\" href=\"./editGrade.php?studentGrade=".$studentGrade->getId()."\">Edit</a></td>";
		echo "<td><a class=\"btn btn-danger\" href=\"./deleteGradeBack.php?studentGrade=".$studentGrade->getId()."&student=".$studentGrade->getStudentId()."\">Delete</a></td>";
	echo "</tr>";
	}
?>