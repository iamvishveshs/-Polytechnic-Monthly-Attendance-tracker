<?php
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "./db.php";
//Load Composer's autoloader
require '../vendor/autoload.php';
if (isset($_POST["sendOtp"])) {

    $email = $_POST["email"];
    $subject = "Attendance tracker password reset";

    $otp = rand(111111, 999999);//Genearting 6 digits otp
    $message = "Your OTP for resetting password is <br>" . $otp;

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

            $mail->Username = "demo@gmail.com";//Enter your email
            $mail->Password = "Your_app_password_generated_from_gamil";//go to gmail and generate app password

            $mail->setFrom("eg@gmail.com","Attendance tracker");
            $mail->addAddress($email, " ");//Recievers email
            //Content
            $mail->isHTML(true);//Html embeddable
            $mail->Subject = $subject;//Subject of the mail
            $mail->Body = $message;//Message in the mail

            if ($mail->send()) {
                //Setting otp to database
                if (mysqli_query($conn, "UPDATE user SET otp='$otp' WHERE email='$email'")) {
                    header("Location:./otp.php?email='$email'");
                } else {
                    echo "<p>error occured while updating the otp in database.</p><br><a href='./reset-password.php'>Click to go back</a>";
                }
            } else {
                echo "<p>error occured while sending email. Resnd it</p><br><a href='./reset-password.php'>Click to go back</a>";
            }
        } catch (Exception $e) {
            echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p><br><a href='./reset-password.php'>Click to go back</a>";
        }
    }
}
else if(isset($_POST["checkOtp"]))
{
    $email = $_POST["email"];
    $otp=$_POST["otp"];
    if($query=mysqli_query($conn,"SELECT * FROM user WHERE email=$email"))
    {
        $row=mysqli_fetch_assoc($query);
        if($row['otp']==$otp)//Checking entered otp is equal to sent otp
        {
            header("Location:./new-password.php?email=".$email."&otp=".$otp);
        }
        else{
            echo "<p>Otp is not matching re enter otp.</p><br><a href='./otp.php?email=$email'>Click to go back</a>";
        }
    }
}
else if(isset($_POST["updatePassword"]))
{
    $email = $_POST["email"];
    $otp=$_POST["otp"];
    $password=md5($_POST["password"]);
    if($query=mysqli_query($conn,"SELECT * FROM user WHERE email=$email"))
    {
        $row=mysqli_fetch_assoc($query);
        if($row['otp']==$otp)//Checking entered otp is equal to sent otp
        {
            if($query=mysqli_query($conn,"UPDATE user SET `password`='$password' WHERE email=$email"))//Updating password
            {
                header("Location:./index.php?alert=Password Changed Successfully");
            }
        }
        else{
            echo "<p>Error while updating password. Retry</p><br><a href='.reset-password.php'>Click to Retryk</a>";
        }
        
    }
}
