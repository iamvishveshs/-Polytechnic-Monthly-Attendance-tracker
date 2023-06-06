<?php
require("check.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly attendence mangement - Approve Request Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        .wrap-login100 {
            width: auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            padding: 77px 55px 33px 55px;

            box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 5px 10px 0px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">


                <?php
                /*Adding new subject*/
                if (isset($_REQUEST['addSubject'])) {
                    $subjectName = mysqli_real_escape_string($conn, $_REQUEST['sname']);
                    $scheme = mysqli_real_escape_string($conn, $_REQUEST['scheme']);
                    $type = mysqli_real_escape_string($conn, $_REQUEST['type']);
                    $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);
                    /* Inserting new subject data to `subject` table*/
                    $subjectQuery = "INSERT INTO `subject`(`subject_name`, `scheme`, `type`, `sem`) VALUES ('$subjectName','$scheme','$type','$sem')";
                    /* Executing Query*/
                    if ($result = mysqli_query($conn, $subjectQuery)) {
                        /*Executes When data is submitted successfully*/
                        echo "<div class='text-center'><h6><span class='text-success'>SUCCESS: </span>" . $subjectName . " subject Added.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./subjects.php'> Go back</a></div></div><b> </b>";
                    } else {
                        /*Executes When data is not submitted and there is either some syntax error in query or database connection error*/
                        echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span>" . $subjectName . " subject not Added.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./subjects.php'> Go back</a></div></div><b> </b>";
                    }
                } else if (isset($_REQUEST['assignTeacher'])) {
                    /*Assigning subject to teacher */
                    $subjectId = mysqli_real_escape_string($conn, $_REQUEST['subject']);
                    $teacherId = mysqli_real_escape_string($conn, $_REQUEST['teacher']);
                    /*Query to assign subject to teacher*/
                    $assignQuery = "INSERT INTO `assigned_teacher`(`subject_id`, `teacher_id`) VALUES ('$subjectId','$teacherId')";
                    if ($result = mysqli_query($conn, $assignQuery)) {
                        /*Executes When Subject is assigned to teacher successfully and redirects to `assigned.php` page*/
                        header("Location:./assigned.php?alert=Subject assigned successfully");
                    } else {
                        /*Executes When subject is not assigned to teacher and shows error on the same page*/
                        echo "<div class='text-center'><h6><span class='text-danger'>Error: </span>Subject not assigned to the teacher. please try after some time.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./assigned.php'> Go back</a></div></div>";
                    }
                } else if (isset($_REQUEST['deleteSubId'])) {
                    /*Un-Assigning subject from teacher */
                    $deleteSubId = mysqli_real_escape_string($conn, $_REQUEST['deleteSubId']);
                    /*Query to un-assign subject from teachers*/
                    $deleteAssignQuery = "DELETE FROM `assigned_teacher` WHERE `subject_id`='$deleteSubId'";
                    if ($result = mysqli_query($conn, $deleteAssignQuery)) {
                        /*Executes When Subject is un-assigned from teacher successfully and redirects to `assigned.php` page*/
                        header("Location:./assigned.php?alert=Subject Un-assigned successfully");
                    } else {
                        /*Executes When subject is not un-assigned from teacher and shows error on the same page*/
                        echo "<div class='text-center'><h6><span class='text-danger'>Error: </span> Subject not un assigned from the teacher. please try after some time.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./assigned.php'> Go back</a></div></div>";
                    }
                } else if (isset($_REQUEST['addStudent'])) {
                    /*Adding Student*/
                    $studentName = mysqli_real_escape_string($conn, $_REQUEST['sname']);
                    $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);
                    $sbrn = mysqli_real_escape_string($conn, $_REQUEST['sbrn']);
                    $fatherName = mysqli_real_escape_string($conn, $_REQUEST['father_name']);
                    $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
                    /*Query to insert data of new student into the student table*/
                    $studentQuery = "INSERT INTO `student`(`student_name`, `sem`, `sbrn`, `father_name`, `address`) VALUES ('$studentName','$sem','$sbrn','$fatherName','$address')";
                    /*Query to check the duplicacy of the students using SBRN*/
                    $checkDataQuery = mysqli_query($conn, "SELECT * FROM `student` WHERE sbrn='$sbrn'");
                    if (mysqli_num_rows($checkDataQuery) > 0) {
                        /*Checks if student already exists if yes the shows error*/
                        echo "<div class='text-center'><h6><span class='text-danger'>ERROR:</span>Student Already exixts.<br>SBRN exists.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./student.php'> Click to go back</a></div></div>";
                    } else if ($result = mysqli_query($conn, $studentQuery)) {
                        /*Executes When student added successfully and redirects to `student.php` page*/

                        $tableName = "attendance" . $sem . "thsem";
                        $result = mysqli_query($conn, "SHOW TABLES LIKE '" . $tableName . "'");
                        $tableExist = mysqli_num_rows($result) > 0;
                        /*Checking if the table exists*/
                        if ($tableExist) {
                            $studentIdQuery = mysqli_query($conn, "SELECT * FROM student WHERE sbrn='$sbrn'");
                            $studentIdRow = mysqli_fetch_assoc($studentIdQuery);
                            $studentId = $studentIdRow['student_id'];

                            if (mysqli_query($conn, "INSERT INTO `$tableName`(`student_id`) VALUES ('$studentId')")) {
                                header("Location:./student.php?alert=Student Added successfully");
                            } else {
                                echo "<div class='text-center'><h6><span class='text-danger'>Error: </span> Student is not added to attendance table. please try after some time.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./addStudent.php'> Go back</a></div></div>";
                            }
                        } else {
                            header("Location:./student.php?alert=Student Added successfully");
                        }
                    } else {
                        /*Executes When student is not added and shows error on same page*/
                        echo "<div class='text-center'><h6><span class='text-danger'>Error: </span> Student is not added. please try after some time.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./addStudent.php'> Go back</a></div></div>";
                    }
                } else if (isset($_REQUEST['addTeacher'])) {
                    /*Adding Teacher*/
                    $teacherName = mysqli_real_escape_string($conn, $_REQUEST['name']);
                    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
                    $password = md5(mysqli_real_escape_string($conn, $_REQUEST['password']));
                    $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
                    $designation = mysqli_real_escape_string($conn, $_REQUEST['designation']);
                    $department = mysqli_real_escape_string($conn, $_REQUEST['department']);
                    $role = "teacher";

                    /*Query to check the duplicacy of the teachers using email and phone number*/
                    $checkDataQuery = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email' OR phone_number='$phone'");
                    if (mysqli_num_rows($checkDataQuery) > 0) {
                        /*Checks if teacher already exists if yes the shows error*/
                        echo "<div class='text-center'><h6><span class='text-danger'>ERROR:</span>Teacher Already exixts.<br>Either Phone Number or email Id exists.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./teacher.php'> Click to go back</a></div></div>";
                    } /*Query to insert new teacher into the user table*/ else if ($result = mysqli_query($conn, "INSERT INTO `user`(`name`, `email`, `password`, `role`, `phone_number`, `designation`, `department`) VALUES ('$teacherName','$email','$password','$role','$phone','$designation','$department')")) {
                        /*Executes When teacher added successfully and redirects to `teacher.php` page*/
                        header("Location:./teacher.php?alert=".$teacherName." Added as Teacher .");
                        } else {
                        /*Executes When teacher is not added and shows error on same page*/
                        echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span>Unable to add new teacher</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./teacher.php'> Click to go back</a></div></div>";
                    }
                } else if (isset($_REQUEST['appointClassTeacher'])) {
                    /*Appointing class teacher*/
                    $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);
                    $teacherId = mysqli_real_escape_string($conn, $_REQUEST['teacher']);
                    /*Query to update the role of specific teacher to Class teacher in `user` table*/
                    $userTableQuery = "UPDATE `user` SET `role`='classTeacher' WHERE `id`='" . $teacherId . "'";
                    if ($userTableResult = mysqli_query($conn, $userTableQuery)) {
                        /*Query to insert the ID of teacher which is appointed as class teacher in the `class_teacher` at row where sem is matching*/
                        $ClassTeacherTableQuery = "UPDATE `class_teacher` SET `teacher_id`='" . $teacherId . "' WHERE `sem`='" . $sem . "'";
                        if ($ClassTeacherTableResult = mysqli_query($conn, $ClassTeacherTableQuery)) {
                            /*Redirects to `classTeacher.php` When teacher is successfully appointed as class teacher*/
                            header("Location:./classTeacher.php?alert=class teacher is appointed to " . $sem . " sem.</b>");
                        } else {
                            /*Revert the changes made if there is any error in the query execution*/
                            $revertUserTableQuery = "UPDATE `user` SET `role`='teacher' WHERE `id`='" . $teacherId . "'";
                            mysqli_query($conn, $revertUserTableQuery);
                            echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span>Class Teacher is not assigned. please try after some time.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./classTeacher.php'> Click to go back</a></div></div>";
                        }
                    } else {
                        /*Showing error if query to update the role in  the user table is not executed*/
                        echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span> Class Teacher is not assigned. please try after some time.</b></h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./classTeacher.php'> Click to go back</a></div></div>";
                    }
                } else if (isset($_REQUEST['deleteCteacher'])) {
                    $teacherId = mysqli_real_escape_string($conn, $_REQUEST['deleteCteacherId']);
                    $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);
                    /*Query to Update the role of Class teacher to teacher  in `user` table*/
                    $userTableQuery = "UPDATE `user` SET `role`='teacher' WHERE `id`='" . $teacherId . "'";
                    if ($userTableResult = mysqli_query($conn, $userTableQuery)) {
                        /*Query to Update the ID of Class teacher to NULL  in `class_teacher` table*/
                        $ClassTeacherTableQuery = "UPDATE `class_teacher` SET `teacher_id`=NULL WHERE `sem`='" . $sem . "'";
                        if ($ClassTeacherTableResult = mysqli_query($conn, $ClassTeacherTableQuery)) {
                            header("Location:./classTeacher.php?alert=class teacher is Un appointed from " . $sem . " sem.</b>");
                        } else {
                            /*Query to Revert the changes made (i.e. Re updating the roles to class Teacher in `user` table) if there is any error in the query execution*/
                            $revertUserTableQuery = "UPDATE `user` SET `role`='classTeacher' WHERE `id`='" . $teacherId . "'";
                            mysqli_query($conn, $revertUserTableQuery);
                            echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span>Unable to Un-assign Class Teacher. please try after some time.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./classTeacher.php'> Click to go back</a></div></div>";
                        }
                    } else {
                        /*Showing error if query to update the role in  the user table is not executed*/
                        echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span>Unable to Un-assign Class Teacher. please try after some time.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./classTeacher.php'> Click to go back</a></div></div>";
                    }
                } else {
                    /*if none of above conditions is True then the it will redirect to homepage*/
                    header("Location:./");
                }
                ?>
            </div>
        </div>
    </div>
</body>
<!--Preventing the page refresh because that can lead to data duplication the database-->
<!--<script type="text/javascript">
    window.onbeforeunload = function() {
        return "you can't refresh this webpage";
    }
</script>
-->

</html>
?>