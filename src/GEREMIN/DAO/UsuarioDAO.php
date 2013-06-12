<?php

include_once 'Connection.php';

class UsuarioDAO{

	public function post(Usuario $input){
		try{
			$stm = Connection::Instance()->get();
			$stm->setCollection('user');
			$stm->insert($input);
		}
		catch(MongoException $ex){
			throw new Exception("Ao criar usuário: ".$ex->getMessage());
		}
	}

    public function get($login){
    	try{
			$stm = Connection::Instance()->get();
			$stm->setCollection('user');
			return $stm->get('nome',$login);
		}
		catch(MongoException $ex){
			throw new Exception("Ao procurar [GET] Usuario: ".$ex->getMessage());
		}
    }

    public function getAll(){
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

    public function delete($id){
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