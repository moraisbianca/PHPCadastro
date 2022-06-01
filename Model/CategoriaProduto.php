<?php

class CategoriaProdutoModel
{
    public $id, $descricao;

    public function save()
    {
        include 'DAO/CategoriaProdutoDAO.php';

        $dao = new CategoriaProdutoDAO();

        if($this->id == null) 
        {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/CategoriaProdutoDAO.php';

        $dao = new CategoriaProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/CategoriaProdutoDAO.php';

        $dao = new CategoriaProdutoDAO();

        return $dao->selectById($id);
    }

    public function delete(int $id)
    {
        include 'DAO/CategoriaProdutoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new CategoriaProdutoDAO();

        $dao->delete($id);
    }
}