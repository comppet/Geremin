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
			$this->pdo->setCollection('usuario');
		}
		catch(MongoException $ex){
			throw new Exception("Erro de conexão: ".$ex->getMessage());
		}
	}

	public function create(Usuario $usuario){
		$this->pdo->insert(self::usuarioArray($usuario));
	}

    public function find(Usuario $usuario){
		return $this->pdo->find(self::emailUsuarioArray($usuario));
    }

    public function findAll(){
		return $this->pdo->findAll();
    }

    public function update(Usuario $usAnterior, Usuario $usAtual){
    	return $this->pdo->update(self::usuarioArray($usAnterior), self::usuarioArray($usAtual));
    }

    public function delete(Usuario $usuario){
    	$this->pdo->remove(self::emailUsuarioArray($usuario));
    }

    public function login(Usuario $usuario){
        return $this->pdo->find(self::LoginArray($usuario));
    }

    private static function loginArray(Usuario $usuario){
        return array('email' => $usuario->getEmail(), 'senha' => $usuario->getSenha());
    }

    private static function emailUsuarioArray(Usuario $usuario){
        return $this->pdo->createArray('e-mail',$usuario->getEmail());
    }

    private static function usuarioArray(Usuario $usuario){
        return array(
                'nome' => $usuario->getNome(),
                'email' => $usuario->getEmail(),
                'senha' => $usuario->getSenha(),
                'nivel' => $usuario->getNivel(),
                'cpf' => $usuario->getCpf()
                );
    }
}

?>