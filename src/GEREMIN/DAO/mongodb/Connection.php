<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

class Connection {
  //configuration
  private static $host = 'localhost';
  private static $database = 'geremin';
  private static $username = 'geremin';
  private static $password = '123456';
  private static $dbauth = 'admin'; //default value
  private static $instance = null;
  private $con = null;

  //Connect to the database
  private function __construct(){
    $this->con = new PDOMongo(self::$host,self::$database,self::$username,self::$password,self::$dbauth);
  }

  public static function Instance() {
    if(self::$instance == null)
      self::$instance = new Connection();
    return self::$instance;
  }

  public function get() {
    return $this->con;
  }

} 
?>
