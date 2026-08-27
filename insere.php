<?php
ini_set('display_erros', 1); ini_set('display_startup_erros', 1); erros_reporting(E_ALL);

//verifica se existe conexao com bd, caso nao tenta criar uma nova
$conexao = mysqli_connect("localhost","rennan","012831")//porta, usuario, senha
or die("erro na conexao com o banco de dados"); //caso nao consiga conectar mostra a 
                                                // mensagem de erro mostrada 
          
$select_db = mysqli_select_db($conexao, "novo"); // seleciona o banco de dados 

//abaixo atribuimos os valores provenientes do formulario pelo metodo post 
$nome = $_POST["nome"];
$user = $_POST["user"];
$email = $_POST["email"];

$string_sql = "insert into pessoa (id,nome,user,email) values (null,'$nome','$user','$email')";

mysqli_query($conexao, $string_sql); //realiza a consulta 

if(mysqli_affected_rows($conexao) == 1){
    echo "<p>Cadastro feito com sucesso<p/>";
    echo '<a href="index.html">voltar para pagina principal da empresa</a>';
} else {
    echo "erro, nao foi possivel inserir no banco de dados";
}

mysqli_close($conexao); //fecha conexao com banco de dados 
?>