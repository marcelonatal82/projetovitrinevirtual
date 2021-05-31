<?php
require_once "Conexao.php";
require_once "../models/Cadastro.php";

class CadastroController{

    private static $instance;
    private $conexao;

    /**
     * @return mixed
     */
    public static function getInstance(){
    if (self::$instance == null){
        self::$instance = new CadastroController();
    }
    return self::$instance;
}

    private function __construct(){
    $this->conexao = Conexao::getInstance();
}

    public function gravar(Cadastro $usuarios){
    if ($usuarios->getId() == null){
        return $this->inserir($usuarios);
    }else{
        return $this->alterar($usuarios);
    }
}

    private function alterar(Cadastro $usuarios){
    $sql = "UPDATE usuarios SET login = :login, senha = :senha WHERE id = :id";
    $statement = $this->conexao->prepare($sql);
    $statement->bindValue(":login", $usuarios->getLogin());
    $statement->bindValue(":id", $usuarios->getId());
    $statement->bindValue(":senha", $usuarios->getSenha());
    return $statement->execute();
}

    private function inserir(Cadastro $usuarios){
    $sql = "INSERT INTO usuarios (login,senha) VALUES (:login,:senha)";
    $statement = $this->conexao->prepare($sql);
    $statement->bindValue(":login", $usuarios->getLogin());
        $statement->bindValue(":senha", $usuarios->getSenha());
    return $statement->execute();
}

    public function getTodos(){
    $lstRetorno = array();
    $sql = "SELECT * FROM usuarios ORDER BY login";
    $statement = $this->conexao->query($sql, PDO::FETCH_ASSOC);
    foreach ($statement as $row){
        $lstRetorno[] = $this->preencherUsuarios($row);
    }
    return $lstRetorno;
}

    public function getusuarios($id){
    $usuarios = new Cadastro();
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $statement = $this->conexao->prepare($sql);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $retornoBanco = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($retornoBanco as $row){
        $usuarios = $this->preencherUsuarios($row);
    }
    return $usuarios;
}

    private function preencherUsuarios($row){
    $usuarios = new Cadastro();
    $usuarios->setId($row['id']);
    $usuarios->setLogin($row['login']);
    $usuarios->setSenha($row['senha']);
    return $usuarios;
}

    public function delete($id){
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $statement = $this->conexao->prepare($sql);
    $statement->bindValue(":id", $id);
    return $statement->execute();
}

}