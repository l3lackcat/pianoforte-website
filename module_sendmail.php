<?php

require("PHPMailer_v5.1/class.phpmailer.php");  // ประกาศใช้ class phpmailer กรุณาตรวจสอบ ว่าประกาศถูก path

$styleInvalid = "border:solid 1px red;";

function smtpmail($email, $subject, $body) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = "utf-8";          
    $mail->Host = "webmail.pianoforte.co.th";
    $mail->SMTPAuth = true;
    $mail->Username = "contact@pianoforte.co.th";
    $mail->Password = "csforte";

    $mail->From = "contact@pianoforte.co.th";
    $mail->FromName = "PianoForte Web";
    $mail->AddAddress($email);
    $mail->IsHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $result = $mail->send();
    return $result;
}