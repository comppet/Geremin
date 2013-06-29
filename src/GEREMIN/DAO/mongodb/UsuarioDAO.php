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
		$this->pdo->insert(self::createArray($usuario));
	}

    public function find(Usuario $usuario){
		return $this->pdo->get('_id', $usuario->getEmail(), TRUE);
    }

    public function findAll(){
		return $this->pdo->getAll();
    }

    public function update(Usuario $usAnterior, Usuario $usAtual){
    	return $this->pdo->update(self::createArray($usAnterior), self::createArray($usAtual));
    }

    public function delete(Usuario $usuario){
    	$this->pdo->delete('_id', $usuario->getEmail());
    }

    public function login(Usuario $usuario){
        $login = $this->find($usuario);
        if($login['senha'] == self::hash($usuario->getSenha())){
            $login['senha'] = $usuario->getSenha();
            return $login;
        }
        return null;
    }

    private static function createArray(Usuario $usuario){
        return array(
                '_id' => $usuario->getEmail(),
                'nome' => $usuario->getNome(),
                'senha' => self::hash($usuario->getSenha()),
                'nivel' => $usuario->getNivel(),
                'cpf' => $usuario->getCpf()
                );
    }

    private static function hash($senha){
        return hash('md5',$senha);
    }
}

?>