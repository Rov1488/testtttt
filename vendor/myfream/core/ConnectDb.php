<?php


namespace myfream;
use PDO;

class ConnectDb
{
    use TSingletone;

    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'classicmodels';

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public function getConnection()
    {
        try {
            if (isset($this->conn)){
                return $this->conn;
            }
        }catch (PDOException $e){
            $error = $e->getMessage();
        }

    }



}