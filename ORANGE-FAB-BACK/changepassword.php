<?php
include 'helper/helper.php';
include 'helper/db.php';

$request_body = file_get_contents('php://input');

if($_SERVER['REQUEST_METHOD'] !== 'POST')
    helper::singleton()->http(200, 'wrong request');

$request_body = file_get_contents('php://input');

if(!empty($request_body)){
    $json = helper::singleton()->from_json($request_body);

    $token = $json->token;
    $password_to = $json->password_to;

    $tokens = db::singleton()->get('SELECT * FROM changepassword WHERE token = ?', [$token]);

    if(count($tokens) <= 0){
        helper::singleton()->http(500, 'wrong token');
    }

    db::singleton()->insert('UPDATE users SET password=? WHERE id = ?', [password_hash($password_to, PASSWORD_DEFAULT), $tokens[0]['id_user']]);

    db::singleton()->insert('DELETE FROM changepassword WHERE id = ?', [$tokens[0]['id']]);

    helper::singleton()->http(200, 'ok change');
}