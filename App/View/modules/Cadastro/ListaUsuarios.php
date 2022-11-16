<table>
    <tr>
        <th></th>
        <th></th>
        <th>Nome</th>
        <th></th>
        <th>Email</th>
    </tr>

    <?php foreach($model->rows as $item): ?>
    <tr>
        <td>
            <a href="/cadastrar/delete?id=<?= $item['id'] ?>">X</a>
        </td>
        <th></th>
        <td>
            <a href="/cadastrar/form?id=<?= $item['id'] ?>"><?= $item['nome'] ?></a>
        </td>
        <th></th>
        <td><?= $item['email'] ?></td>

    </tr>
    <?php endforeach ?>

</table>