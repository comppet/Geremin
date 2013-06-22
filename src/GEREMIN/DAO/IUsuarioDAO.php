<?php

namespace GEREMIN\DAO;

use GEREMIN\Model\Usuario;

interface IUsuarioDAO{
	/**
     * Insere o novo Usuario no BD
     * @param Usuario $Usuario
     * @throws DAOException
     */
    public function create(Usuario $usuario);

    /**
     * Recupera o Usuario a partir do login
     * @param type $login
     * @return Usuario
     * @throws DAOException
     */
    public function find(Usuario $usuario);

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
    public function update(Usuario $usAnterior, Usuario $usAtual);

    /**
     * Remove o Usuario do BD
     * @param type $idate(format)
     * @throws DAOException
     */
    public function delete(Usuario $usuario);

    /**
     * Confere se o Usuario existe no BD
     * @param type $login, type $senha
     * @throws DAOException
     */

    public function login(Usuario $usuario);
}

?>