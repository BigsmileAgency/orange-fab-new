<?php

include 'helper/db.php';
include 'helper/helper.php';


if($_SERVER['REQUEST_METHOD'] !== 'POST')
    helper::singleton()->http(200, 'wrong request');

$unsafe_data = file_get_contents('php://input');

$username = 'administrator';
$password = '153957/**/957153';

if(!empty($unsafe_data)){
    $json = json_decode($unsafe_data);

    if(!(isset($json->username) && $json->username == $username && isset($json->password) && $json->password == $password)){
        echo json_encode( array('code' => errors::$wrong_login, 'message' => 'wrong login', 'error' => true) );
        die();
    }

    $user = db::singleton()->get('SELECT s2.id_user, 
    u.company, u.website, u.firstname, u.lastname, u.phone, u.email, u.position, u.activity, u.created,
    s2.selling_point,s2.business_model, s2.major_clients, s2.business_create, s2.market_problem, s2.startup_country, s2.startup_city, s2.startup_people, s2.track_apply,
    s3.turnover, s3.participate_accelerator, s3.which_accelerator, s3.money_raised, s3.fab_expect, s3.why_collaborate, s3.hear_us
        FROM users u
        LEFT JOIN step2 s2 ON u.id = s2.id_user
        LEFT JOIN step3 s3 ON u.id = s3.id_user');

    for($i = 0; $i < count($user); ++$i){
        $files = db::singleton()->get('SELECT filename FROM file WHERE user_email = ?', [$user[$i]['email']]);

        $concatenation = '';
        for($j = 0; $j < count($files); ++$j){
            $concatenation .= 'https://' . $_SERVER['HTTP_HOST'] . '/uploads/' . $files[$j]['filename'] . ' - ';
        }
        $user[$i]['files'] = $concatenation;
    }

    $rows = $user;


    if(count($rows) <= 0){
        echo json_encode( array('code' => errors::$empty_db, 'message' => 'empty db', 'error' => true) );
        die();
    }

    $array_columns = array();

    foreach($rows[0] as $col => $val){
        array_push($array_columns, $col);
    }

    //Setup the filename that our CSV will have when it is downloaded.
    $file_name = 'database-export.csv';

    //Set the Content-Type and Content-Disposition headers to force the download.
    header('Content-Encoding: UTF-8');
    // header('Content-type: text/csv; charset=UTF-8');
    header("Content-Type: application/vnd.ms-excel");
    header("Cache-Control: no-store, no-cache");
    header('Content-Disposition: attachment; filename="' . $file_name . '"');

    echo chr(0xEF);
    echo chr(0xBB);
    echo chr(0xBF);

    //Open up a file pointer
    $fp = fopen('php://output', 'w');

    fputs($fp, $bom = ( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

    //Start off by writing the column names to the file.
    fputcsv($fp, $array_columns, ',', '"');

    //Then, loop through the rows and write them to the CSV file.
    foreach ($rows as $row) {
      fputcsv($fp, $row, ',', '"');
    }

    //Close the file pointer.
    fclose($fp);
    exit;
}