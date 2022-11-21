<?php

namespace App\Controller;

use App\Model\CategoriaProdutoModel;

class CategoriaProdutoController extends Controller
{
    public static function index() 
    {
        parent::isAuthenticated();

        $model = new CategoriaProdutoModel();
        $model->getAllRows();

        parent::render('CategoriaProduto/ListaCategorias.Produto', $model);
    }

    public static function form()
    {
        parent::isAuthenticated();

        $model = new CategoriaProdutoModel();

        if(isset($_GET['id']))
        {
            $model = $model->getById($_GET['id']);
        }
        parent::render('CategoriaProduto/formCategoriaProduto', $model);
    }

    public static function save()
    {
        parent::isAuthenticated();

        $model = new CategoriaProdutoModel();
        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao'];

        $model->save();

        header("Location: /categoriaproduto");
    }

    public static function delete()
    {
        parent::isAuthenticated();
        
        $model = new CategoriaProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a vari?vel $_GET como inteiro para o m?todo delete

        header("Location: /categoriaproduto"); // redirecionando o usu?rio para outra rota.
    }

}
