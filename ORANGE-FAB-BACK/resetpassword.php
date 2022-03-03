<?php
include 'helper/helper.php';
include 'helper/db.php';

require('helper/phpmailer-6/PHPMailer.php');
require('helper/phpmailer-6/SMTP.php');
require('helper/phpmailer-6/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$request_body = file_get_contents('php://input');

if($_SERVER['REQUEST_METHOD'] !== 'POST')
    helper::singleton()->http(200, 'wrong request');

$request_body = file_get_contents('php://input');

if(!empty($request_body)){
    $json = helper::singleton()->from_json($request_body);

    $email = $json->email;

    $user = db::singleton()->get('SELECT * FROM users WHERE email = ?', [$email]);

    if(count($user) <= 0){
        helper::singleton()->http(500, 'wrong email');
    }

    $token = bin2hex(random_bytes(32));

    db::singleton()->insert('INSERT INTO changepassword(id_user, token) VALUES (?, ?)', [$user[0]['id'], $token]);

    
    $mail = new PHPMailer(true);
    // $mail->IsSMTP();
    $mail->IsHTML(true);
    $mail->SMTPDebug = 0;
    $mail->CharSet = 'UTF-8';
    
    // $mail->Host = 'smtp.office365.com';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'hello@orangefab.be';
    // $mail->Password = 'aTsqTr8Fbp!';

    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 587;


    $mail->SetFrom('orangefab@orange.be', 'OrangeFab');
    $mail->AddAddress($email, $email);

    $mail->Subject = 'Lost password';
    //$mail->Body    = $text[$_SESSION['lang']]['mail'];

    $content = file_get_contents(__DIR__ . '/helper/template/index_password.html');;

    $content = str_replace('{%url_change_password%}', helper::$base_url . 'en/reset/'.$token, $content);


    $mail->msgHTML($content);

    $mail->Send();

    helper::singleton()->http(200, 'ok token');
}