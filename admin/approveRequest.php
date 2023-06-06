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
    <title> Approve Request Page</title>
    <?php require("styles.php"); ?>
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
                /*Checks if id is sent to this page or not */
                if (isset($_REQUEST['id'])) {
                    $approvalId = $_REQUEST['id'];
                    /*Selecting Data corresponding to request id from request table*/
                    $requestQuery = "SELECT * FROM `request` WHERE `id`='$approvalId'";
                    $requestResult = mysqli_query($conn, $requestQuery);
                    /*Checking if the query results in any data or not*/
                    if (mysqli_num_rows($requestResult) > 0) {
                        $requestRow = mysqli_fetch_assoc($requestResult);
                        /*Fetching data of the requesting user which is to be approved*/

                        $name = $requestRow['name'];
                        $email = $requestRow['email'];
                        $password = md5($requestRow['password']);
                        $designation = $requestRow['designation'];
                        $phone = $requestRow['phone_number'];
                        $department = $requestRow['department'];
                        $role = "teacher";
                        /*Checking in the user table that if the user already exists or not */
                        $CheckDataResult = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email' OR phone_number='$phone'");
                        /*if the user data is present than the ERROR will be generated on same page*/
                        if (mysqli_num_rows($CheckDataResult) > 0) {
                            echo "<div class='text-center'><h6><span class='text-danger'>ERROR:</span>Teacher Already exixts.<br>Either Phone Number or email Id exists.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./requests.php'> Click to go back</a></div></div>";
                        } /*if the user data is not present than the else part will be executed*/else {
                            /*Query to insert data into the user table*/

                            $insertQuery = "INSERT INTO `user`(`name`, `email`, `password`, `role`, `phone_number`, `designation`, `department`) VALUES ('$name','$email','$password','$role','$phone','$designation','$department')";
                            if ($result = mysqli_query($conn, $insertQuery)) {
                                /*Query to delete the data from the `request` table*/
                                $deleteQuery = "DELETE FROM `request` WHERE `id`='$approvalId'";
                                if ($deleteResult = mysqli_query($conn, $deleteQuery)) {
                                    /*If the data is deleted than user is upgraded to teacher*/
                                    echo "<div class='text-center'><h6><span class='text-success'><b>" . $name . "</b> Approved as <b>" . $role . "</b> in <b>" . $department . " Engg.</b> as <b>" . $designation . "</b>.</h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./requests.php'> Click to go back</a></div></div>";
                                } else {
                                    /*If the data is deleted than user is upgraded to teacher but the data from the request table is not deleted*/
                                    echo "<div class='text-center'><h6><span class='text-success'>Approved as Teacher</span> <br><span class='text-warning'>But, Error while deleting data from `requests` table</span></h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./requests.php'> Click to go back</a></div></div>";
                                }
                            } /*Executes if the Dat is not inserted into the user table*/else {
                                echo "<div class='text-center'><h6><span class='text-danger'>Error while Approving (Retry)</span></h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./requests.php'> Click to go back</a></div></div>";
                            }
                        }
                    } /*Checking if the user data select query results in no data*/else {
                        echo "<div class='text-center'><h6><span class='text-danger'>user with the id " . $approvalId . " doesn't exits.</span></span><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./requests.php'> Click to go back</a></div></div>";
                    }
                } /*Executes if the id is not sent to this page*/else {
                    echo "<div class='text-center'><h6><span class='text-danger'>Required Data is not sent.</span></h6><br><div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary mt-2'href='./requests.php'> Click to go back</a></div></div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>