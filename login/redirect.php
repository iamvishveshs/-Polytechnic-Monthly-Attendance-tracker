<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_REQUEST['submittedRole']) && isset($_REQUEST['role'])) {
    if ($_REQUEST['role'] == "teacher") {
        header("Location:../teacher");
    } else if ($_REQUEST['role'] == "classTeacher") {
        $_SESSION["CteacherId"] = $_SESSION["teacherId"];
        $_SESSION["CteacherName"] = $_SESSION["teacherName"];
        $_SESSION["CteacherDept"] = $_SESSION["teacherDepartment"];
        unset($_SESSION['teacherId']);
        unset($_SESSION['teacherName']);
        unset($_SESSION['teacherDepartment']);
        header("Location:../classTeacher");
    }
}
?>