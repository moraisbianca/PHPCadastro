<?php

namespace App\Controller;

use App\Model\ProdutoModel;

class ProdutoController extends Controller
{
    public static function index() 
    {
        parent::isAuthenticated();

        $model = new ProdutoModel();
        $model->getAllRows();

        parent::render('Produto/ListaProduto', $model);
    }

    public static function form()
    {
        parent::isAuthenticated();

        $model = new ProdutoModel();

        if(isset($_GET['id']))
        {
            $model = $model->getById($_GET['id']);
        }

        parent::render('Produto/ProdutoCadastro', $model);
    }

    public static function save()
    {
        parent::isAuthenticated();
        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $model = new ProdutoModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->preco = $_POST['preco'];
        $model->descricao = $_POST['descricao'];

        $model->save();  // chamando o método save da model.

        header("Location: /produto"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        parent::isAuthenticated();

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /produto"); // redirecionando o usuário para outra rota.

    }

}
