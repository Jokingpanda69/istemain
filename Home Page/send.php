<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"]; // User's email address entered in the modal
    $phone = $_POST["phone"];
    $year = $_POST["year"];
    $branch = $_POST["branch"];
    $subject = $_POST["subject"];
    $query = $_POST["query"];

    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ishan2003dixit@gmail.com';
    $mail->Password = 'bhewwovdyeawvnaf';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom($email, $name); // Using the user's email as the sender
    $mail->addAddress('ishan2003dixit@gmail.com'); // Change recipient email address here

    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = "Name: $name<br>Email: $email<br>Phone Number: $phone<br>Year: $year<br>Branch: $branch<br>Subject: $subject<br>Query: $query";

    if($mail->send()){
        echo "<script>alert('Send successfully');document.location.href='home.html';</script>";
    } else {
        echo "<script>alert('Send failed');document.location.href='home.html';</script>";
    }
}
?>
