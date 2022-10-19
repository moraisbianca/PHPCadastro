<?php

namespace App\Controller;

use App\Model\PessoaModel;

/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class PessoaController extends Controller
{
    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
        parent::isAuthenticated();

        $model = new PessoaModel();
        $model->getAllRows();

        parent::render('Pessoa/ListaPessoas', $model);
    }

   /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {
        parent::isAuthenticated();

        $model = new PessoaModel();
        
        if(isset($_GET['id'])) // se já existir id, então:
            $model = $model->getById($_GET['id']);

        parent::render('Pessoa/FormPessoa', $model);
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() 
    {
        parent::isAuthenticated();

        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $pessoa = new PessoaModel();
        $pessoa->id = $_POST['id']; // nesse caso, id esta incluido porque pode ser uma id ja existente (update) ou uma id nova (insert)
        $pessoa->nome = $_POST['nome'];
        $pessoa->rg = $_POST['rg'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->data_nascimento = $_POST['data_nascimento'];
        $pessoa->email = $_POST['email'];
        $pessoa->telefone = $_POST['telefone'];
        $pessoa->endereco = $_POST['endereco'];

        $pessoa->save();  // chamando o método save da model.

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        parent::isAuthenticated();
        
        $model = new PessoaModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.

    }
}
