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
    die("Conexão falhou: " . $conn->connect_error);
}


        
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $genero = $_POST["genero"];
        $ano = $_POST["ano"];
        $editora = $_POST["editora"];
        $ID = $_POST["ID"];

      
$sql = "INSERT INTO acervo (titulo, autor) VALUES ('$titulo', '$autor')";


if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}

$conn->close();

     
    ?>
</body>
</html>