<?php
// Inclui o arquivo da classe Pessoa
require_once 'pessoa.php';

// Verifica se o parâmetro 'id' foi enviado através da URL (método GET)
if (isset($_GET['id'])) {
    // Captura o ID da URL
    $id = $_GET['id'];
    
    // Chama o método estático deletar() passando o ID para remover do banco
    if (Pessoa::deletar($id)) {
        echo "<p>Registro excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir o registro.</p>";
    }
    
    // Configura o cabeçalho para redirecionar automaticamente para a consulta após 2 segundos
    header("refresh:2;url=consulta.php");
    echo "Redirecionando...";
} else {
    // Se o ID não foi fornecido na URL, redireciona imediatamente para a consulta
    header("Location: consulta.php");
}
// Encerra imediatamente a execução do script
exit();
?>