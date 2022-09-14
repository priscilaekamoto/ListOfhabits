<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Lista de hábitos</title>
    </head>
    <body>
        <div class="center">
            <h1>Lista de hábitos</h1>
            <p>Cadastre aqui os hábitos que você tem que vencer para melhorar sua vida!</p>
            <?php 
                // obtém a lista de hábitos do banco de dados MySQL
                $servidor = "localhost:3308";
                $usuario = "root";
                $senha = "";
                $bancodedados = "habito";
            
                //cria uma conexão com o banco de dados
                $conexao = new mysqli( $servidor
                                    , $usuario
                                    , $senha
                                    ,$bancodedados);
            
                //verifica a conexão
                if ($conexao->connect_error) {
                    die("Falha na conexão: " . $conexao->connect_error);
                }  else {
                    echo "Banco de Dados conectado com sucesso";
                }
                
                //executa a query da variável $sql
                $sql = " SELECT id ". "     , nome ". "FROM habito ". " WHERE status = 'A'";
                $resultado = $conexao->query($sql);
            
                //verifica se a query retornou registros
                if ($resultado->num_rows > 0) {
            ?>
            <br/>
            <table class="center">
                <tbody>
                    <?php
                    //looping pelos registros retornados
                    while ($registro = $resultado->fetch_assoc() ) {

                    ?>
                    <tr>
                        <td><?php echo $registro["nome"]; ?></td>
                        <td><a href="vencerhabito.php?id=<?=$registro["id"]; ?>">Vencer</a></td>
                        <td><a href="desistirhabito.php?id=<?=$registro["id"]; ?>">Desistir</a></td>
                    </tr>
                    <?php    
                    }   // fim do looping
                    ?>
                </tbody>
            </table>
                    
            <p>Continue mudando sua vida!</p>
            <p>Cadastre mais hábitos</p>
            <?php
            } else {
                ?>
                <p>Você não possui hábitos cadastrados!</p> 
                <p>Comece já a mudar sua vida!</p>

            <?php
            }// fim do if
            
            //fecha a conexão com o MySQL
            $conexao->close();
            
            ?>
            <a href="novohabito.php">Cadastrar Hábito</a>
        </div>
    </body>
</html>