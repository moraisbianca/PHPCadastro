<?php

class CategoriaProdutoDAO
{
    private $conexao;

    function __construct() 
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(CAtegoriaProdutoModel $model) 
    {  
        $sql = "INSERT INTO categoria_produto 
                (descricao) 
                VALUES (?)";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->descricao);

        $stmt->execute();      
    }

    public function select()
    {
        $sql = "SELECT * FROM categoria_produto";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public function selectById(int $id)
    {
        $sql = "SELECT * FROM categoria_produto WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }


    public function update(CategoriaProdutoModel $model)
    {
        $sql = "UPDATE categoria_produto set descricao=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id);
        $stmt->execute();
    }
    
    public function delete(int $id)
    {
        $sql = "DELETE FROM categoria_produto WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}