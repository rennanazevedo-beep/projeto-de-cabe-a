<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'pessoa.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $POST["nome"] ?? '';
    $user = $POST["user"] ?? '';
    $email = $POST["email"] ?? '';

    $pessoa = new Pessoa ($nome, $user, $email);

    if ($pessoa->inserir()) {
        echo "<p>Cadastro feito com sucesso</p><br/>";
        echo '<a href="index.html">Voltar para home</a><br/>';
        header("refresh:3;url=index.html");
        echo 'Redirecionando a pagina em 3 segudos!';
    } else {
        echo "Erro, nao foi possivel inserir no banco de dados<br/>";
        header("refresh:3;url=index.php");
        echo 'Redirecionado a pagina em 3 segundos!';
    }
} else {
    header("Location: index.php");
    exit();
}
?>