<?php

include 'helper/helper.php';
include 'helper/db.php';

$request_body = file_get_contents('php://input');

if($_SERVER['REQUEST_METHOD'] !== 'POST')
    helper::singleton()->http(200, 'wrong request');

$request_body = file_get_contents('php://input');

if(!empty($request_body)){
    $json = helper::singleton()->from_json($request_body);
    // todo try catch from here
    try {
        $jwt = getallheaders()[helper::$auth_header];
        $decoded = helper::singleton()->decode_token($jwt);
    } catch(Exception $e) {
        helper::singleton()->http(200, 'error occured');
    }
    
    db::singleton()->insert('DELETE FROM file WHERE filename = ? AND id_user = ?', [$json->file, $decoded->id]);

    helper::singleton()->http(200, 'ok');
}