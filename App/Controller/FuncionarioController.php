<?php

namespace App\Controller;

use App\Model\FuncionarioModel;

class FuncionarioController extends Controller
{
   
    public static function index() 
    {
        parent::isAuthenticated();

        $model = new FuncionarioModel();
        $model->getAllRows();

        parent::render('Funcionario/ListaFuncionarios', $model);
    }


    public static function form()
    {
        parent::isAuthenticated();

        $model = new FuncionarioModel();
        
        if(isset($_GET['id']))
            $model = $model->getById($_GET['id']);

            parent::render('Funcionario/FormFuncionario', $model);
    }

    public static function save() 
    {
        parent::isAuthenticated();
             
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
        parent::isAuthenticated();
        
        $model = new FuncionarioModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a vari?vel $_GET como inteiro para o m?todo delete

        header("Location: /funcionario"); // redirecionando o usu?rio para outra rota.
    }

}
