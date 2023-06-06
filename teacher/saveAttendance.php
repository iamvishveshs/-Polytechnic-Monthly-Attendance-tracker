<?php
require("check.php");
/* Adding attendance the attendance */
if (isset($_REQUEST['addAttendance']) && isset($_REQUEST['sem']) && isset($_REQUEST['scheme']) && isset($_REQUEST['subject']) && isset($_REQUEST['studentId']) && isset($_REQUEST['totalclasses']) && isset($_REQUEST['attendedclasses'])) {

    $tableName = "Attendance" . $_REQUEST['sem'] . "thSem";
    $subject = "s" . $_REQUEST['subject'];
    $student = $_REQUEST['studentId'];
    $studentArrayLength = sizeof($_REQUEST['studentId']);
    $totalClasses = $_REQUEST['totalclasses'];
    $attendedClasses = $_REQUEST['attendedclasses'];
    $i = 0;
    $result = 0;
    for ($i = 0; $i < $studentArrayLength; $i = $i + 1) {
        $Attendance = $totalClasses[$i] . "/" . $attendedClasses[$i];
        $query = "UPDATE `" . $tableName . "` SET `" . $subject . "`='" . $Attendance . "' WHERE `student_id`=" . $student[$i] . "";
        $result = mysqli_query($conn, $query);
    }
    if ($result == 1) {
        echo "<b>SUCCESS:</b>Attendance Saved in " . $tableName . " table.<br><a href='./addAttendance.php'> Click to go back</a>";
    } else {
        echo "some error occured";
    }
} else if (isset($_REQUEST['changeAttendance']) && isset($_REQUEST['sem']) && isset($_REQUEST['scheme']) && isset($_REQUEST['subject']) && isset($_REQUEST['studentId']) && isset($_REQUEST['totalclasses']) && isset($_REQUEST['attendedclasses'])) {
    /*Updating the attendance*/
    $tableName = "Attendance" . $_REQUEST['sem'] . "thSem";
    $subject = "s" . $_REQUEST['subject'];
    $student = $_REQUEST['studentId'];
    $studentArrayLength = sizeof($_REQUEST['studentId']);
    $totalClasses = $_REQUEST['totalclasses'];
    $attendedClasses = $_REQUEST['attendedclasses'];
    $i = 0;
    $result = 0;
    for ($i = 0; $i < $studentArrayLength; $i = $i + 1) {
        $Attendance = $totalClasses[$i] . "/" . $attendedClasses[$i];
        $query = "UPDATE `" . $tableName . "` SET `" . $subject . "`='" . $Attendance . "' WHERE `student_id`=" . $student[$i] . "";
        $result = mysqli_query($conn, $query);
    }
    if ($result == 1) {
        echo "<b>SUCCESS:</b>Attendance Saved in " . $tableName . " table.<br><a href='./getAttendance.php'> Click to go back</a>";
    } else {
        echo "some error occured";
    }
}
?>