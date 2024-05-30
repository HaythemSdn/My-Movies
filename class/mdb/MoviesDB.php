<?php
namespace mdb ;

use \pdo_wrapper\PdoWrapper ;

include __DIR__ . "../../../DB_CREDENTIALS.php" ;

class MoviesDB extends PdoWrapper
{

    public const UPLOAD_DIR = "uploads/" ;

    public function __construct(){
        // appel au constructeur de la classe mère
        parent::__construct(
            $GLOBALS['db_name'],
            $GLOBALS['db_host'],
            $GLOBALS['db_port'],
            $GLOBALS['db_user'],
            $GLOBALS['db_pwd']) ;
    }



    public function signup($username, $password){
        $query = 'INSERT INTO users(username, password) VALUES (:username, :password)' ;
        $params = [
            'username' => $username,
            'password' => $password
        ] ;
        return $this->exec($query, $params) ;
    }
    public function checkUser($username){
        $query = 'SELECT * FROM users WHERE username = :username';
        $params = ['username' => $username];
    
        $result = $this->exec($query, $params);
        
        if (!empty($result)) {
            return $result[0]; 
        }
        return null;
    }
    public function createFilm($name, $description=null, $imgFile=null){

        $name = htmlspecialchars($name) ;
        $description = htmlspecialchars($description) ;

        $imgName = null ;
        // enregistrement du fichier uploadé
        if($imgFile != null){
            $tmpName = $imgFile['tmp_name'] ;
            $imgName = $imgFile['name'] ;
            $imgName = urlencode(htmlspecialchars($imgName)) ;

            $dirname = $GLOBALS['PHP_DIR'].self::UPLOAD_DIR ;
            if(!is_dir($dirname)) mkdir($dirname) ;
            $uploaded = move_uploaded_file($tmpName, $dirname.$imgName) ;
            if (!$uploaded) die("FILE NOT UPLOADED") ;
        }else echo "NO IMAGE !!!!" ;

        $query = 'INSERT INTO Films(name, description, image) VALUES (:name, :description, :image)';
        $params=[
            'name' => htmlspecialchars($name),
            'description' => htmlspecialchars($description),
            'image' => $imgName
        ] ;
        return $this->exec($query, $params) ;
    }

}