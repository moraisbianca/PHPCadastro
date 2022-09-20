<?php

namespace Controller;
use FuncionarioModel;

class FuncionarioController 
{
   
    public static function index() 
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();
        $model->getAllRows();

        include 'View/modules/Funcionario/ListaFuncionarios.php';
    }


    public static function form()
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();
        
        if(isset($_GET['id']))
            $model = $model->getById($_GET['id']);

        include 'View/modules/Funcionario/FormFuncionario.php';
    }

    public static function save() {

        include 'Model/FuncionarioModel.php';
        
        $model = new FuncionarioModel();
        $model->id = $_POST['id'];
        
        $model->nome = $_POST['nome'];
        $model->rg = $_POST['rg'];
        $model->cpf = $_POST['cpf'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->email = $_POST['email'];
        $model->telefone = $_POST['telefone'];
        $model->endereco = $_POST['endereco'];
        $model->cargo = $_POST['cargo'];
        $model->horarioentrada = $_POST['horarioentrada'];
        $model->horariosaida = $_POST['horariosaida'];
        $model->salario = $_POST['salario'];

        $model->save();

        header("Location: /funcionario");
        
    }

    public static function delete()
    {
        include 'Model/FuncionarioModel.php'; // inclus?o do arquivo model.

        $model = new FuncionarioModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a vari?vel $_GET como inteiro para o m?todo delete

        header("Location: /funcionario"); // redirecionando o usu?rio para outra rota.
    }

}
