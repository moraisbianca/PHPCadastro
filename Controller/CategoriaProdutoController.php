<?php

namespace Controller;
use CategoriaProdutoModel;

class CategoriaProdutoController extends Controller
{
    public static function index() 
    {
        include 'Model/CategoriaProduto.php';

        $model = new CategoriaProdutoModel();
        $model->getAllRows();

        parent::render('View/modules/CategoriaProduto/ListaCategorias.Produto', $model);
    }

    public static function form()
    {
        include 'Model/CategoriaProduto.php';

        $model = new CategoriaProdutoModel();

        if(isset($_GET['id']))
        {
            $model = $model->getById($_GET['id']);
        }
        parent::render('View/modules/CategoriaProduto/formCategoriasProduto', $model);
    }

    public static function save()
    {
        include 'Model/CategoriaProduto.php';

        $model = new CategoriaProdutoModel();
        $model->id = $_POST['id'];
        $model->descricao = $_POST['descricao'];

        $model->save();

        header("Location: /categoriaproduto");
    }

    public static function delete()
    {
        include 'Model/CategoriaProduto.php'; // inclus?o do arquivo model.

        $model = new CategoriaProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a vari?vel $_GET como inteiro para o m?todo delete

        header("Location: /categoriaproduto"); // redirecionando o usu?rio para outra rota.
    }

}
