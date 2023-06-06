<?php
session_start();
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
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/main.css">
    <style>
        form {
            text-align: center;
        }

        select {
            padding: 12px;
            font-size: 14px;
            border: 1px solid #c6c6c6;
            width: 100%;
            margin-bottom: 18px;
            font-family: 'Lato', 'sans-serif';
            font-size: 16px;
            font-weight: 300;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-transition: all 0.3s;
            -o-transition: all 0.3s;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <?php
    include('db.php');

    $email = $_POST['email'];


    //to prevent from mysqli injection  
    $email = stripcslashes($email);
    $password = stripcslashes($_POST['pass']);
    $password = md5($password);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "select * from user where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        if ($row['role'] == "teacher") {
            $_SESSION["teacherId"] = $row['id'];
            $_SESSION["teacherName"] = $row['name'];
            $_SESSION["role"] = $row['role'];
            header("Location:../teacher");
        } else if ($row['role'] == "classTeacher") {
            $_SESSION["teacherId"] = $row['id'];
            $_SESSION["teacherName"] = $row['name'];
            $_SESSION["role"] = $row['role'];
            $_SESSION["teacherDepartment"] = $row['department'];

            ?>
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <form method="post" action="redirect.php">
                                <div>
                                    <label>Select Role</label><br>
                                    <select name="role" required>
                                        <option value="teacher">Teacher</option>
                                        <option value="classTeacher">Class Teacher</option>
                                    </select>
                                </div>
                                <div class="container-login100-form-btn">
                                    <div class="wrap-login100-form-btn">
                                        <div class="login100-form-bgbtn"></div>
                                        <button class="login100-form-btn" type="submit" name="submittedRole">
                                            Go to Dashboard
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php

        } else if ($row['role'] == "admin") {
            $_SESSION["adminId"] = $row['id'];
            $_SESSION["adminName"] = $row['name'];
            $_SESSION["role"] = $row['role'];
            header("Location:../admin");
        }
    } else {
        echo "<h1> Login failed. Invalid username or password.</h1>";
        echo "<div class='d-flex justify-content-center align-items-center'><a class='btn btn-primary' href='./'>Login again</a></div>";
    }
    ?>
</body>

</html>