<?php

class CategoriaProdutoController
{
    public static function index() 
    {
        include 'Model/CategoriaProduto.php';

        $model = new CategoriaProdutoModel();
        $model->getAllRows();

        include 'View/modules/CategoriaProduto/ListaCategorias.Produto.php';
    }

    public static function form()
    {
        include 'Model/CategoriaProduto.php';

        $model = new CategoriaProdutoModel();

        if(isset($_GET['id']))
        {
            $model = $model->getById($_GET['id']);
        }
        include 'View/modules/CategoriaProduto/formCategoriaProduto.php';
    }

    public static function save()
    {
        include 'Model/CategoriaProduto.php';

        $categoria_produto = new CategoriaProdutoModel();
        $categoria_produto->id = $_POST['id'];
        $categoria_produto->descricao = $_POST['descricao'];

        $categoria_produto->save();

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
