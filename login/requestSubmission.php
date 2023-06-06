<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('db.php');

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$designation = $_POST['designation'];
$department = $_POST['department'];
$password = $_POST['password'];
$checkQuery = "SELECT * FROM `user` WHERE `email` = '$email' OR `phone_number` = '$phone'";
$result = mysqli_query($conn, $checkQuery);
$count = mysqli_num_rows($result);
$checkQuery2 = "SELECT * FROM `request` WHERE `email` = '$email' OR `phone_number` = '$phone'";
$result2 = mysqli_query($conn, $checkQuery2);
$count2 = mysqli_num_rows($result2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly attendence mangement - Submission Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
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
                if ($count == 1) {
                    echo "<div class='text-center'><h5>You have already Approved As Teacher.<br>
   <b>Status: </b><span class='text-success'>Approved</h5>";
                    echo "<div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2' href='../login'>login Now</a></div></div>";
                } else if ($count2 == 1) {
                    echo "<div class='text-center'><h5>You have already Submitted a request.<br><b>Status: </b><span class='text-danger'>Pending</span></h5>";
                    echo "<div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2' href='../'>Go to homepage</a></div></div>";

                } else {
                    if (mysqli_query($conn, "INSERT INTO `request`(`name`, `email`, `password`, `phone_number`, `designation`, `department`) VALUES ('$name','$email','$password','$phone','$designation','$department')")) {
                        echo "<div class='text-center'><h5 class='text-success'>Request Submitted.</h5>";
                        echo "<div class='d-flex justify-content-center align-items-center mt-3'><a class='btn btn-primary' href='../'>Go to homepage</a><div></div>";
                    } else {
                        echo "<div class='text-center'><h5 class='text-danger'>Unable to submit Request .</h5>";
                        echo "<div class='d-flex justify-content-center align-items-center mt-3'><a class='btn btn-primary' href='./request-credentials.php'>Submit again</a>div></div>";
                    }
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>