<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
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
                        <td>
                            <!--Links para editar e deletar passando o ID -->
                            <a href="edita.php?id=<?php echo $pessoa['id']; ?>">Editar</a>
                            <a href="deleta.php?id=<?php echo $pessoa['id']; ?>"
                            onclick="return confirm('deseja realmente excluir?')">Excluir</a/td>                  
                    </td>    
                <?php endforeach; ?>
            <?php else: ?>
            <tr><td colspan="5">Nenhum registro encontrado.</td></tr>
        <?php endif; ?>
    </table>
</body> 
</html>