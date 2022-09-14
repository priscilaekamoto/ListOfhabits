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

//obtém o id do regsitro que foi recebido via get
$id = $_GET["id"];

$sql = "DELETE FROM habito WHERE id=" . $id;

//executa o comando delete da variável $sql
if(!($conn->query($sql) === TRUE)) {
    die("Erro ao excluir: " . $conn->error);
}

//fecha a conexão
$conn->close();

//redireciona para a página inicial
header("Location: index.php");

?>