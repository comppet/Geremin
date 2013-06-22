<?php

/*
 * Desenvolvido por: Jackson Andrade Goulart
 * Github: jacksongoulart
 */

namespace GEREMIN\Model;

class Minicurso {

	private $certificado;
	private $nome;
	private $descricao;
	private $participantes;
	private $periodo;
	private $qtdAulas;
	private $responsaveis;
	private $dataInicio;
	private $dataFim;

	public function setCertificado($certificado) {
		$this->certificado = $certificado;
	}

	public function getCertificado() {
		return $this->certificado;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setParticipantes($participantes) {
		$this->participantes = $participantes;
	}

	public function getParticipantes() {
		return $this->participantes;
	}

	// public function newParticipante(Usuario $usuario) {
	// 	array_push($this->participantes,$usuario);
	// }

	// public function newResponsavel($Usuario $usuario) {
	// 	array_push($this->responsaveis,$usuario);
	// }

	public function setPeriodo($periodo) {
		$this->periodo = $periodo;
	}

	public function getPeriodo() {
		return $this->periodo;
	}

	public function setResponsaveis($responsaveis) {
		$this->responsaveis = $responsaveis;
	}

	public function getResponsaveis() {
		return $this->responsaveis;
	}

	public function setQtdAulas($qtdAulas) {
		$this->qtdAulas = $qtdAulas;
	}

	public function getQtdAulas() {
		return $this->qtdAulas;
	}

	public function setDataInicio($dataInicio) {
		$this->dataInicio = $dataInicio;
	}

	public function getDataInicio() {
		return $this->dataInicio;
	}

	public function setDataFim($dataFim) {
		$this->dataFim = $dataFim;
	}

	public function getDataFim() {
		return $this->dataFim;
	}

}

?>