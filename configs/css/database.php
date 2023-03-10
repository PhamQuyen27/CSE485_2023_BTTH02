<?php
class Database{
    const username = 'root';
    const password = '';
    private $conn=null;
    public function __Construct(){
        try {                                                               // Try following code
            $pdo = new PDO("mysql:host=localhost;dbname=btth01_cse485;port=3306;charset=utf8mb4", self::username,self::password);
            $this->conn = $pdo;
        } catch (PDOException $e) {                                         // If exception thrown
            throw new PDOException($e->getMessage(), $e->getCode());        // Re-throw exception
        }
    }
    public function getConn(){
        return $this->conn;
    }
}
?>