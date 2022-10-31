<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginController extends Controller
{
    //CADASTRO
    public static function form()
    {
        parent::isAuthenticated();

        $model = new LoginModel();

        if(isset($_GET['id']))
            $model = $model->getById($_GET['id']);

        parent::render('Login/CadastroUsuario', $model);
    }

    public static function save()
    {

    }

    public static function delete()
    {

    }


    //LOGIN
    public static function index()
    {
        parent::render('Login/FormLogin');
    }


    public static function auth()
    {
        $model = new LoginModel();

        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'];

        $usuario_logado = $model->autenticar();

        if ($usuario_logado !== null) {

            $_SESSION['usuario_logado'] = $usuario_logado;

            header("Location: /");

        } else
            header("Location: /login?erro=true");
    }


    public static function logout()
    {
        unset($_SESSION['usuario_logado']);

        parent::isAuthenticated();
    }
}