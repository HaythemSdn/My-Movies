<?php
namespace pdo_wrapper ;

use \PDO ;

class PdoWrapper
{

    private $db_name ;
    private $db_user ;
    private $db_pwd ;
    private $db_host ;
    private $db_port ;
    private $pdo ;

    public function __construct($db_name, $db_host='127.0.0.1', $db_port='3306', $db_user = 'root', $db_pwd='root'){
        $this->db_name = $db_name ;
        $this->db_host = $db_host ;
        $this->db_port = $db_port ;
        $this->db_user = $db_user ;
        $this->db_pwd = $db_pwd ;

        $dsn = 'mysql:dbname=' . $this->db_name . ';host='. $this->db_host. ';port=' . $this->db_port;
        try{
            $this->pdo = new PDO($dsn, $this->db_user, $this->db_pwd);
        }catch (\Exception $ex){
            die('Error : ' . $ex->getMessage()) ;
        }

    }

    public function exec($statement, $params, $classname = null) {
        try {
            $res = $this->pdo->prepare($statement);
            $success = $res->execute($params);
    
            // Check if the statement was an INSERT, UPDATE, or DELETE
            if (preg_match('/^\s*(INSERT|UPDATE|DELETE)/i', $statement)) {
                return $success; // Return true if the operation was successful
            }
    
            // For SELECT statements or other queries, fetch the results
            if ($classname != null) {
                $data = $res->fetchAll(PDO::FETCH_CLASS, $classname);
            } else {
                $data = $res->fetchAll(PDO::FETCH_OBJ);
            }
    
            return $data;
        } catch (\PDOException $e) {
            // Handle and log any PDO exceptions
            error_log('Database Error: ' . $e->getMessage());
            return false;
        }
    }

}