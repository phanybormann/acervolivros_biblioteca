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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $titulo = $_POST['titulo'];

    
    $servername = "localhost";
    $username = "root@localhost";
    $password = "";
    $dbname = "acervo_livros";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);

   
    if ($conexao) {
        
        $sql = "SELECT * FROM acervo WHERE titulo LIKE ?";

        
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, 's', $titulo_param);

        $titulo_param = "%" . $titulo . "%";

        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);

       
        if (mysqli_num_rows($resultado) > 0) {
           
            header("Location: listagem.php?titulo=" . urlencode($titulo));
            exit();
        } else {
            
            header("Location: listagem.php?sem_resultados=1");
            exit();
        }
    } else {
       
        header("Location: pesquisar.php?db_error=1");
        exit();
    }
} else {

    header("Location: pesquisar.php");
    exit();
}
?>