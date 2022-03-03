<?php

include 'helper/helper.php';
include 'helper/db.php';

$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$email = getallheaders()['Email'];
// try {
//     $jwt = getallheaders()[helper::$auth_header];
//     $decoded = helper::singleton()->decode_token($jwt);
// } catch(Exception $e) {
//     helper::singleton()->http(200, 'error occured');
// }

$i = 0;
$target_file = $target_dir . $i . basename($_FILES["file"]["name"]);

while (file_exists($target_file)) {
    $i++;
    $target_file = $target_dir . $i . basename($_FILES["file"]["name"]);
}
// Check file size
if ($_FILES["file"]["size"] > 6000000) {
    $uploadOk = 0;
    helper::singleton()->http(500, 'Too heavy file');
}
// var_dump($imageFileType);
// Allow certain file formats
if($imageFileType != "csv" && $imageFileType != "pdf" && $imageFileType != "xls" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
    $uploadOk = 0;
    helper::singleton()->http(500, 'error file type');
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    helper::singleton()->http(500, 'error');
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        db::singleton()->insert('INSERT INTO file(user_email, filename) VALUES (?,?)'
        , [
            $email,
            $i . basename($_FILES["file"]["name"])
        ]);
        helper::singleton()->http(200, $i . basename($_FILES["file"]["name"]));
    } else {
        helper::singleton()->http(500, 'error');
    }
}
