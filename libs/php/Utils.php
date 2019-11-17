<?php


class Utils
{
    function getToken ( $length = 32 )
    {
        $token        = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        for ( $i = 0; $i < $length; $i ++ ) {
            $token .= $codeAlphabet[ $this -> crypto_rand_secure ( 0 , strlen ( $codeAlphabet ) ) ];
        }
        return $token;
    }

    function crypto_rand_secure ( $min , $max )
    {
        $range = $max - $min;
        if ( $range < 0 ) return $min; // not so random...
        $log    = log ( $range , 2 );
        $bytes  = (int)( $log / 8 ) + 1; // length in bytes
        $bits   = (int)$log + 1; // length in bits
        $filter = (int)( 1 << $bits ) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec ( bin2hex ( openssl_random_pseudo_bytes ( $bytes ) ) );
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ( $rnd >= $range );
        return $min + $rnd;
    }
    function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
function sendEmail($userEmail, $token)
{
    global $mailer;
    $domain=$_SERVER['HTTP_HOST'];

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
        <p>Hey user of alliance. Please click on the link below to rest your password:.</p>
        <a href="'.$domain.'/reset_password.php?access_code=' . $token . '">Rest password!</a>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('rest your password'))
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
}