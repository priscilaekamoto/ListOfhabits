<!DOCTYPE html>
<html lang="ept-brn">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Lista de hábitos</title>
    </head>
    <body>
        <div class="center">
            <h1>Novo Hábito</h1>
            <!--formulário para cadastro de pessoas. Note a utilização do atributo name,
            que faz o link entre os elementos do DOM e o JS-->
            <form id="formulario" action="inserthabito.php" method="post">
                <p><label>Nome: <input type="text" id="nome" name="nome" autofocus/></label></p>
                <p><input type="submit" value="Criar"></p>
            </form>
        </div>
        <script type="text/javascript">

            //declara uma função para validar o formulário
            var validaForm = function() {
                var nomeHabito = document.getElementById("nome").value;
                if ("" == nomeHabito) {
                    alert("É necessátio informar o nome do Hábito");
                    return false;
                }
            }
            // aqui declaramos que esta função ocorre sempre no submit do formulário

            document.getElementById("formulario").onsubmit = validaForm;
        </script>

    </body>
</html>