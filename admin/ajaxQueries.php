<?php
// Include the database config file 
require "db.php";

if (isset($_REQUEST['sem']) && isset($_REQUEST['scheme'])) {
    $op1 = $_REQUEST['sem'];
    $op2 = $_REQUEST['scheme'];
    /*Creating an String to store data*/
    $arr = '';
    /*Query to Select subject data from the `subject` table when the condition is true*/
    $query = "SELECT * FROM `subject` WHERE `sem`='$op1' AND `scheme`='$op2' ORDER BY subject_name ASC";
    $result = mysqli_query($conn, $query);
    /*Checking if there is any data or not*/
    if (mysqli_num_rows($result) > 0) {
        /*Fetching the data from the associative array until the last row is reached*/
        while ($row = mysqli_fetch_assoc($result)) {
            /*concatenating the new row to the previous string in the arr string*/
            $arr .= '<div><input type="checkbox" name="subject[]" value="' . $row['subject_id'] . '" checked>' . $row['subject_name'] . ' (' . $row['type'] . ' )</div>';
        }
    } else {
        /*Executes if the result rows are less than 1*/
        $arr = '<div><p>Subject<br>No subjects found</p>';
    }
    /*Returning the data as string to the calling Ajax page ""(dbTables.php)""*/
    echo ($arr);
}
