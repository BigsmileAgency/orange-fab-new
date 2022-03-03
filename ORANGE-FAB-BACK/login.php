<?php

include 'helper/helper.php';
include 'helper/db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST')
    helper::singleton()->http(200, 'wrong request');

$request_body = file_get_contents('php://input');

if(!empty($request_body)){
    $json = helper::singleton()->from_json($request_body);

    $email    = filter_var($json->email, FILTER_SANITIZE_EMAIL);
    $password = $json->password;
    
    if(empty($email) || empty($password))
        helper::singleton()->http(500, 'missing values');

    $rows = db::singleton()->get('SELECT * FROM users WHERE email = ?', [$email]);

    if(count($rows) != 1 || !password_verify($password, $rows[0]['password']))
        helper::singleton()->http(500, 'wrong credentials');

    $token = array(
        "id" => $rows[0]['id']
    );

    $jwt = helper::singleton()->encode_token($token);

    helper::singleton()->http(200, $jwt);
}