<?php

class Database {

    public $pdo;
    private $username = 'root';
    private $password = '';
    private $host = 'localhost';
    private $database = 'flight';
    
    /*
    !-----------------------------------------------------
    !      initial load at the time of creating object
    !      no return job
    !----------------------------------------------------
    */
    function __construct() {
        if (!isset($this->pdo)) {
            try {
                $link = new PDO("mysql:host=" . $this->host . "; dbname=" . $this->database, $this->username, $this->password);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            } catch (PDOException $exc) {
                die("Field to Connect with Database" . $exc->getMessage());
            }
        }
    }


    /*
    !-----------------------------------------------------
    !      database connection
    !      return as connection object
    !----------------------------------------------------
    */
    public function connection() {

        if (!isset($this->pdo)) {
            try {
                $link = new PDO("mysql:host=" . $this->host . "; dbname=" . $this->database, $this->username, $this->password);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            } catch (PDOException $exc) {
                die("Field to Connect with Database" . $exc->getMessage());
            }
        }

    }


}
