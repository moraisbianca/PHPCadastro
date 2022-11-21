<?php

use App\Controller\ 
{
    LoginController,
    CadastroController,
    PessoaController,
    FuncionarioController,
    ProdutoController,
    CategoriaProdutoController
};

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch($uri_parse)
{
    ## ROTAS PARA CADASTRO
    case '/cadastrar':
        CadastroController::index();
    break;

    case '/cadastrar/form':
        CadastroController::form();
    break;

    case '/cadastrar/save':
        CadastroController::save();
    break;

    case '/cadastrar/delete':
        CadastroController::delete();
    break;

    ## ROTAS PARA LOGAR
    case '/login':
        LoginController::index();
    break;

    case '/login/auth':
        LoginController::auth();
    break;

    case '/logout':
        LoginController::logout();
    break;

    ## ROTAS PARA PESSOA
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;

    ## ROTAS PARA PRODUTO
    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form':
        ProdutoController::form();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;

    case '/produto/delete':
        ProdutoController::delete();
    break;
    
    ## ROTAS PARA CATEGORIA DE PRODUTO
    case '/categoriaproduto':
        CategoriaProdutoController::index();
    break;

    case '/categoriaproduto/form':
        CategoriaProdutoController::form();
    break;

    case '/categoriaproduto/save':
        CategoriaProdutoController::save();
    break;

    case '/categoriaproduto/delete':
        CategoriaProdutoController::delete();
    break;

    ## ROTAS PARA CATEGORIA FUNCIONARIO
    case '/funcionario':
        FuncionarioController::index();
    break;

    case '/funcionario/form':
        FuncionarioController::form();
    break;
    
    case '/funcionario/save':
        FuncionarioController::save();
    break;

    case '/funcionario/delete':
        FuncionarioController::delete();
    break;

    default:
        echo "oi";
    break;
}