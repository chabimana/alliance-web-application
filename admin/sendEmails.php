<?php
require_once '../vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('tumudivi12345@gmail.com')
    ->setPassword('0785676119');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token,$password)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>verify email</title>
    </head>

    <body>
      <div class="wrapper">
        <p>you are registerd as alliance user. click to verify your account:.</p>
        <a href="http://localhost:8080/alliance/verify_email.php?access_code=' . $token . '">Verify Email!</a> and your password is : ' . $password .'
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom('tumudivi12345@gmail.com')
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}
?>