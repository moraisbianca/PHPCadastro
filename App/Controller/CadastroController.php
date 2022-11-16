<?php

namespace App\Controller;

use App\Model\CadastroModel;


class CadastroController extends Controller
{
    public static function index()
    {
        $model = new CadastroModel();
        $model->getAllRows();

        parent::render('Cadastro/ListaUsuarios', $model);
    }

    public static function form()
    {
        $model = new CadastroModel();

        if(isset($_GET['id']))
            $model = $model->getById($_GET['id']);

        parent::render('Cadastro/CadastroUsuario', $model);
    }

    public static function save()
    {
        $cadastro = new CadastroModel();
        $cadastro->id = $_POST['id'];
        $cadastro->nome = $_POST['nome'];
        $cadastro->email = $_POST['email'];
        $cadastro->senha = $_POST['senha'];

        $cadastro->save();

        header("Location: /cadastrar");
    }

    public static function delete()
    {
        $model = new CadastroModel();

        $model->delete( (int) $_GET['id'] );

        header("Location: /cadastrar");

    }

}