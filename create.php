<?php

$nomeErro = $sobrenomeErro = "";


$nome = $sobrenome = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["nome"])) {
        $nomeErro = "Nome é obrigatório.";
    } else {
        $nome = $_POST["nome"];
    }

   
    if (empty($_POST["sobrenome"])) {
        $sobrenomeErro = "Sobrenome é obrigatório.";
    } else {
        $sobrenome = $_POST["sobrenome"];
    }

    
    if (empty($nomeErro) && empty($sobrenomeErro)) {
       
        echo "Cadastro realizado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h2>Cadastro de Pessoas</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <span class="error"><?php echo $nomeErro; ?></span><br><br>
        
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome">
        <span class="error"><?php echo $sobrenomeErro; ?></span><br><br>

        <input type="submit" name="submit" value="Cadastrar">
    </form>

    <?php
    
    if (!empty($nome) && !empty($sobrenome)) {
        echo "<h3>Dados cadastrados com sucesso:</h3>";
        echo "Nome: " . $nome . "<br>";
        echo "Sobrenome: " . $sobrenome . "<br>";
    }
    ?>
</body>
</html>