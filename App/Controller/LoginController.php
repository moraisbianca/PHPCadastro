<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginController extends Controller
{
    //LOGIN
    public static function index()
    {
        parent::render('Login/FormLogin');
    }


    public static function auth()
    {
        $login = new LoginModel();

        $login->email = $_POST['email'];
        $login->senha = $_POST['senha'];

        $usuario_logado = $login->autenticar();

        if ($usuario_logado !== null) 
        {

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