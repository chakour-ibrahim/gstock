<?php
class BDH {
    static $DEBUG = true;
    private static $instance = null;
    private $conn;
    
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "gstock";

    private function __construct()
    {

      $lien_db = "mysql:host={$this->host};dbname={$this->name}";
  
      try {
        
        $this->conn = new PDO($lien_db, $this->user,$this->pass);  
        
        if(self::$DEBUG){
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
      } catch (PDOException $e) {
          die("Echec connexion: ".$e->getMessage());
      }
  
    }

  public static function getInstance()
  {
    if(!self::$instance){
      self::$instance = new BDH();
    }
   
    return self::$instance; 
  }
  
  public function getConnection()
  {
    return $this->conn;
  }

  public static function connexion(){
    return BDH::getInstance()->getConnection();
  }

  public static function prepare($sql){
    return BDH::getInstance()->getConnection()->prepare($sql);
  }
  
  public static function execSelectOne($sql){
    $req = BDH::connexion()->prepare($sql);
    $req->execute();
    $result = $req->fetch();
    return $result;
  }
  
  public static function exec($sql){
    $req = BDH::connexion()->prepare($sql);
    $req->execute();
  }

  public static function update($table, $label, $label_value, $data){
    $str_query = "";
    
    foreach($data as $key => $value){
        $str_query .= "{$key}=:{$key},";
    }
    
    $str_query = substr($str_query, 0, -1);

    $sql = "update {$table} set {$str_query} where $label=$label_value";
    var_dump($sql);
    $req = BDH::prepare($sql);

    foreach($data as $key => $value){
      $req->bindValue(":{$key}", $value);
    }

    $statut = $req->execute(); 
    return $statut;
  }

    
  public static function insert($table, $data){
    $str_val = "";
    $str_label = "";
    
    foreach($data as $key => $value){
        $str_label .= " {$key},";
        $str_val .= ":{$key},";
    }

    $str_label = substr($str_label, 0, -1);
    $str_val = substr($str_val, 0, -1);

    $sql = "insert into {$table} ($str_label) values ($str_val);";
    $req = BDH::prepare($sql);
    
    foreach($data as $key => $value){
      $req->bindValue(":$key", $value);
    }

    $statut = $req->execute();
    return $statut;
  }


  public static function delete($table, $label, $value){
      $sql = "delete from {$table} where {$label}={$value};";
      $req = BDH::connexion()->prepare($sql);
      $statut =$req->execute();
      return $statut;
  }

  
  public static function get($table, $label, $value){
    $sql = "select * from $table where $label=$value;";
    $req = BDH::connexion()->prepare($sql);
    $req->execute();
    $result = $req->fetch();
    return $result;
  }

  
  public static function getAll($table){
    $sql = "select * from $table;";
    $req = BDH::connexion()->prepare($sql);
    $req->execute();
    $result = $req->fetchAll();
    return $result;
  }

  public static function execSelectAll($sql){
    $req = BDH::connexion()->prepare($sql);
    $req->execute();
    $result = $req->fetchAll();
    return $result;
  }
}
