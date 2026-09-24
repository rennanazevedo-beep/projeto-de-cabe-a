<?php
// Inclui o arquivo da classe Pessoa
require_once 'pessoa.php';

$pessoaData = null;

// Verifica se os dados foram enviados via método POST (quando clica em salvar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $user = $_POST['user'] ?? '';
    $email = $_POST['email'] ?? '';

    $pessoa = new Pessoa($id, $nome, $user, $email);
    
    if ($pessoa->atualizar()) {
        echo "Registro atualizado com sucesso!";
        header("refresh:2;url=consulta.php");
        exit();
    }
} 
// Se acessado via GET com ID, busca os dados para preencher o formulário
elseif (isset($_GET['id'])) {
    $pessoaData = Pessoa::buscarPorId($_GET['id']);
    if (!$pessoaData) {
        header("Location: consulta.php");
        exit();
    }
} else {
    header("Location: consulta.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Editar Cadastro</title></head>
<body>
    <h3>Editar Cadastro</h3>
    <form action="edita.php" method="post">
        <input type="hidden" name="id" value="<?php echo $pessoaData['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $pessoaData['nome']; ?>" required><br><br>
        User: <input type="text" name="user" value="<?php echo $pessoaData['user']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $pessoaData['email']; ?>" required><br><br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>