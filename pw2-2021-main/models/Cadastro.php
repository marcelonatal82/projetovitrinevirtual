<?php


class Cadastro{

    private $id;
    private $login;
    private $senha;

    public function __construct(){
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        //return this.id; / Código em java
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login= $login;
    }


    /**
     * @return mixed Senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha= $senha;
    }


}