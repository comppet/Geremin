<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\DAO\mongodb;

class Factory extends \GEREMIN\DAO\Factory{

	public function getMinicursoDAO(){
		return new MinicursoDAO();
	}
	
	public function getUsuarioDAO(){
		return new UsuarioDAO(); 
	}

	public function getCertificadoDAO(){
		return new CertificadoDAO();
	}

}

?>