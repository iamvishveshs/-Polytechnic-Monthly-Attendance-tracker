<?php
require("check.php");
/*Deleting request*/
if (isset($_REQUEST['name']) && $_REQUEST['name'] == "deleteRequest") {
    $id = $_REQUEST['id'];
    if (mysqli_query($conn, "DELETE FROM `request` WHERE `id`='$id'")) {
        header("Location:./requests.php?alert=Request Deleted.");
    } else {
        echo "<p><b>ERROR: </b>Error occured while deleting Request.<br> Please try again after some time.</p><br><a href='./requests.php'> Click to go back</a>";
    }
} else if ($_REQUEST["deleteSubject"]) {
    /*Deleting subject*/
    $id = $_REQUEST['id'];
    $assignedQuery = "DELETE FROM `assigned_teacher` WHERE `subject_id`='$id'";
    if ($stepresult = mysqli_query($conn, $assignedQuery)) {
        if (mysqli_query($conn, "DELETE FROM `subject` WHERE `subject_id`='$id'")) {
            header("Location:./subjects.php?alert=Subject Deleted.");
        } else {
            echo "<p><b>ERROR: </b>Error occured while deleting subject.<br> Please try again after some time.</p><br><a href='./subjects.php'> Click to go back</a>";
        }
    } else {
        echo "<p><b>ERROR: </b>Error occured while deleting subject.<br> Please try again after some time.</p><br><a href='./subjects.php'> Click to go back</a>";

    }
} else if (isset($_REQUEST['UpdateStudent'])) {
    /*Updating Student Data*/
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $studentName = mysqli_real_escape_string($conn, $_REQUEST['sname']);
    $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);
    $sbrn = mysqli_real_escape_string($conn, $_REQUEST['sbrn']);
    $fatherName = mysqli_real_escape_string($conn, $_REQUEST['father_name']);
    $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
    $studentQuery = "UPDATE `student` SET `student_name`='$studentName',`sem`='$sem',`sbrn`='$sbrn',`father_name`='$fatherName',`address`='$address' WHERE `student_id`='$id'";
    if ($result = mysqli_query($conn, $studentQuery)) {
        header("Location:./student.php?alert=Student Data Updated.");
    } else {
        echo "<b>Error: error while uploading Student Data . please try after some time.</b>";
        echo "<a href='./student.php'>Click here to go to Student page</a>";
    }
} else if (isset($_REQUEST['deleteStudent'])) {
    /*Deleting student*/
    $id = $_REQUEST['id'];
    if (mysqli_query($conn, "DELETE FROM `student` WHERE `student_id`='$id'")) {
        header("Location:./student.php?alert=Student Data Deleted.");
    } else {
        echo "<p><b>ERROR: </b>Error occured while deleting student.<br> Please try again after some time.</p><br><a href='./student.php'> Click to go back</a>";
    }
} else if (isset($_REQUEST['deleteTable'])) {
    /*Deleting attendance table*/
    $TableName = $_REQUEST['TableName'];
    if (mysqli_query($conn, "DROP TABLE $TableName")) {
        header("Location:./attendanceTables.php?alert=Table Deleted");
    } else {
        echo "<p><b>ERROR: </b>Error occured while deleting Table.<br> Please try again after some time.</p><br><a href='./attendanceTables.php'> Click to go back</a>";
    }
} else if (isset($_REQUEST['UpdateTeacher'])) {
    /*Updating Teacher Data*/
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
    $designation = mysqli_real_escape_string($conn, $_REQUEST['designation']);
    $department = mysqli_real_escape_string($conn, $_REQUEST['department']);
    $teacherQuery = "UPDATE `user` SET `name`='$name',`email`='$email',`phone_number`='$phone',`designation`='$designation',`department`='$department' WHERE `id`='$id'";
    if ($result = mysqli_query($conn, $teacherQuery)) {
        header("Location:./teacher.php?alert=Teacher Data Updated");
    } else {
        echo "<b>Error: error while uploading teacher Data . please try after some time.</b>";
        echo "<a href='./teacher.php'>Click here to go to teacher page</a>";
    }
} else if (isset($_REQUEST['deleteTeacher'])) {
    /*Deleting Teacher Data*/
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $teacherQuery = "DELETE FROM `user` WHERE `id`='$id'";
    $assignedQuery = "DELETE FROM `assigned_teacher` WHERE `teacher_id`='$id'";
    $classTeacherQuery = "UPDATE `class_teacher` SET `teacher_id`=NULL WHERE `teacher_id`='$id'";
    if (mysqli_query($conn, $classTeacherQuery)) {
        if ($stepresult = mysqli_query($conn, $assignedQuery)) {
            if ($result = mysqli_query($conn, $teacherQuery)) {
                header("Location:./teacher.php?alert=Teacher Data Deleted");
            } else {
                echo "<b>Error: error while deleting teacher. please try after some time.</b>";
                echo "<a href='./teacher.php'>Click here to go to teacher page</a>";
            }
        } else {
            echo "<b>Error: error while deleting teacher from assigned subjects. please try after some time.</b>";
            echo "<a href='./teacher.php'>Click here to go to teacher page</a>";
        }
    }
    else
    {
        echo "<b>Error: error while deleting teacher from class teacher. please try after some time.</b>";
        echo "<a href='./teacher.php'>Click here to go to teacher page</a>";
    }
} else if (isset($_REQUEST['updateSubject'])) {
    /*Updating subject Data*/
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $scheme = mysqli_real_escape_string($conn, $_REQUEST['scheme']);
    $type = mysqli_real_escape_string($conn, $_REQUEST['type']);
    $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);
    $subjectQuery = "UPDATE `subject` SET `subject_name`='$name',`scheme`='$scheme',`type`='$type',`sem`='$sem' WHERE `subject_id`='$id'";
    if ($result = mysqli_query($conn, $subjectQuery)) {
        header("Location:./subjects.php?alert=Subject Data Updated.");
    } else {
        echo "<b>Error: error while updating subjects Data . please try after some time.</b>";
        echo "<a href='./subjects.php'>Click here to go to subjects page</a>";
    }
} else {
    header("Location:./");
}