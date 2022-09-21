<?php

namespace App\Model;

use App\DAO\PessoaDAO;

class PessoaModel extends Model
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {

        $dao = new PessoaDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update porque a chave primária já existe.
        if(empty($this->id)) 
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }


    // getAllRows serve para a listagem dos registro, ele pega todas as linhas do banco
    public function getAllRows()
    {

        $dao = new PessoaDAO();

        $this->rows = $dao->select();
    }


    // getById serve para selecionar uma id especifica de um certo registro
    public function getById(int $id)
    {

        $dao = new PessoaDAO();

        return $dao->selectById($id);
    }

    public function delete(int $id)
    {

        $dao = new PessoaDAO();

        $dao->delete($id);
    }
}