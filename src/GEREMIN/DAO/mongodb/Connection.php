<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

class Connection {
  //configuration
  private static $database = 'geremin';
  private static $username = 'geremin';
  private static $password = '123456';
  private static $host = 'localhost';
  private static $instance = null;
  private $con = null;

  //Connect to the database
  private function __construct(){
    $this->con = new PDOMongo(self::$host,self::$database,'admin',self::$username,self::$password);
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
