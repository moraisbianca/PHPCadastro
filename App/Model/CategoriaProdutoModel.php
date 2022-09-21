<?php

namespace App\Model;

use App\DAO\CategoriaProdutoDAO;

class CategoriaProdutoModel extends Model
{
    public $id, $descricao;

    public function save()
    {
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
        $dao = new CategoriaProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new CategoriaProdutoDAO();

        return $dao->selectById($id);
    }

    public function delete(int $id)
    {
        $dao = new CategoriaProdutoDAO();

        $dao->delete($id);
    }
}