<table>

    <tr>
        <th></th>
        <th>Id</th>
        <th>Nome</th>
        <th>Data de Nasc.</th>
        <th>Cargo</th>
        <th>Salario</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Telefone</th>

    </tr>

    <?php foreach($model->rows as $item): ?>
    <tr>
                
        <td>
            <a href="/funcionario/delete?id=<?= $item['id'] ?>">X</a>
        </td>
        <td><?= $item['id'] ?></td>
        <td>
            <a href="/funcionario/form?id=<?= $item['id'] ?>"><?= $item['nome'] ?></a> 
        </td>
        <td><?= $item['data_nascimento'] ?></td>
        <td><?= $item['cargo'] ?></td>
        <td><?= $item['salario'] ?></td>
        <td><?= $item['horarioentrada'] ?></td>
        <td><?= $item['horariosaida'] ?></td>
        <td><?= $item['telefone'] ?></td>
        
    </tr>
    <?php endforeach ?>

</table>
