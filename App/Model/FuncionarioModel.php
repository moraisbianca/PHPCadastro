<?php

namespace App\Model;

use App\DAO\FuncionarioDAO;

class FuncionarioModel extends Model
{
   
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco, $cargo, $horarioentrada, $horariosaida, $salario;


    public function save()
    {
        $dao = new FuncionarioDAO();

        if($this->id == null) 
        {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }


    public function getAllRows()
    {
        $dao = new FuncionarioDAO();

        $this->rows = $dao->select();
    }


    public function getById(int $id)
    {
        $dao = new FuncionarioDAO();

        return $dao->selectById($id);
    }

    public function delete(int $id)
    {
        $dao = new FuncionarioDAO();

        $dao->delete($id);
    }
}