<?php
require_once 'pessoa.php';
$pessoas = Pessoa::listarTodos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pessoas cadastradas</title>
</head>
<body>
    <h3>lista de pessoas cadastradas</h3>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>User</th>
                <th>email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pessoas)): ?>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pessoa['id']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['nome']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['user']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['email']); ?></td>
                        <td class="actions-cell">
                            <div class="actions">
                                <a class="row-action row-action--edit" href="editar.php?id=<?php echo $pessoa['id']; ?>">Editar</a>
                                <a class="row-action row-action--delete" href="deleta.php?id=<?php echo $pessoa['id']; ?>"
                                onclick="return confirm('Deseja realmente excluir esta pessoa?')">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr><td colspan="5">Nenhum registro encontrado.</td></tr>
        <?php endif; ?>
    </table>
</body> 
</html>