<?php

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
        
        $pessoa = new FuncionarioModel();
        $pessoa->id = $_POST['id'];
        
        $pessoa->nome = $_POST['nome'];
        $pessoa->rg = $_POST['rg'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->data_nascimento = $_POST['data_nascimento'];
        $pessoa->email = $_POST['email'];
        $pessoa->telefone = $_POST['telefone'];
        $pessoa->endereco = $_POST['endereco'];
        $pessoa->cargo = $_POST['cargo'];
        $pessoa->horarioentrada = $_POST['horarioentrada'];
        $pessoa->horariosaida = $_POST['horariosaida'];
        $pessoa->salario = $_POST['salario'];

        $pessoa->save();

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
