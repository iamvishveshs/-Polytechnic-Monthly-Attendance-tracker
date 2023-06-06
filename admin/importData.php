<?php
include('check.php');

require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




if(isset($_POST['importStudent']))
{
    $fileName = $_FILES['file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count =0;
        echo $count;
        foreach($data as $row)
        {
            if($count > 0)
            {
                $name = $row['0'];
                $sem = $row['1'];
                $sbrn = $row['2'];
                $father = $row['3'];
                $address = $row['4'];
                $checkdataQuery=mysqli_query($conn,"SELECT `student_id` FROM `student` WHERE `sbrn`='$sbrn'");
                if(mysqli_num_rows($checkdataQuery)>0)
                {
                    $studentQuery = "UPDATE `student` SET `student_name`='$name',`sem`='$sem',`father_name`='$father',`address`='$address' WHERE `sbrn`='$sbrn'";
                    $result = mysqli_query($conn, $studentQuery); 
                }
                else
                {
                    $studentQuery = "INSERT INTO `student`(`student_name`, `sem`, `sbrn`, `father_name`, `address`) VALUES ('$name','$sem','$sbrn','$father','$address')";
                    $result = mysqli_query($conn, $studentQuery); 
                }
                $msg = true;
            }
            else
            {
                $count =1;
            }
        }
        if(isset($msg))
        {
            header('Location: student.php?status=succ');
            exit(0);
        }
        else
        {
            header('Location: student.php?status=err');
            exit(0);
        }
    }
    else
    {
        header('Location: student.php?status=invalid_file');
        exit(0);
    }
}
else if(isset($_POST['importSubject']))
{
    $fileName = $_FILES['file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count =0;
        echo $count;
        foreach($data as $row)
        {
            if($count > 0)
            {
                $name = $row['0'];
                $scheme = $row['1'];
                $type = $row['2'];
                $sem = $row['3'];
                $checkdataQuery=mysqli_query($conn,"SELECT * FROM `subject` WHERE `subject_name`='$name' AND `scheme`='$scheme' AND `type`='$type' AND `sem`='$sem'");
                if(mysqli_num_rows($checkdataQuery)==0)
                {
                    $subjectQuery = "INSERT INTO `subject`(`subject_name`, `scheme`, `type`, `sem`) VALUES ('$name','$scheme','$type','$sem')";
                    $result = mysqli_query($conn, $subjectQuery); 
                }
                $msg = true;
            }
            else
            {
                $count =1;
            }
        }
        if(isset($msg))
        {
            header('Location: subjects.php?status=succ');
            exit(0);
        }
        else
        {
            header('Location: subjects.php?status=err');
            exit(0);
        }
    }
    else
    {
        header('Location: subjects.php?status=invalid_file');
        exit(0);
    }
}
?>