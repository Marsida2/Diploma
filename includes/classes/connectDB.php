<?php

// Singleton to connect db.
class ConnectDB {
  // Hold the class instance.
  private static $instance = null;
  private $con;
  
  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $name = "fti_uni";
   
  // The db connection is established in the private constructor.
  private function __construct()
  {
    $this->con = new mysqli($this->host, $this->user, $this->pass, $this->name);
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new ConnectDb();
    }
   
    return self::$instance;
  }
  
  public function getConnection()
  {
    return $this->con;
  }
}

//thirrja ne main
//$instance = ConnectDb::getInstance();
//$conn = $instance->getConnection();

?>