<?php

namespace App\Model;

use App\DAO\CadastroDAO;

class CadastroModel extends Model
{
    public $id, $nome, $email, $senha;

    public function save()
    {
        $dao = new CadastroDAO();

        if(empty($this->id)) 
        {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getById(int $id)
    {
        $dao = new CadastroDAO();

        return $dao->selectById($id);
    }

    public function getAllRows()
    {       
        $dao = new CadastroDAO();

        $this->rows = $dao->select();
    }

    public function delete(int $id)
    {
        $dao = new CadastroDAO();

        $dao->delete($id);
    }
}