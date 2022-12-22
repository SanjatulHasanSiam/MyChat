<?php
class Database
{
  private $con;
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $charset;
  function __construct()
  {
    $this->con = $this->connect();
  }
  private function connect(){
   // $string = "mysqli:localhost;dbname=mychat_db";
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "mychat_db";
    $this->charset = "utf8mb4";
      // dsn - data source name
      $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
    try{
        // PDO - Represents a connection between PHP and a database server.
        $connection = new PDO($dsn, $this->username, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // If any error occurrs catch function catch the errors.
        return $connection;
    }catch(PDOException $e){
      echo $e->getMessage();
      die;
    }
    
  }
public function write($query,$data_array=[]){
    $con = $this->connect();
    $statement = $con->prepare($query);
    $check=$statement->execute($data_array);
    if($check){
      return true;
    }else{
      return false;
    }
}
//Read from database
public function read($query,$data_array=[]){
  $con = $this->connect();
  $statement = $con->prepare($query);
  $check=$statement->execute($data_array);
  if($check){
      $result = $statement->fetchAll(PDO::FETCH_OBJ);
    if(is_array($result) && count($result)>0){
        return $result;
    }
      return true;
  }else{
    return false;
  }
}

public function generate_id($max){

    $rand = "";
    $rand_count = rand(4,$max);
    for($i=0;$i<$rand_count;$i++){
      $r=rand(0,9);
      $rand .= $r;
    }
    return $rand;
}

}