<?php
class Database{
    private $database;
    private $username;
    private $password;
    private $host;
    private $dbh;

    public function __construct() {
        $this->database = 'auto_rent';
        $this->username = 'root';
        $this->password = '';
        $this->host = 'localhost';


        try {
            $dsn = "mysql:host=$this->host;dbname=$this->database";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        }catch(\Exception $e) {
            die('failed to connect to database' .$e->getMessage());
        }   
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }

     
    public function delete($sql,$placeholder) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
    }
    public function update($sql,$placeholder) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
    }
    public function select($sql,$placeholder = []) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)) {
                return $result;
            } else {
                echo "Geen data beschikbarr";
            }
    }


    public function insert($sql,$placeholder) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
    }

    public function login($username, $password) {

        $sql = "SELECT username, password FROM medewerker WHERE username=:username";
        $stmt = $this->dbh->prepare($sql);
        
        $stmt->execute([
            'username'=> $username
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!is_null($result)){
            if($username && password_verify($password, $result['password'])){
                header("location: medewerker.php");
                session_start();
                $_SESSION['username'] = $username;
            }else{
                echo 'Username or password is incorrect.';
                exit();
            }
        }
    }
}

?>