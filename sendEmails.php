<?php
include_once '../vendor/autoload.php';

include 'config/core.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('tumudivi12345@gmail.com')
    ->setPassword('0785676119');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
function sendVerificationEmail($userEmail, $token, $password)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Hey user of alliance. Please click on the link below to verify your account:.</p>
        <a href="'.$home_url.'admin/verify_email.php?access_code=' . $token . '">Verify Email!</a> this Your Password: '.$password.' 
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