<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../vendor/phpmailer/phpmailer/src/Exception.php';
include '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include '../vendor/phpmailer/phpmailer/src/SMTP.php';

// Load Composer's autoloader
include '../vendor/autoload.php';

// For sending email rejection message 

function sendNotificationMail($email, $fullname)
{
    $mail = new PHPMailer();
    try {
        // Server settings
        $mail->isSMTP();  // Send using SMTP
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = 'training.pcnpromopro@gmail.com';  // SMTP username
        $mail->Password = 'rdtazfnakntwmtxl';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
        $mail->Port = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)

        // Recipients
        $mail->setFrom('training.pcnpromopro@gmail.com', 'PCN Promopro Inc.');
        $mail->addAddress($email, $fullname);  // Add a recipient

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Training Request';
        $mail->Body = '<center>
                            <div class="container" style="margin: 1rem;">
                                <div class="div-message">
                                    <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">Dear ' . $fullname . ',</h3>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">We trust this message finds you well. We want to notify you that your request has been successfully submitted. Please await the approval of the administrator. Thank you for your patience, and have a wonderful day.</p>
                                </div>
                                <div class="footer-message">
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; ">Best regards,<br><br>
                                        PCN Promopro Inc.</p>
                                </div>
                            </div>
                        </center>';

        // Send the email
        if (!$mail->send()) {
            echo "Message could not be sent.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent.";
        echo "Email Address: " . $email;
    }
}

function sendApprovedMessage($email, $fullname)
{
    $mail = new PHPMailer();
    try {
        // Server settings
        $mail->isSMTP();  // Send using SMTP
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = 'training.pcnpromopro@gmail.com';  // SMTP username
        $mail->Password = 'rdtazfnakntwmtxl';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
        $mail->Port = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)

        // Recipients
        $mail->setFrom('training.pcnpromopro@gmail.com', 'PCN Promopro Inc.');
        $mail->addAddress($email, $fullname);  // Add a recipient

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Training Request';
        $mail->Body = '<center>
                            <div class="container" style="margin: 1rem;">
                                <div class="div-message">
                                    <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">Dear ' . $fullname . ',</h3>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">I hope this message finds you well. We would like to inform you that your request has been approved. </p>
                        
                                </div>
                                <div class="footer-message">
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; ">Best regards,<br><br>
                                        PCN Promopro Inc.</p>
                                </div>
                            </div>
                        </center>';

        // Send the email
        if (!$mail->send()) {
            echo "Message could not be sent.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent.";
        echo "Email Address: " . $email;
    }
}


function sendRejectionMessage($email, $fullname)
{
    $mail = new PHPMailer();
    try {
        // Server settings
        $mail->isSMTP();  // Send using SMTP
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = 'training.pcnpromopro@gmail.com';  // SMTP username
        $mail->Password = 'rdtazfnakntwmtxl';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
        $mail->Port = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)

        // Recipients
        $mail->setFrom('training.pcnpromopro@gmail.com', 'PCN Promopro Inc.');
        $mail->addAddress($email, $fullname);  // Add a recipient

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Training Request';
        $mail->Body = '<center>
                            <div class="container" style="margin: 1rem;">
                                <div class="div-message">
                                    <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">Dear ' . $fullname . ',</h3>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">I hope this message finds you well. We appreciate your prompt response and the effort you put into submitting your request. </p>
                        
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                                        After careful consideration, we regret to inform you that your request has been declined at this time. We understand that this decision may be disappointing, and we want to assure you that it was not made lightly.
                                    </p>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                                        We encourage you to continue exploring opportunities with us, and we look forward to the possibility of working together in the future.
                                    </p>
                                    <br>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                                        Thank you for your understanding.
                                    </p>
                                    <br>
                                </div>
                                <div class="footer-message">
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; ">Best regards,<br><br>
                                        PCN Promopro Inc.</p>
                                </div>
                            </div>
                        </center>';

        // Send the email
        if (!$mail->send()) {
            echo "Message could not be sent.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent.";
        echo "Email Address: " . $email;
    }
}