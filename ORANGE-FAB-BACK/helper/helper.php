<?php

include './vendor/autoload.php';

use \Firebase\JWT\JWT;

class helper {
    public static $base_url = 'https://orangefab.be/';
    // public static $base_url = 'https://orangefab.staging.bigsmile.be/';
    public static $auth_header = 'Auth';
    private static $instance;
    private static $key = "$546FEQFp$(4";

    static function singleton(){
        if(is_null(self::$instance)){
            self::$instance = new helper();
        }

        return self::$instance;
    }

    function to_json($res){
        return json_encode($res);
    }

    function from_json($res){
        return json_decode($res);
    }

    function clamp($value, $min, $max){
        if($value <= $min)
            return $min;
        else if($value >= $max)
            return $max;

        return $value;
    }

    function http($status, $data) {
        http_response_code ($status);
        die($data);
    }

    function encode_token($token) {
        return JWT::encode($token, self::$key);
    }

    function decode_token($jwt) {
        return JWT::decode($jwt, self::$key, array('HS256'));
    }
}

if (!is_callable('getallheaders')) {
    # Convert a string to mixed-case on word boundaries.
    function uc_all($string) {
        $temp = preg_split('/(\W)/', str_replace("_", "-", $string), -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($temp as $key=>$word) {
            $temp[$key] = ucfirst(strtolower($word));
        }
        return join ('', $temp);
    }

    function getallheaders() {
        $headers = array();
        foreach ($_SERVER as $h => $v)
            if (preg_match('/HTTP_(.+)/', $h, $hp))
                $headers[str_replace("_", "-", uc_all($hp[1]))] = $v;
        return $headers;
    }

    function apache_request_headers() { return getallheaders(); }
}
