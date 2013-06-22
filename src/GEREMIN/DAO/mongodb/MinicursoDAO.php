<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

use GEREMIN\DAO\IMinicursoDAO,
	GEREMIN\Model\Minicurso,
    GEREMIN\Model\Usuario;

class MinicursoDAO implements IMinicursoDAO{

	private $pdo;

	public function __construct(){
		try{
			$this->pdo = Connection::Instance()->get();
			$this->pdo->setCollection('minicurso');
		}
		catch(MongoException $ex){
			throw new Exception("Erro de conexão: ".$ex->getMessage());
		}
	}

	public function create(Minicurso $minicurso){
		$this->pdo->insert(self::minicursoArray($minicurso));
	}

    public function find(Minicurso $minicurso){
		return $this->pdo->find(self::descMinicursoArray($minicurso));
    }

    public function findAll(){
		return $this->pdo->findAll();
    }

    public function update(Minicurso $minAnterior, Minicurso $minAtual){
    	$this->pdo->update(self::minicursoArray($minAnterior),self::minicursoArray($minAtual));
    }

    public function delete(Minicurso $minicurso){
    	$this->pdo->remove(self::descMinicursoArray($minicurso));
    }

    public function newParticipante(Usuario $usuario){
        $this->pdo->insert(UsuarioDAO::usuarioArray($usuario));
    }

    private static function minicursoArray(Minicurso $minicurso){
    	return array(
    			'nome' => $minicurso->getNome(),
                'descricao' => $minicurso->getDescricao(),
                'responsaveis' => $minicurso->getResponsaveis(),
    			'periodo' => $minicurso->getPeriodo(),
    			'qtdAulas' => $minicurso->getQtdAulas(),
    			'dataInicio' => $minicurso->getDataInicio(),
    			'dataFim' => $minicurso->getDataFim()
    			);
    }

    private static function descMinicursoArray(Minicurso $minicurso){
    	return array('nome' => $minicurso->getNome(), 'periodo' => $minicurso->getPeriodo());
    }
}

?>