<?php

require "../includes/db.php";
require_once __DIR__ . '/../data/config.php';

require_once __DIR__ . '/../includes/SMTP.php';
require_once __DIR__ . '/../includes/PHPMailer.php';
require_once __DIR__ . '/../includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];

$mail = new PHPMailer(true);

$user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `contact`='" . $phone . "'");
$user_num = $user_rs->num_rows;

if ($user_num > 0) {
    echo ("User with same email or mobile already exists !!!");
} else {
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    // Generate code 
    $code = rand(100000, 999999);

    try {
        // Send the code to user
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $my_email;
        $mail->Password = $app_passwod;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($my_email, 'Email Verification');
        $mail->addReplyTo($my_email, 'Email Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'FitZone Email Verification Code';
        $mail->Body    = '<h1 style="color:blue;">Your verification code is ' . $code . '</h1>';

        if (!$mail->send()) {
            echo 'Verification code sending failed.';
        } else {
            // Only insert user if email sent
            Database::iud("INSERT INTO `user`
        (`first_name`,`last_name`,`contact`,`email`,`password`,`registered_date_time`, `role`,`user_status_id`, `verification_code`) VALUES
        ('" . $fname . "','" . $lname . "','" . $phone . "','" . $email . "','" . $password . "','" . $date . "','customer','1', '" . $code . "')");

            echo 'success';
        }
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
