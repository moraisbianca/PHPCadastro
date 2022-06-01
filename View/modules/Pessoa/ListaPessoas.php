<table>
    <tr>
        <th></th>
        <th></th>
        <th>Id</th>
        <th></th>
        <th>Nome</th>
        <th></th>
        <th>Data de Nasc.</th>
        <th></th>
        <th>CPF</th>
        <th></th>
        <th>RG</th>

    </tr>

    <?php foreach($model->rows as $item): ?>
    <tr>      
        <td>
            <a href="/pessoa/delete?id=<?= $item['id'] ?>">X</a>
        </td>
        <th></th>
        <td><?= $item['id'] ?></td> 
        <th></th>
        <!-- Transformando o nome registrado em um link que leva a sua própria listagem-->
        <td>
            <a href="/pessoa/form?id=<?= $item['id'] ?>"><?= $item['nome'] ?></a> 
        </td>
        <th></th>
        <td><?= $item['data_nascimento'] ?></td>
        <th></th>
        <td><?= $item['rg'] ?></td>
        <th></th>
        <td><?= $item['cpf'] ?></td>
        <th></th>
        <td><?= $item['telefone'] ?></td>
        
    </tr>
    <?php endforeach ?>

</table>