<?php
require("check.php");

/* to see the attendance */
//Checking if the data is sent from the calling script or not
if ($_REQUEST['name'] == "showAttendance") {
    //Getting sem 
    $sem = $_REQUEST['sem'];
    //Creating table name for queries related to attendance 
    $tableName = "attendance" . $sem . "thsem";
    //Query to get the names of the table from database whose name is exactly as same as $tableName
    $result = mysqli_query($conn, "SHOW TABLES LIKE '" . $tableName . "'");
    $tableExist = mysqli_num_rows($result) > 0;
    /*Checking if the table exists*/
    if ($tableExist) {
        //Getting sem 
        $sem = $_REQUEST['sem'];
        //Getting the value from where to divide the students into two groups
        $divide = $_REQUEST['divide'];
        //Creating table name for queries related to attendance 
        $tableName = "attendance" . $sem . "thsem";
        //student_id of the last student of Group A
        $lastStudentId = 0;
        //Getting the data from attendance table
        $studentDataResult = mysqli_query($conn, "SELECT * FROM $tableName");
        //initialising loop control variable
        $i = 1;

        while ($studentRow = mysqli_fetch_assoc($studentDataResult)) {
            if ($i <= $divide) {
                //Setting the value of lastStudentId to student_id until loop is terminated
                $lastStudentId = $studentRow['student_id'];
            } else {
                break;
            }
            //incrementing loop control variable
            $i = $i + 1;
        }
        /* For First Group*/
        //initialises to 1 if the attendance of any student is null in any subject
        $ifNull = 0;
        //stores the subjects in which the attendance of any student is null
        $nullSubjects = "";
        $theorySubject = ""; //stores the name of theory subjects
        $practicalSubject = ""; //stores the name of practical subjects
        $theoryCount = 0; //count of theory subjects
        $practicalCount = 0; //count of practical subjects
        $theoryTH = ""; //Individual theory subjects count as table heading (1   2   3)
        $practicalTH = ""; //Individual practical subjects count as table heading (1   2   3)
        $theoryTotalTH = ""; //stores new tH for each Theory subject's max classes taken
        $practicalTotalTH = ""; //stores new tH for each Practical subject's max classes taken
        $theoryTotal = 0; //Total count of th classes taken in theory of all subjects
        $practicalTotal = 0; //Total count of th classes taken in practical of all subjects
        $theoryTotalArray = array(); //Array which stores element with subject column=max classes of Theory classes
        $practicalTotalArray = array(); //Array which stores element with subject column=max classes of Theory classes
        //Query to select data from table
        $subjectColumnResult = mysqli_query($conn, "SELECT * FROM $tableName");
        while ($fieldinfo = mysqli_fetch_field($subjectColumnResult)) {
            //fetching the column names from the table
            //Query to check whether there is any vacant cell in the attendance table
            $CheckColumnNullQuery = mysqli_query($conn, "SELECT * FROM $tableName WHERE $fieldinfo->name IS NULL OR $fieldinfo->name = ''");

            if (mysqli_num_rows($CheckColumnNullQuery) == 0) {
                //Executed if there is no students whose attendance data is not added
                //explode() is used to divide the string into array to get the subject_id from the column name because column is concatenated with s (as the column name can't start from number in MySQL)
                $subjectId = explode("s", $fieldinfo->name);
                //getting data from the subject table about the specific subject using id
                if ($subjectIdResult = mysqli_query($conn, "SELECT * FROM `subject` WHERE `subject_id`='$subjectId[1]'")) {
                    $subjectRow = mysqli_fetch_assoc($subjectIdResult);
                    if (isset($subjectRow['type']) && $subjectRow['type'] == "theory") {
                        //Executes if the subject type is "Theory"
                        $theoryCount = $theoryCount + 1; //incrementing the count by 1 every time there is a theory subject
                        $theorySubject .= "<th>" . $subjectRow['subject_name'] . " (T)</th>"; //adding the new theory subject name into existing row
                        $theoryTH .= "<th>" . $theoryCount . " </th>"; //Adds data to table heading as 1 2 3 for 3 theory subject
                        //Query to get the largest total classes of the theory subject for the Group A
                        if ($query = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING($fieldinfo->name, 1, 3) AS UNSIGNED)) AS max FROM $tableName WHERE student_id < $lastStudentId ORDER BY student_id")) {
                            $row = mysqli_fetch_assoc($query);
                            $theoryTotalTH .= '<th>' . $row['max'] . '</th>'; //Adds new tH for each subject's max classes taken
                            $theoryTotal = $theoryTotal + $row['max']; //Total count of th classes taken in theory of all subjects
                            $theoryTotalArray[$fieldinfo->name] = $row['max']; //Appends element with subject column=max classes
                        }
                    } else if (isset($subjectRow['type']) && $subjectRow['type'] == "practical") {
                        //Executes if the subject type is "Practical"
                        $practicalCount = $practicalCount + 1; //incrementing the count by 1 every time there is a practical subject
                        $practicalSubject .= "<th>" . $subjectRow['subject_name'] . " (P)</th>"; //adding the new practical subject name into existing row
                        $practicalTH .= "<th>" . $practicalCount . " </th>"; //Adds data to table heading as 1 2 3 for 3 practical subject
                        //Query to get the largest total classes of the practical subject for the Group A
                        if ($query = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING($fieldinfo->name, 1, 3) AS UNSIGNED)) AS max FROM $tableName WHERE student_id < $lastStudentId ORDER BY student_id")) {
                            $row = mysqli_fetch_assoc($query);
                            $practicalTotalTH .= '<th>' . $row['max'] . '</th>'; //Adds new tH for each subject's max classes taken
                            $practicalTotal = $practicalTotal + $row['max']; //Total count of th classes taken in theory of all subjects
                            $practicalTotalArray[$fieldinfo->name] = $row['max']; //Appends element with subject column=max classes
                        }
                    }
                }
            } else {
                //Executed if there is student(s) whose attendance data is not added
                //explode() is used to divide the string into array to get the subject_id from the column name because column is concatenated with s (as the column name can't start from number in MySQL)
                $subjectId = explode("s", $fieldinfo->name);
                //getting data from the subject table about the specific subject using id
                $subjectIdResult = mysqli_query($conn, "SELECT * FROM `subject` WHERE `subject_id`='$subjectId[1]'");
                //fetching data from the table as associative array
                $subjectRow = mysqli_fetch_assoc($subjectIdResult);
                //storing the subject name into the  nullSubjects variable
                $nullSubjects .= " <br>" . $subjectRow['subject_name'] . " (" . $subjectRow['type'] . ")";
                //increments the IfNull count by 1 every time a subject column in attendance table have some null value
                $ifNull = $ifNull + 1;
            }
        }

        if ($ifNull < 1) {
            //Executes if there no Null subject
            $attendance = ""; //Variable for storing the attendance table <tbody> data

            //Query to get the student name and sbrn and attendance of every subject using inner Joining the tables on student_id only for first group
            $attendanceResult = mysqli_query($conn, "SELECT * FROM $tableName INNER JOIN student ON $tableName.student_id = student.student_id ORDER BY $tableName.student_id LIMIT 0,$divide");
            while ($attendanceRow = mysqli_fetch_assoc($attendanceResult)) {
                //
                $attendanceTheory = ""; //Stores TD cells of evry student of Theory subjects
                $attendancePractical = ""; //Stores TD cells of evry student of practical subjects
                $attendanceTheoryTD = ""; //attended classes of the Theory subject into TD
                $attendancePracticalTD = ""; //attended classes of the Practical subject into TD
                $attendanceTheoryTotal = 0; //Total classes taken of one student in theory subjects
                $attendancePracticalTotal = 0; //Total classes taken of one student in practical subjects
                $attendanceTheoryAttendedTotal = 0; //Total classes attended of one student in theory subjects
                $attendancePracticalAttendedTotal = 0; //Total classes sttended of one student in practical subjects
                //Appending the data to attendance table body eg. student name and student sbrn
                $attendance .= "<tr><td>" . $attendanceRow['student_name'] . "</td><td>" . $attendanceRow['sbrn'] . "</td>";
                $subjectColumnResult = mysqli_query($conn, "SELECT * FROM $tableName");
                while ($fieldinfo = mysqli_fetch_field($subjectColumnResult)) {
                    $subjectId = explode("s", $fieldinfo->name); //Extracting the id from column Name
                    //Query to get subject data
                    if ($subjectIdResult = mysqli_query($conn, "SELECT * FROM `subject` WHERE `subject_id`='$subjectId[1]'")) {

                        $subjectRow = mysqli_fetch_assoc($subjectIdResult);
                        if (isset($subjectRow['type']) && $subjectRow['type'] == "theory") {
                            //Executes if the subject type is "Theory"
                            $subjectAttendanceArray = explode("/", $attendanceRow[$fieldinfo->name]); //spliting the total classes and attended classes
                            if ($theoryTotalArray[$fieldinfo->name] == $subjectAttendanceArray[0]) {
                                //Executes if the total classes in $theoryTotalArray is equal to $subjectAttendanceArray[0]
                                $attendanceTheoryTD = "<td>" . $subjectAttendanceArray[1] . "</td>"; //creates attended classes of the subject into  TD
                                $attendanceTheoryAttendedTotal = $attendanceTheoryAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the theory subjects
                                $attendanceTheoryTotal = $attendanceTheoryTotal + $subjectAttendanceArray[0]; //Total taken classes of the theory subjects
                            } else {
                                //Executes if the total classes in $theoryTotalArray is not equal to $subjectAttendanceArray[0]
                                $attendanceTheoryTD = "<td>" . $attendanceRow[$fieldinfo->name] . "</td>";
                                $attendanceTheoryAttendedTotal = $attendanceTheoryAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the theory subjects
                                $attendanceTheoryTotal = $attendanceTheoryTotal + $subjectAttendanceArray[0]; //Total taken classes of the theory subjects
                            }
                            $attendanceTheory .= $attendanceTheoryTD; //adds attendance TD to attendanceTheory
                        } else if (isset($subjectRow['type']) && $subjectRow['type'] == "practical") {
                            //Executes if the subject type is "Practical"
                            $subjectAttendanceArray = explode("/", $attendanceRow[$fieldinfo->name]); //spliting the total classes and attended classes
                            if ($practicalTotalArray[$fieldinfo->name] == $subjectAttendanceArray[0]) {
                                //Executes if the total classes in $practicalTotalArray is equal to $subjectAttendanceArray[0]
                                $attendancePracticalTD = "<td>" . $subjectAttendanceArray[1] . "</td>"; //creates attended classes of the subject into  TD
                                $attendancePracticalAttendedTotal = $attendancePracticalAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the practical subjects
                                $attendancePracticalTotal = $attendancePracticalTotal + $subjectAttendanceArray[0]; //Total taken classes of the practical subjects
                            } else {
                                //Executes if the total classes in $practicalTotalArray is equal to $subjectAttendanceArray[0]
                                $attendancePracticalTD = "<td>" . $attendanceRow[$fieldinfo->name] . "</td>"; //creates full data of the subject into  TD
                                $attendancePracticalAttendedTotal = $attendancePracticalAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the practical subjects
                                $attendancePracticalTotal = $attendancePracticalTotal + $subjectAttendanceArray[0]; //Total taken classes of the practical subjects
                            }
                            $attendancePractical .= $attendancePracticalTD; //adds attendance TD to attendancePractical
                        }
                    }
                }
                $TheoryPercentage = round(($attendanceTheoryAttendedTotal / $attendanceTheoryTotal) * 100, 2); //Getting the theory percentage and rounding off it to two decimal points of individual student
                $PracticalPercentage = round(($attendancePracticalAttendedTotal / $attendancePracticalTotal) * 100, 2); //Getting the practical percentage and rounding off it to two decimal points of individual student
                $attendance .= $attendanceTheory; //adds the Theory attendance cells to the attendance table body variable
                $attendance .= "<td>" . $attendanceTheoryAttendedTotal . "</td>"; //adds the Total Theory classes attended by student into  cells tof attendance table body variable
                if ($TheoryPercentage < 75) {
                    $attendance .= "<td class='low'><b>" . $TheoryPercentage . "</b></td>"; //adding the low class to td if percentage<75% and adds it to attendance variable
                } else {
                    $attendance .= "<td><b>" . $TheoryPercentage . "</b></td>";
                }

                $attendance .= $attendancePractical; //adds the practical attendance cells to the attendance table body variable
                $attendance .= "<td>" . $attendancePracticalAttendedTotal . "</td>"; //adds the Total practical classes attended by student into  cells tof attendance table body variable
                if ($PracticalPercentage < 75) {
                    $attendance .= "<td class='low'><b>" . $PracticalPercentage . "</b></td></tr>"; //adding the low class to td if percentage<75% and adds it to attendance variable
                } else {
                    $attendance .= "<td><b>" . $PracticalPercentage . "</b></td></tr>";
                }
            }


            $theorySpan = $theoryCount + 2; //colspan for "Theory" in the table heading
            $practicalSpan = $practicalCount + 2; //colspan for "Practical" in the table heading

            $date = new DateTime(); //creating a new date object
            $date->modify("last day of previous month"); //getting the last day of previous month
            $department = $_SESSION["CteacherDept"] . " Engineering"; //Getting the department of class teacher
            //Adding all the variable into the specified position below
            $attendanceTable = '<a class="btn btn-success" onclick="printDiv()">Print Attendance</a>
            <br>
            <div id="printable"  style="text-align:center;margin:0 10px;">
            <div class="center">
            <b>
            <p class="mb-0">Govt. Polytechnic Hamirpur
            </p>
            <p class="mb-0">Attendance record upto ' . $date->format("Y-m-d") . ' (' . $sem . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sem <span class="text-capitalize">' . $department . '</span> ) 
            </p>
            </b>
            </div>
            <div class="table-responsive" >
            <table class="display compact" id="dataTable" width="100%" border="1">
                <thead>
                <tr>
                <th colspan="2" rowspan="3">Group 1</th>
                <th colspan="' . $theorySpan . '">Theory</th>
                <th colspan="' . $practicalSpan . '">Practical</th>
                </tr>
                <tr>
                ' . $theoryTH . '
                <th rowspan="2">Total</th>
                <th rowspan="3">%age</th>
                ' . $practicalTH . '
                <th rowspan="2">Total</th>
                <th rowspan="3">%age</th>
                </tr>
                    <tr>
                        ' . $theorySubject . '
                        ' . $practicalSubject . '
                        
                    </tr>
                    <tr>
                    <th>Student Name</th>
                    <th>SBRN</th>
                    ' . $theoryTotalTH . '
                    <th>' . $theoryTotal . '</th>
                    ' . $practicalTotalTH . '
                    <th>' . $practicalTotal . '</th>
                    </tr>
                </thead>
                <tbody>
                ' . $attendance . '
                </tbody>
                </table>
                </div>
                <div class="page-break"></div>';
            echo $attendanceTable;


            /* For Second Group*/

            $totalRowsQuery = mysqli_query($conn, "SELECT COUNT(*) AS TotalRows FROM $tableName"); //Getting the row count from the attendance table
            $totalRow = mysqli_fetch_assoc($totalRowsQuery);
            $total = $totalRow['TotalRows']; //Total rows in table
            $secondGroupCount = $total - $divide; //Getting students count in Group B
            $theorySubject = ""; //stores the name of theory subjects
            $practicalSubject = ""; //stores the name of practical subjects
            $theoryCount = 0; //count of theory subjects
            $practicalCount = 0; //count of practical subjects
            $theoryTH = ""; //Individual theory subjects count as table heading (1   2   3)
            $practicalTH = ""; //Individual practical subjects count as table heading (1   2   3)
            $theoryTotalTH = ""; //stores new tH for each Theory subject's max classes taken
            $practicalTotalTH = ""; //stores new tH for each Practical subject's max classes taken
            $theoryTotal = 0; //Total count of th classes taken in theory of all subjects
            $practicalTotal = 0; //Total count of th classes taken in practical of all subjects
            $theoryTotalArray = array(); //Array which stores element with subject column=max classes of Theory classes
            $practicalTotalArray = array(); //Array which stores element with subject column=max classes of Theory classes
            $subjectColumnResult = mysqli_query($conn, "SELECT * FROM $tableName");
            while ($fieldinfo = mysqli_fetch_field($subjectColumnResult)) {
                //fetching the column names from the table
                //Query to check whether there is any vacant cell in the attendance table
                $CheckColumnNullQuery = mysqli_query($conn, "SELECT * FROM $tableName WHERE $fieldinfo->name IS NULL OR $fieldinfo->name = ''");

                if (mysqli_num_rows($CheckColumnNullQuery) == 0) {
                    //Executed if there is no students whose attendance data is not added
                    //explode() is used to divide the string into array to get the subject_id from the column name because column is concatenated with s (as the column name can't start from number in MySQL)
                    $subjectId = explode("s", $fieldinfo->name);
                    //getting data from the subject table about the specific subject using id
                    if ($subjectIdResult = mysqli_query($conn, "SELECT * FROM `subject` WHERE `subject_id`='$subjectId[1]'")) {
                        $subjectRow = mysqli_fetch_assoc($subjectIdResult);
                        if (isset($subjectRow['type']) && $subjectRow['type'] == "theory") {
                            //Executes if the subject type is "Theory"
                            $theoryCount = $theoryCount + 1; //incrementing the count by 1 every time there is a theory subject
                            $theorySubject .= "<th>" . $subjectRow['subject_name'] . " (T)</th>"; //adding the new theory subject name into existing row
                            $theoryTH .= "<th>" . $theoryCount . " </th>"; //Adds data to table heading as 1 2 3 for 3 theory subject
                            //Query to get the largest total classes of the theory subject for the Group A
                            if ($query = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING($fieldinfo->name, 1, 3) AS UNSIGNED)) AS max FROM $tableName WHERE student_id > $lastStudentId ORDER BY student_id")) {
                                $row = mysqli_fetch_assoc($query);
                                $theoryTotalTH .= '<th>' . $row['max'] . '</th>'; //Adds new tH for each subject's max classes taken
                                $theoryTotal = $theoryTotal + $row['max']; //Total count of th classes taken in theory of all subjects
                                $theoryTotalArray[$fieldinfo->name] = $row['max']; //Appends element with subject column=max classes
                            }
                        } else if (isset($subjectRow['type']) && $subjectRow['type'] == "practical") {
                            //Executes if the subject type is "Practical"
                            $practicalCount = $practicalCount + 1; //incrementing the count by 1 every time there is a practical subject
                            $practicalSubject .= "<th>" . $subjectRow['subject_name'] . " (P)</th>"; //adding the new practical subject name into existing row
                            $practicalTH .= "<th>" . $practicalCount . " </th>"; //Adds data to table heading as 1 2 3 for 3 practical subject
                            //Query to get the largest total classes of the practical subject for the Group A
                            if ($query = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING($fieldinfo->name, 1, 3) AS UNSIGNED)) AS max FROM $tableName WHERE student_id > $lastStudentId ORDER BY student_id")) {
                                $row = mysqli_fetch_assoc($query);
                                $practicalTotalTH .= '<th>' . $row['max'] . '</th>'; //Adds new tH for each subject's max classes taken
                                $practicalTotal = $practicalTotal + $row['max']; //Total count of th classes taken in theory of all subjects
                                $practicalTotalArray[$fieldinfo->name] = $row['max']; //Appends element with subject column=max classes
                            }
                        }
                    }
                } else {
                    //Executed if there is student(s) whose attendance data is not added
                    //explode() is used to divide the string into array to get the subject_id from the column name because column is concatenated with s (as the column name can't start from number in MySQL)
                    $subjectId = explode("s", $fieldinfo->name);
                    //getting data from the subject table about the specific subject using id
                    $subjectIdResult = mysqli_query($conn, "SELECT * FROM `subject` WHERE `subject_id`='$subjectId[1]'");
                    //fetching data from the table as associative array
                    $subjectRow = mysqli_fetch_assoc($subjectIdResult);
                    //storing the subject name into the  nullSubjects variable
                    $nullSubjects .= " <br>" . $subjectRow['subject_name'] . " (" . $subjectRow['type'] . ")";
                    //increments the IfNull count by 1 every time a subject column in attendance table have some null value
                    $ifNull = $ifNull + 1;
                }
            }


            $attendance = ""; //Variable for storing the attendance table <tbody> data
            //Query to get the student name and sbrn and attendance of every subject using inner Joining the tables on student_id only for second group
            $attendanceResult = mysqli_query($conn, "SELECT * FROM $tableName INNER JOIN student ON $tableName.student_id = student.student_id ORDER BY $tableName.student_id LIMIT $divide,$secondGroupCount");
            while ($attendanceRow = mysqli_fetch_assoc($attendanceResult)) {
                //
                $attendanceTheory = ""; //Stores TD cells of evry student of Theory subjects
                $attendancePractical = ""; //Stores TD cells of evry student of practical subjects
                $attendanceTheoryTD = ""; //attended classes of the Theory subject into TD
                $attendancePracticalTD = ""; //attended classes of the Practical subject into TD
                $attendanceTheoryTotal = 0; //Total classes taken of one student in theory subjects
                $attendancePracticalTotal = 0; //Total classes taken of one student in practical subjects
                $attendanceTheoryAttendedTotal = 0; //Total classes attended of one student in theory subjects
                $attendancePracticalAttendedTotal = 0; //Total classes sttended of one student in practical subjects
                //Appending the data to attendance table body eg. student name and student sbrn
                $attendance .= "<tr><td>" . $attendanceRow['student_name'] . "</td><td>" . $attendanceRow['sbrn'] . "</td>";
                $subjectColumnResult = mysqli_query($conn, "SELECT * FROM $tableName");
                while ($fieldinfo = mysqli_fetch_field($subjectColumnResult)) {
                    $subjectId = explode("s", $fieldinfo->name); //Extracting the id from column Name
                    //Query to get subject data
                    if ($subjectIdResult = mysqli_query($conn, "SELECT * FROM `subject` WHERE `subject_id`='$subjectId[1]'")) {

                        $subjectRow = mysqli_fetch_assoc($subjectIdResult);
                        if (isset($subjectRow['type']) && $subjectRow['type'] == "theory") {
                            //Executes if the subject type is "Theory"
                            $subjectAttendanceArray = explode("/", $attendanceRow[$fieldinfo->name]); //spliting the total classes and attended classes
                            if ($theoryTotalArray[$fieldinfo->name] == $subjectAttendanceArray[0]) {
                                //Executes if the total classes in $theoryTotalArray is equal to $subjectAttendanceArray[0]
                                $attendanceTheoryTD = "<td>" . $subjectAttendanceArray[1] . "</td>"; //creates attended classes of the subject into  TD
                                $attendanceTheoryAttendedTotal = $attendanceTheoryAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the theory subjects
                                $attendanceTheoryTotal = $attendanceTheoryTotal + $subjectAttendanceArray[0]; //Total taken classes of the theory subjects
                            } else {
                                //Executes if the total classes in $theoryTotalArray is not equal to $subjectAttendanceArray[0]
                                $attendanceTheoryTD = "<td>" . $attendanceRow[$fieldinfo->name] . "</td>";
                                $attendanceTheoryAttendedTotal = $attendanceTheoryAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the theory subjects
                                $attendanceTheoryTotal = $attendanceTheoryTotal + $subjectAttendanceArray[0]; //Total taken classes of the theory subjects
                            }
                            $attendanceTheory .= $attendanceTheoryTD; //adds attendance TD to attendanceTheory
                        } else if (isset($subjectRow['type']) && $subjectRow['type'] == "practical") {
                            //Executes if the subject type is "Practical"
                            $subjectAttendanceArray = explode("/", $attendanceRow[$fieldinfo->name]); //spliting the total classes and attended classes
                            if ($practicalTotalArray[$fieldinfo->name] == $subjectAttendanceArray[0]) {
                                //Executes if the total classes in $practicalTotalArray is equal to $subjectAttendanceArray[0]
                                $attendancePracticalTD = "<td>" . $subjectAttendanceArray[1] . "</td>"; //creates attended classes of the subject into  TD
                                $attendancePracticalAttendedTotal = $attendancePracticalAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the practical subjects
                                $attendancePracticalTotal = $attendancePracticalTotal + $subjectAttendanceArray[0]; //Total taken classes of the practical subjects
                            } else {
                                //Executes if the total classes in $practicalTotalArray is equal to $subjectAttendanceArray[0]
                                $attendancePracticalTD = "<td>" . $attendanceRow[$fieldinfo->name] . "</td>"; //creates full data of the subject into  TD
                                $attendancePracticalAttendedTotal = $attendancePracticalAttendedTotal + $subjectAttendanceArray[1]; //Total attended classes of the practical subjects
                                $attendancePracticalTotal = $attendancePracticalTotal + $subjectAttendanceArray[0]; //Total taken classes of the practical subjects
                            }
                            $attendancePractical .= $attendancePracticalTD; //adds attendance TD to attendancePractical
                        }
                    }
                }
                $TheoryPercentage = round(($attendanceTheoryAttendedTotal / $attendanceTheoryTotal) * 100, 2); //Getting the theory percentage and rounding off it to two decimal points of individual student
                $PracticalPercentage = round(($attendancePracticalAttendedTotal / $attendancePracticalTotal) * 100, 2); //Getting the practical percentage and rounding off it to two decimal points of individual student
                $attendance .= $attendanceTheory; //adds the Theory attendance cells to the attendance table body variable
                $attendance .= "<td>" . $attendanceTheoryAttendedTotal . "</td>"; //adds the Total Theory classes attended by student into  cells tof attendance table body variable
                if ($TheoryPercentage < 75) {
                    $attendance .= "<td class='low'><b>" . $TheoryPercentage . "</b></td>"; //adding the low class to td if percentage<75% and adds it to attendance variable
                } else {
                    $attendance .= "<td><b>" . $TheoryPercentage . "</b></td>";
                }

                $attendance .= $attendancePractical; //adds the practical attendance cells to the attendance table body variable
                $attendance .= "<td>" . $attendancePracticalAttendedTotal . "</td>"; //adds the Total practical classes attended by student into  cells tof attendance table body variable
                if ($PracticalPercentage < 75) {
                    $attendance .= "<td class='low'><b>" . $PracticalPercentage . "</b></td></tr>"; //adding the low class to td if percentage<75% and adds it to attendance variable
                } else {
                    $attendance .= "<td><b>" . $PracticalPercentage . "</b></td></tr>";
                }
            }


            $theorySpan = $theoryCount + 2; //colspan for "Theory" in the table heading
            $practicalSpan = $practicalCount + 2; //colspan for "Practical" in the table heading

            $attendanceTable = '
            <br>
            <div class="table-responsive">
            <table class="display compact" id="dataTable" width="100%" border="1">
                <thead>
                <tr>
                <th colspan="2" rowspan="3">Group 2</th>
                <th colspan="' . $theorySpan . '">Theory</th>
                <th colspan="' . $practicalSpan . '">Practical</th>
                </tr>
                <tr>
                ' . $theoryTH . '
                <th rowspan="2">Total</th>
                <th rowspan="3">%age</th>
                ' . $practicalTH . '
                <th rowspan="2">Total</th>
                <th rowspan="3">%age</th>
                </tr>
                    <tr>
                        ' . $theorySubject . '
                        ' . $practicalSubject . '
                        
                    </tr>
                    <tr>
                    <th>Student Name</th>
                    <th>SBRN</th>
                    ' . $theoryTotalTH . '
                    <th>' . $theoryTotal . '</th>
                    ' . $practicalTotalTH . '
                    <th>' . $practicalTotal . '</th>
                    </tr>
                </thead>
                <tbody>
                ' . $attendance . '
                </tbody>
                </table>
                </div>
                <div style="text-align:left">
                <p>Endst.no.GPH/Attendance Position/' . $sem . '&nbsp;&nbsp;&nbsp;&nbsp; semester ' . $_SESSION["CteacherDept"] . ' Engg./</p>
                <div style="display:flex;justify-content:space-between;font-size: 0.9em;align-items: flex-end;">
                    <div>
                        <div>
                            <p>Copy to: </p>
                            <p>1 <span style="margin-left:10px;">HOD ' . $_SESSION["CteacherDept"] . ' Engg.</span></p>
                            <p>2 <span style="margin-left:10px;">Class Incharge</span></p>
                            <p>3 <span style="margin-left:10px;">Student Clerk</span></p>
                            <p>4 <span style="margin-left:10px;">Notice Board</span></p>
                        </div>
                    </div>
                    <div>
                    <p>Prepared By</p>
                    </div>
                    <div>
                    <p style="text-align:center;"><span>HOD<span><br>' . $_SESSION["CteacherDept"] . ' Engg.</p>
                    </div>
                </div>
                </div>
                </div>';
            echo $attendanceTable;
        } else {
            //Executes if there are nullSubjects
            echo '<br><div class="alert alert-danger" role="alert">
            The attendance of some students are not Added by teachers<br><b>Please ask the teachers of these subjects ' . $nullSubjects . '.</b>
        </div>';
        }
    } else {
        //Executes if attendance table does not exist
        echo '<br><div class="alert alert-danger" role="alert">
            There is no attendance table for this sem. <br><b>Please ask the admin to first create the table.</b>
        </div>';
    }
}