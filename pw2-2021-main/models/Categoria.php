<?php


class Categoria{

    private $id;
    private $descricao;

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
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

}