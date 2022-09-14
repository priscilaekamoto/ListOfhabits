<?php

$servidor = "localhost:3308";
$usuario = "root";
$senha = "";
$bancodedados = "habito";

//cria a conexão
$conn = new mysqli ($servidor
                    , $usuario
                    ,$senha
                    , $bancodedados);

//verifica se conectou com sucesso
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}  

//atualiza o status de A - ativo para V - vencido
$id = $_GET["id"];
$sql = "UPDATE habito " . "SET status='V' " . "WHERE id=".$id;

//verifica se o comando foi executado com sucesso
if (!($conn->query($sql) === TRUE)) {
    $conn->close();
    die("Erro ao atualizar: " . $conn->error);
}

//fecha a conexão
$conn->close();

//redireciona para index
header("Location: index.php");

?>