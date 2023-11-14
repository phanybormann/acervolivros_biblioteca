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
   
    $id = $_POST['id'];

    $servername = "localhost";
    $username = "root@localhost";
    $password = "";
    $dbname = "acervo_livros";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);

    
    if ($conexao) {
     
        $sql = "UPDATE acervo SET titulo = ?, autor = ?, genero = ?, ano = ?, editora = ? WHERE id = ?";
        
        
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssi', $titulo, $autor, $genero, $ano, $editora, $id);

        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $ano = $_POST['ano'];
        $editora = $_POST['editora'];

        if (mysqli_stmt_execute($stmt)) {
            
            header("Location: alterar.php?success=1");
            exit();
        } else {
           
            header("Location: alterar.php?error=1");
            exit();
        }
    } else {
        
        header("Location: alterar.php?db_error=1");
        exit();
    }
} else {
   
    header("Location: alterar.php");
    exit();
}
?>