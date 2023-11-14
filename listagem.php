<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento de Cadastro</title>
    <style>
       
    </style>
</head>
<body>
    <?php

$servername = "localhost";
$username = "root@localhost";
$password = "";
$dbname = "acervo_livros";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);


if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}


$sql = "SELECT * FROM acervo";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Listar Itens do Acervo</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="index.php">Página inicial</b>
            <a href="create.php">Sistema</a>
            <a href="cadastrar.php">Cadastrar</a>
            <a href="alterar.php">Alterar</a>
            <b>Listar</b>
            <a href="pesquisar.php">Pesquisar</a>
        </div>
        <div class="main">
            <div>
                <h1>Listar Itens do Acervo</h1>
                <p>Aqui você pode visualizar todos os itens disponíveis no acervo da livraria.</p>
                <div class="lista">
                    <ul>
                        <?php
                     
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<li>{$row['titulo']} - {$row['autor']} - {$row['genero']} - {$row['ano']} - {$row['editora']}</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php

mysqli_close($conexao);
?>