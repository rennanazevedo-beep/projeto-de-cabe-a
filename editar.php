<?php
// Inclui o arquivo da classe Pessoa
require_once 'pessoa.php';

$pessoaData = null;
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $user = $_POST['user'] ?? '';
    $email = $_POST['email'] ?? '';

    if (Pessoa::atualizar($id, $nome, $user, $email)) {
        header("Location: Consulta.php");
        exit();
    }
    $erro = 'Não foi possível salvar as alterações.';
    $pessoaData = Pessoa::buscarPorId($id);
    if ($pessoaData) {
        $pessoaData['nome'] = $nome;
        $pessoaData['user'] = $user;
        $pessoaData['email'] = $email;
    }
} else {
    $pessoaData = Pessoa::buscarPorId($_GET['id'] ?? null);
}

if (!$pessoaData) {
    header("Location: Consulta.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Editar Cadastro</title></head>
<body>
    <h3>Editar Cadastro</h3>
    <?php if ($erro !== ''): ?>
        <p><?php echo htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($pessoaData['id'], ENT_QUOTES, 'UTF-8'); ?>">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($pessoaData['nome'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
        User: <input type="text" name="user" value="<?php echo htmlspecialchars($pessoaData['user'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($pessoaData['email'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>