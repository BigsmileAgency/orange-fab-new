<?php

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
// header("Access-Control-Allow-Methods: *");

include 'helper/helper.php';
include 'helper/db.php';

require('helper/phpmailer-6/PHPMailer.php');
require('helper/phpmailer-6/SMTP.php');
require('helper/phpmailer-6/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$request_body = file_get_contents('php://input');

if(empty($request_body))
    helper::singleton()->http(200, 'data manquant');

$json = helper::singleton()->from_json($request_body);

// STEP 1

$company   = $json->step1->company;
$website   = $json->step1->website;
$firstname = $json->step1->firstname;
$lastname  = $json->step1->lastname;
$phone     = $json->step1->phone;
$email     = $json->step1->email;
$position  = $json->step1->position;
$activity  = $json->step1->activity;

$rows = db::singleton()->get('SELECT * FROM users WHERE email = ?', [$email]);
// error_log(print_r($rows ,true));
if(count($rows) > 0)
    helper::singleton()->http(200, 'This user is already registered');

db::singleton()->insert('INSERT INTO users(company, website, firstname, lastname, phone, email, position, activity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [$company, $website, $firstname, $lastname, $phone, $email, $position, $activity]);

// STEP 2
$id = db::singleton()->get('SELECT id FROM users WHERE email = ?', [$email]);
$id_user = $id[0]['id'];

$selling_point   = $json->step2->selling_point;
$business_model   = $json->step2->business_model;
$major_clients   = $json->step2->major_clients;
$market_problem   = $json->step2->market_problem;
$business_create  = $json->step2->business_create;
$startup_country  = $json->step2->startup_country;
$startup_city     = $json->step2->startup_city;
$startup_people   = $json->step2->startup_people;
$track_apply   = $json->step2->track_apply;


db::singleton()->insert('INSERT INTO step2(id_user, selling_point, business_model, major_clients, market_problem, business_create, startup_country, startup_city, startup_people, track_apply) VALUES (?,?,?,?,?,?,?,?,?,?)'
    , [
        $id_user,
        $selling_point,
        $business_model,
        $major_clients,
        $market_problem,
        $business_create,
        $startup_country,
        $startup_city,
        $startup_people,
        $track_apply,
    ]
);

// STEP 3

$money_raised            = $json->step3->money_raised;
$which_accelerator       = $json->step3->which_accelerator;
$fab_expect              = $json->step3->fab_expect;
$why_collaborate         = $json->step3->why_collaborate;
$hear_us                 = $json->step3->hear_us;
$turnover                = $json->step3->turnover;
$participate_accelerator = $json->step3->participate_accelerator;
$file_additional         = $json->step3->file_additional;

db::singleton()->insert('INSERT INTO step3(id_user, which_accelerator, money_raised, fab_expect, why_collaborate, hear_us, turnover, participate_accelerator) VALUES (?,?,?,?,?,?,?,?)'
    , [
        $id_user,
        $which_accelerator,
        $money_raised,
        $fab_expect,
        $why_collaborate,
        $hear_us,
        $turnover,
        $participate_accelerator
    ]
);

// Envoi du mail

$mail = new PHPMailer(true);


// $mail->IsSMTP();
// $mail->SMTPDebug = 4;
$mail->CharSet = 'UTF-8';

// $mail->Host = 'smtp.office365.com';
// $mail->SMTPAuth = true;
// // $mail->Username = 'hello@orangefab.be';
// $mail->Username = 'orangefab@orange.be';
// $mail->Password = 'aTsqTr8Fbp!';
// $mail->SMTPSecure = 'tls';
// $mail->Port = 587;


// $mail->Host = 'pro.eu.turbo-smtp.com';
// $mail->SMTPAuth = true;
// $mail->Username = 'bruno@bigsmile.be';
// $mail->Password = 'OmUFgy23';
// $mail->SMTPSecure = 'ssl';
// $mail->Port = 465;


// $mail->Host = 'virtsmtpgateway.host.mobistar.be';
// $mail->SMTPAuth = false;
// $mail->Host = 'virtsmtpgateway.ux.mobistar.be';
// $mail->Port = 25;
// $mail->Username = 'bruno@bigsmile.be';
// $mail->Password = 'OmUFgy23';
// $mail->SMTPSecure = 'ssl';

// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->SetFrom('hello@orangefab.be', 'OrangeFab');
$mail->AddAddress($email);
// $mail->AddBCC('juliette.malherbe@orange.com');
// $mail->AddBCC('camille.suratteau@orange.com');
// $mail->AddBCC('oceane@bigsmile.be');
// $mail->AddBCC('ariane.chan@orange.com');
$mail->AddBCC('olivier@bigsmile.be');

$mail->IsHTML(true);

$mail->Subject = 'Thank you for subscribing';
//$mail->Body    = $text[$_SESSION['lang']]['mail'];

$content = file_get_contents(__DIR__ . '/helper/template/index.html');


$files_additional_db = db::singleton()->get('SELECT * FROM file WHERE user_email = ?', [$email]);
$files_additional = "";
for($i = 0; $i < count($files_additional_db); ++$i){
    $url = helper::$base_url . 'uploads/' . $files_additional_db[$i]['filename'];
    $files_additional .= '<a href="'.$url.'">' . $files_additional_db[$i]['filename'] . '</a><br/>';
}

$content = str_replace('{%company%}', $company, $content);
$content = str_replace('{%website%}', $website, $content);
$content = str_replace('{%phone%}', $phone, $content);
$content = str_replace('{%position%}', $position, $content);
$content = str_replace('{%email%}', $email, $content);
$content = str_replace('{%first_name%}', $firstname, $content);
$content = str_replace('{%last_name%}', $lastname, $content);
$content = str_replace('{%selling_point%}', $selling_point, $content);
$content = str_replace('{%business_model%}', $business_model, $content);
$content = str_replace('{%major_clients%}', $major_clients, $content);
$content = str_replace('{%market_problem%}', $market_problem, $content);
$content = str_replace('{%business_create%}', $business_create , $content);
$content = str_replace('{%startup_country%}', $startup_country, $content);
$content = str_replace('{%startup_city%}', $startup_city, $content);
$content = str_replace('{%startup_people%}', $startup_people, $content);
$content = str_replace('{%track_apply%}', $track_apply, $content);
$content = str_replace('{%money_raised%}', $money_raised != null ? $money_raised . ' €' : '-', $content);
$content = str_replace('{%which_accelerator%}', $which_accelerator != null ? $which_accelerator : '-' , $content);
$content = str_replace('{%fab_expect%}', $fab_expect, $content);
$content = str_replace('{%participate_accelerator%}', $participate_accelerator, $content);
$content = str_replace('{%why_collaborate%}', $why_collaborate, $content);

$content = str_replace('{%hear_us%}', $hear_us, $content);
$content = str_replace('{%files_additional%}', $files_additional, $content);

// $mail->Body = $content;

$mail->msgHTML($content);

if($mail->Send()){
  db::singleton()->insert('UPDATE users SET mail_sent = 1 WHERE id = ?', [$id_user]);
}else{
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

helper::singleton()->http(200, 'form added');
