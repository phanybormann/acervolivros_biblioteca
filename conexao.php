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


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
$conn->close();
?>