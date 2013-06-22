<?php

namespace GEREMIN\DAO;

use GEREMIN\Model\Minicurso;

interface IMinicursoDAO{
	/**
     * Insere o novo Usuario no BD
     * @param Usuario $Usuario
     * @throws DAOException
     */
    public function create(Minicurso $minicurso);

    /**
     * Recupera o Usuario a partir do login
     * @param type $login
     * @return Usuario
     * @throws DAOException
     */
    public function find(Minicurso $minicurso);

    /**
     * Recupera todas as Usuarioes
     * @return array Usuario
     * @throws DAOException
     */
    public function findAll();

    /**
     * Atualiza os atributos do Usuario no BD
     * @param Usuario $usuario
     * @throws DAOException
     */
    public function update(Minicurso $minAnterior, Minicurso $minAtual);

    /**
     * Remove o Usuario do BD
     * @param type $idate(format)
     * @throws DAOException
     */
    public function delete(Minicurso $minicurso);

    /**
     * Confere se o Usuario existe no BD
     * @param type $login, type $senha
     * @throws DAOException
     */
}

?>