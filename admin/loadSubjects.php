<?php
// Include the database config file 
require "db.php";

if (isset($_REQUEST['sem']) && isset($_REQUEST['scheme'])) {
    $op1 = $_REQUEST['sem'];
    $op2 = $_REQUEST['scheme'];
    /*Creating an String to store data*/
    $arr = '<option value="">Select Subject</option>';
    /*Query to Select subject data from the `subject` table when the condition is true*/
    $query = "SELECT * FROM `subject` WHERE `sem`='$op1' AND `scheme`='$op2' ORDER BY subject_name ASC";
    $result = mysqli_query($conn, $query);
    /*Checking if there is any data or not*/
    if (mysqli_num_rows($result) > 0) {
        /*Fetching the data from the associative array until the last row is reached*/
        while ($row = mysqli_fetch_assoc($result)) {
            $subId = $row['subject_id'];
            /*Selecting data from the `assigned_teacher` Where the subject ID matches*/
            $subQuery = "SELECT * FROM `assigned_teacher` WHERE `subject_id`='$subId'";
            $subResult = mysqli_query($conn, $subQuery);
            /*Checking if there is single row of data or not*/
            if (mysqli_num_rows($subResult) < 1) {
                /*concatenating the new row to the previous string in the arr string*/
                $arr .= '<option value="' . $row['subject_id'] . '">' . $row['subject_name'] . ' (' . $row['type'] . ' )</option>';
            }
        }
    } else {
        /*Executes if the subject result rows are less than 1*/
        $arr = '<option value="">Subjects not available</option>';
    }
    /*Returning the data as string to the calling Ajax page (assignSubject.php)*/
    echo ($arr);
}