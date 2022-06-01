<?php

class FuncionarioModel
{
   
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco, $cargo, $horarioentrada, $horariosaida, $salario;


    public function save()
    {
        include 'DAO/FuncionarioDAO.php';

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
        include 'DAO/FuncionarioDAO.php';

        $dao = new FuncionarioDAO();

        $this->rows = $dao->select();
    }


    public function getById(int $id)
    {
        include 'DAO/FuncionarioDAO.php';

        $dao = new FuncionarioDAO();

        return $dao->selectById($id);
    }

    public function delete(int $id)
    {
        include 'DAO/FuncionarioDAO.php'; // Incluíndo o arquivo DAO

        $dao = new FuncionarioDAO();

        $dao->delete($id);
    }
}