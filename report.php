<?php
    
    require_once './dbConnection.php';
    ini_set("display_errors", "on");

    if(isset($_GET['student']) && $_GET['student'] != ""){
        $studentId = $_GET['student'];
    }else{
        exit("STUDENT ID NOT SET!");
    }

    $sqlSchoolBoardId = "SELECT school_board_id, name FROM students WHERE id = $1";
    $resSchoolBoardId = pg_query_params($dbconn, $sqlSchoolBoardId, array($studentId));
    $rowSchoolBoardId = pg_fetch_row($resSchoolBoardId);
    $schoolBoardId = $rowSchoolBoardId[0];
    $studentName = $rowSchoolBoardId[1];

    $sqlBoard = "SELECT name FROM school_boards WHERE id = $1";
    $resBoard = pg_query_params($dbconn, $sqlBoard, array($schoolBoardId));
    $rowBoard = pg_fetch_row($resBoard);
    $board = $rowBoard[0];

    $studentGrade = [];

    $sqlGrades = "SELECT grade FROM student_grade WHERE student_id = $1";
    $resGrades = pg_query_params($dbconn, $sqlGrades, array($studentId));

    while($rowGrades = pg_fetch_row($resGrades)){
        $gradeTemp = $rowGrades[0];
        $gradeTemp = (int) $gradeTemp;
        $studentGrade[] = $gradeTemp;
    }

    $average = 0;

    if(count($studentGrade)) {
        $average = array_sum($studentGrade)/count($studentGrade);
    }
    
    if(count($studentGrade) < 1) {
        echo "Student doesn't have any grades!";
        exit;
    }
    // student id, name, list of grades, average and final result

    if ($board == 'CSM') { 
        $arrReport = [];
        $arrReport['id'] = $studentId;
        $arrReport['name'] = $studentName;
        $arrReport['schoolboard'] = $board;
        $arrReport['grades'] = $studentGrade;

        $averageGradeFin = array_sum($studentGrade)/count($studentGrade);
        $arrReport['averageGrade'] = $averageGradeFin;
        
        // if avg >= 7 pass, return JSON format
        if($average >= 7) {
            $arrReport['pass'] = 1;
            echo json_encode($arrReport);
        } else { // fail
            $arrReport['pass'] = 0;
            echo json_encode($arrReport);
        }
    } elseif($board == 'CSMB') {
        $studentGradeStart = $studentGrade;
        if (count($studentGrade) > 2) { // discards the lowest grade
            $min = min($studentGrade);

            foreach (array_keys($studentGrade, $min) as $key) {
                unset($studentGrade[$key]);
            }
        }
        if(max($studentGrade) > 8){ // pass
            csmbResult(true, $studentGrade);
        } else {
            csmbResult(false, $studentGrade);
        }
    } else {
        return 'Greska';
    }

    
    function csmbResult($pass, $array) {
        global $studentId;
        global $studentName;
        global $board;
        global $studentGrade;
        global $studentGradeStart;


        $studentGrade = array_values($studentGrade);
        $studentGradeStart = array_values($studentGradeStart);
        $student = new SimpleXMLElement('<xml/>');

        $total_sum = 0;

        $student->addChild('id', $studentId);
        $student->addChild('name', $studentName);
        $student->addChild('schoolboard', $board);
        $grades = $student->addChild('grades');
        for ($i = 0; $i < count($studentGradeStart); $i++) {
            $grades->addChild("grade", $studentGradeStart[$i]);
        }

        $averageGradeFin = array_sum($studentGrade)/count($studentGrade);
        $averageGrade = $student->addChild('averageGrade', $averageGradeFin);
        $averageGrade->addAttribute('pass', $pass);
        $student->addChild('pass', $pass);
        Header('Content-type: text/xml');
        
        print($student->asXML());
    }
?>