<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

use GEREMIN\DAO\IUsuarioDAO,
	GEREMIN\Model\Usuario;

class UsuarioDAO implements IUsuarioDAO{

	private $pdo;

	public function __construct(){
		try{
			$this->pdo = Connection::Instance()->get();
			$this->pdo->setCollection('user');
		}
		catch(MongoException $ex){
			throw new Exception("Erro de conexão: ".$ex->getMessage());
		}
	}

	public function create(Usuario $input){
		$this->pdo->insert($input);
	}

    public function find($login){
		return $this->pdo->get('login',$login);
    }

    public function findAll(){
		return $this->pdo->getAll();
    }

    public function update(Usuario $usuario){
    	//return $this->pdo->update();
    }

    public function delete(Usuario $usuario){
    	//$this->pdo->delete();
    }
}

?>