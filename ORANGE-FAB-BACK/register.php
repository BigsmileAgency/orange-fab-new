<?php

include 'helper/helper.php';
include 'helper/db.php';


if($_SERVER['REQUEST_METHOD'] != 'POST')
    helper::singleton()->http(200, 'wrong request');

$request_body = file_get_contents('php://input');


if(!empty($request_body)){
    $json = helper::singleton()->from_json($request_body);

    if(empty($json->company) || empty($json->website) || empty($json->firstname) || empty($json->lastname) || empty($json->phone) || empty($json->email) || empty($json->activity))
        helper::singleton()->http(500, 'missing values');

    $company   = $json->company;
    $website   = $json->website;
    $firstname = $json->firstname;
    $lastname  = $json->lastname;
    $phone     = $json->phone;
    $email     = $json->email;
    $position  = $json->position;
    $activity  = $json->activity;

    $rows = db::singleton()->get('SELECT * FROM users WHERE email = ?', [$email]);

    if(count($rows) > 0){
        db::singleton()->insert("UPDATE users
        SET
        company = ?,
        website = ?,
        firstname = ?,
        lastname = ?,
        phone = ?,
        email = ?,
        position = ?,
        activity = ?
        WHERE
        email = ?",
        [$company, $website, $firstname, $lastname, $phone, $email, $position, $activity, $email]);
    } else {
        db::singleton()->insert('INSERT INTO users(company, website, firstname, lastname, phone, email, position, activity) VALUES (?, ?, ?, ?, ?, ?, ?)', [$company, $website, $firstname, $lastname, $phone, $email, $position, $activity]);
    }
    $rows = db::singleton()->get('SELECT * FROM users WHERE email = ?', [$email]);

    $token = array(
        "id" => $rows[0]['id']
    );

    $jwt = helper::singleton()->encode_token($token);

    helper::singleton()->http(200, $jwt);
}
