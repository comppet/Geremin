<?php

/*
 * Desenvolvido por: Pablo Henrique Penha Silva
 * Github: pablohenrique
 */

namespace GEREMIN\DAO\mongodb;

use \MongoClient;

class PDOMongo{
	public $database;
	public $connection;
	public $collection;
	
	public function __construct($host = 'localhost:27017', $database = null, $dbauth = 'admin', $username = null, $password = null){
		try{
			$serverString = "mongodb://";
			if(is_null($username) )
				$serverString .= $host . "/" . $dbauth;
			else
				$serverString .= $username . ":" . $password . "@" . $host . "/" . $dbauth;
			
			$this->connection = new MongoClient($serverString);
			self::setDatabase($database);
		}
		catch(MongoException $e){
			echo $e;
		}
	}

	public function getObjects($input){
		switch ($input) {
			case 'connection':
				return $this->connection;
			case 'database':
				return $this->database;
			case 'collection':
				return $this->collection;
			default:
				return null;
		}
	}

	public function setDatabase($input){ $this->database = $this->connection->selectDB($input); }

	public function setCollection($input){ $this->collection = $this->database->selectCollection($input); }

	public function find($input){
		$mongoCursor = $this->collection->find($input);
		return self::cursorToArray($mongoCursor);
	}

	public function insert($input){ $this->collection->insert($input); }

	public function count($input){ return $this->collection->count($input);  }

	public function update($input1, $input2){ $this->collection->update($input1, $input2); }

	public function ensureIndex($args){ return $this->collection->ensureIndex($args); }
 
    public function findAll(){
        $mongoCursor = $this->collection->find();
        return self::cursorToArray($mongoCursor);
    }
 
    public function delete($f, $one = FALSE){
        $c = $this->collection->remove($f, $one);
        return $c;
    }

    private static function cursorToArray($mongoCursor) {
    	$resultSet = array();
    	$index = 0;
        while( $mongoCursor->hasNext()){
            $resultSet[$index] = $mongoCursor->getNext();
            $index++;
        }
        return $resultSet;
    }
}

	// public function createArray($index, $value){
	// 	if($index == 'id')
	// 		return array('_id' => new MongoID($value));
	// 	else
	// 		return array($index => $value);
	// }

    // public function get($index, $value){
    //     $mongoCursor = $this->collection->find(self::createArray($index, $value));
    //     $resultSet = array();
    //     $index = 0;
    //     while( $mongoCursor->hasNext()){
    //         $resultSet[$index] = $mongoCursor->getNext();
    //         $index++;
    //     }
    //     return $resultSet;
    // }
 #
 # Exemplo de uso do PDOMongo passando o host e o banco de dados
 #
/*
$host = 'localhost';
$database = 'test';
$t = new PDOMongo($host,$database);
$t->setCollection('things');
var_dump($t->get('id','51b6a1a2082d86d6c66faaae'));
*/

 #
 # Exemplo de uso do PDOMongo com valores padroes
 #
/*
$t = new PDOMongo();
$t->setDatabase('test');
$t->setCollection('things');
var_dump($t->get(array('a'=>1)));
var_dump($t->get('id','51b6a1a2082d86d6c66faaae'));
*/
?>
