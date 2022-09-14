<?php

$servidor = "localhost:3308";
$usuario = "root";
$senha = "";
$bancodedados = "habito";

//abre a conexão com o banco de dados listadehabito
$conexao = new mysqli ($servidor
                      , $usuario
                      ,$senha
                      ,$bancodedados);

//verifica se houve erro ao abrir a conexão
if ($conexao->connect_error) {
    die("A conexão falhou: " . $conexao->connect_error);
}

//busca nome que foi recebido via get através do formulário de cadastro
$nome = $_POST["nome"];

//insere o hábito na tabela habito do banco de dados
$sql = "INSERT INTO habito (nome, status)
VALUES ('" .$nome."', 'A')";

//verifica se ocorreu tubem bem. caso houve erro, fecha a conexão e aborta o programa
if (!($conexao->query($sql)=== TRUE )) {
    $conexao->close();
    die("Erro: " . $sql . "<br>" . $conexao->error);
}

//fecha a conexão com o Banco de dados
$conexao->close();

//envia para a página index onde aparece a lista de hábitos já com o novo hábito cadastrado
header("Location: index.php");
?>