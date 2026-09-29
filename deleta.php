<?php
// Inclui o arquivo da classe Pessoa
require_once 'pessoa.php';

// Verifica se o parâmetro 'id' foi enviado através da URL (método GET)
if (isset($_GET['id'])) {
    // Captura o ID da URL
    $id = $_GET['id'];
    
    // Remove somente o registro identificado pelo ID
    Pessoa::deletar($id);
    header("Location: Consulta.php");
    exit();
} else {
    // Se o ID não foi fornecido na URL, redireciona imediatamente para a consulta
    header("Location: Consulta.php");
}
// Encerra imediatamente a execução do script
exit();
?>