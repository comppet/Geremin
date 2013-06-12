<?php

interface IUsuarioDAO{
	/**
     * Insere o novo Usuario no BD
     * @param Usuario $Usuario
     * @throws DAOException
     */
    public function post(Usuario $input);

    /**
     * Recupera o Usuario a partir do login
     * @param type $login
     * @return Usuario
     * @throws DAOException
     */
    public function get($login);

    /**
     * Recupera todas as Usuarioes
     * @return array Usuario
     * @throws DAOException
     */
    public function getAll();

    /**
     * Atualiza os atributos do Usuario no BD
     * @param Usuario $usuario
     * @throws DAOException
     */
    public function update(Usuario $usuario);

    /**
     * Remove o Usuario do BD
     * @param type $idate(format)
     * @throws DAOException
     */
    public function delete($id);

    /**
     * Confere se o Usuario existe no BD
     * @param type $login, type $senha
     * @throws DAOException
     */

?>