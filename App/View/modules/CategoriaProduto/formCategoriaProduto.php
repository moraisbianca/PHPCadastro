<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria de Produtos</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/categoriaproduto/save" method="post">
        <fieldset>
            <legend>Categoria do Produto:</legend>
            
            <input name="id" 
                   id="id" 
                   type="hidden" 
                   value="<?= $model->id ?>" />
            
            <label for="descricao">descricao:</label>
            <input name="descricao" 
                   id="descricao" 
                   type="text"
                   value="<?= $model->descricao ?>"/> <br>

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>