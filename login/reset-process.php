<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require "./db.php";
//Load Composer's autoloader
require '../vendor/autoload.php';
if (isset($_POST["sendOtp"])) {

    $email = $_POST["email"];
    $subject = "Attendance tracker password reset";

    $otp = rand(111111, 999999);//Genearting 6 digits otp
    $message = "<div style='font-size:1rem;'>Your OTP for resetting password is <br><div style='display:flex;justify-content:center;align-items:center;width:100%;'><p style='font-size:4rem;font-weight:bolder;color:dodgerblue;'>" . $otp . "</p> </div></div>";

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($query) == 1) {



        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = "your_email";//Enter your email
            $mail->Password = "app_password";//go to gmail and generate app password https://myaccount.google.com/apppasswords

            $mail->setFrom("eg@gmail.com", "Attendance tracker");
            $mail->addAddress($email, " ");//Recievers email
            //Content
            $mail->isHTML(true);//Html embeddable
            $mail->Subject = $subject;//Subject of the mail
            $mail->Body = $message;//Message in the mail
            if ($mail->send()) {
                //Setting otp to database
                if (mysqli_query($conn, "UPDATE user SET otp='$otp' WHERE email='$email'")) {
                    $_SESSION['email'] = $email;
                    header("Location:./otp.php");
                    exit;
                } else {
                    echo "<p>error occured while updating the otp in database.</p><br><a href='./reset-password.php'>Click to go back</a>";
                }
            } else {
                echo "<p>error occured while sending email. Resend it</p><br><a href='./reset-password.php'>Click to go back</a>";
            }
        } catch (Exception $e) {
            echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p><br><a href='./reset-password.php'>Click to go back</a>";
        }
    } else {
        echo "<p>The Email you have entered is incorrect.</p><br><a href='./reset-password.php'>Try again with another Email.</a>";
    }
} else if (isset($_POST["checkOtp"])) {
    $email = $_SESSION['email'];
    $otp = $_POST["otp"];
    if ($query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'")) {
        $row = mysqli_fetch_assoc($query);
        if ($row['otp'] == $otp)//Checking entered otp is equal to sent otp
        {
            $_SESSION['otp'] = $otp;
            header("Location:./new-password.php");
            exit;
        } else {
            echo "<p>Otp is not matching re enter otp.</p><br><a href='./otp.php'>Click to go back</a>";
        }
    }
} else if (isset($_POST["updatePassword"])) {
    $email = $_SESSION['email'];
    $password = md5($_POST["password"]);
    if ($query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'")) {
        $row = mysqli_fetch_assoc($query);
        if ($row['otp'] == $_SESSION['otp']) //Checking entered otp is equal to sent otp
        {
            if ($query = mysqli_query($conn, "UPDATE user SET `password`='$password', `otp`=NULL WHERE email='$email'")) //Updating password
            {
                // remove all session variables
                session_unset();

                // destroy the session
                session_destroy();
                header("Location:./index.php?alert=Password Changed Successfully");
            }
        } else {
            echo "<p>Error while updating password. Retry</p><br><a href='./reset-password.php'>Click to Retry</a>";
        }

    }
}
mysqli_close($conn);
?>