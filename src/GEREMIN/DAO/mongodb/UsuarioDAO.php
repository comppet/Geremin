<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */


namespace GEREMIN\DAO\mongodb;

use GEREMIN\DAO\IUsuarioDAO,
	GEREMIN\Model\Usuario;

class UsuarioDAO implements IUsuarioDAO{

	public function create(Usuario $input){
		try{
			$stm = Connection::Instance()->get();
			$stm->setCollection('user');
			$stm->insert($input);
		}
		catch(MongoException $ex){
			throw new Exception("Ao criar usuário: ".$ex->getMessage());
		}
	}

    public function find($login){
    	try{
			$stm = Connection::Instance()->get();
			$stm->setCollection('user');
			return $stm->get('login',$login);
		}
		catch(MongoException $ex){
			throw new Exception("Ao procurar [GET] Usuario: ".$ex->getMessage());
		}
    }

    public function findAll(){
    	try{
	    	$stm = Connection::Instance()->get();
			$stm->setCollection('user');
			$stm->getAll();
		}
		catch(MongoException $ex){
			throw new Exception("Ao procurar [GETALL] Usuario: ".$ex->getMessage());
		}

    }

    public function update(Usuario $usuario){
    	try{
	    	$stm = Connection::Instance()->get();
			$stm->setCollection('user');
		}
		catch(MongoException $ex){
			throw new Exception("Ao atualizar Usuario: ".$ex->getMessage());
		}
    }

    public function delete(Usuario $usuario){
    	try{
			$stm = Connection::Instance()->get();
			$stm->setCollection('user');
		}
		catch(MongoException $ex){
			throw new Exception("Ao deletar Usuario: ".$ex->getMessage());
		}
    }
}

?>