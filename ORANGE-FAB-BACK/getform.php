<?php

include 'helper/helper.php';
include 'helper/db.php';


if($_SERVER['REQUEST_METHOD'] !== 'POST')
    helper::singleton()->http(200, 'wrong request');

$request_body = file_get_contents('php://input');

if(!empty($request_body)){
    $json = helper::singleton()->from_json($request_body);
    try {
        $jwt = getallheaders()[helper::$auth_header];
        $decoded = helper::singleton()->decode_token($jwt);
    } catch(Exception $e) {
        helper::singleton()->http(200, 'error occured');
    }

    $table = $json->step == 2 ? 'step2' : 'step3';

    $data  = db::singleton()->get('SELECT * FROM ' .$table. ' WHERE id_user = ?', [$decoded->id]);
    $files = db::singleton()->get('SELECT * FROM file WHERE id_user = ?', [$decoded->id]);
    $user  = db::singleton()->get('SELECT mail_sent FROM users WHERE id = ?', [$decoded->id]);

    if(count($data) <= 0){
        helper::singleton()->http(200, '{}');
    }

    $long_array = array($data[count($data) - 1], $files, $user[0]);

    // todo update au lieu d'ajouter -> ghetto fix sur le rows avec count pour envoyer la dernière update
    helper::singleton()->http(200, helper::singleton()->to_json($long_array));
}
