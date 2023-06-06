<?php
require("check.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
/*Checking if data is sent or not*/
if(empty($_REQUEST['createTable']) && empty($_REQUEST['subject']))
{
    echo "<b>ERROR:</b>Table Not created (Subjects are not selected.)<br><a href='./dbTables.php'> Click to go back</a>";
}
else if(isset($_REQUEST['createTable']) && isset($_REQUEST['subject']))
{
    /*craeting the attendance table name*/
    $tableName="Attendance".$_REQUEST['sem']."thSem";
    $subjectArray=$_REQUEST['subject'];
    /*Getting the size of the subject array*/
    $subjectArrayLength=sizeof($subjectArray);
    /*Creating the commalength according to the subjects to be used while generating table query*/
    $commaLength=$subjectArrayLength-1;
    $i=0;
    /*creating the attendance table query*/
    $query = 'CREATE TABLE '.$tableName.' ( student_id int, ';
    for($i=0;$i<$subjectArrayLength;$i=$i+1)
    {
        if($i==$commaLength)
        {
            /*appending s with the column name because column name can't start with number*/
            $query .= 's'.$subjectArray[$i].' varchar(255)'; 
        }
        else
        {
            /*appending s with the column name because column name can't start with number*/
            $query .= 's'.$subjectArray[$i].' varchar(255),'; 
        }
         
    }
    $query .= ',PRIMARY KEY (student_id) ); ';
    /*Query to check whether the table name exists*/
    $result = mysqli_query($conn,"SHOW TABLES LIKE '".$tableName."'");
    $tableExist = mysqli_num_rows($result) > 0;
    /*Checking if the table exists*/
    if($tableExist)
    {
        echo "<b>NOTICE:</b>Table Exists with name ".$tableName.". <br><a href='./dbTables.php'> Click to go back</a>";
    }/*if the table doesn't exists*/
    else
    {   
        /*Executing table creation query*/
        $result=mysqli_query($conn,$query);
        if($result)
        {
            /*Query to select data about the students of that semester*/
            $sql_query  =  "select * from student WHERE sem='".$_REQUEST['sem']."'";
            if($selectResult=mysqli_query($conn,$sql_query))
            {
                while($row=mysqli_fetch_assoc($selectResult))
                {
                    /*Inserting student ids into the attendance table*/
                   $insert_query  =  "INSERT INTO ".$tableName." (student_id) VALUES (".$row['student_id'].")";
                   $insertResult=mysqli_query($conn,$insert_query);
                }
            } 

            echo "<b>SUCCESS:</b>table created with name ".$tableName.".<br><a href='./dbTables.php'> Click to go back</a>";
        }
        else
        {
            echo "<b>ERROR:</b>Table Not created<br><a href='./dbTables.php'> Click to go back</a>";
            
        }
    }
}
