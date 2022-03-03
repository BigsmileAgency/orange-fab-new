<?php

// exemple : db::singleton()->get('SELECT ... FROM ...')


include 'helper/errors.php';

class db {
  // // LOCAL
    // private $host     = 'localhost:3306';
    // private $db       = 'orangefab';
    // private $user     = 'root';
    // private $password = '';

  //STAGING : orangefab.staging.bigsmile.be
    // private $host     = 'localhost:3306';
    // private $db       = 'orangefab_staging';
    // private $user     = 'orange_user_stg';
    // private $password = '6yFyfq8#ah8DlAme';

  // // PROD
    private $host     = 'localhost:3306';
    private $db       = 'orangefab';
    private $user     = 'orangefab';
    private $password = '5689/*vb';

    private $pdo;

    private static $instance = null;

    private $opt      = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ];

    static function singleton(){
        if(is_null(self::$instance)){
            self::$instance = new db();
        }

        return self::$instance;
    }

    public function __construct(){
        $resolved_host = gethostbyname($this->host);

        $url      = "mysql:host=$resolved_host;dbname=$this->db;charset=utf8";
        try{
            $this->pdo      = new PDO($url, $this->user, $this->password, $this->opt);
        } catch(PDOException $e){
            echo json_encode( array('code' => errors::$error_db, 'message' => 'erreur mysql') );
            die();
        }
    }

    function get($toprepare, $datas = [], $fetch_method = PDO::FETCH_ASSOC){
        try{
            $query = $this->pdo->prepare($toprepare);
            $query->execute($datas);

            return $query->fetchAll($fetch_method);
        } catch(PDOException $e){
            echo json_encode( array('code' => errors::$error_db, 'message' => $e->getMessage()) );
            die();
        }
    }

    function insert($toprepare, $datas = []){
        try{
            $query = $this->pdo->prepare($toprepare);
            $query->execute($datas);
        } catch(PDOException $e){
            echo json_encode( array('code' => errors::$error_db, 'message' => $e->getMessage()) );
            die();
        }
    }
}
