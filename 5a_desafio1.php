```php
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $anoNascimento = $_POST["ano_nascimento"];

    $anoAtual = date("Y");
    $idade = $anoAtual - $anoNascimento;

    if ($idade >= 18) {

        echo "<h2>Acesso permitido, $nome!</h2>";

        $arquivo = fopen("log_acessos.txt", "a");
        fwrite($arquivo, "Nome: $nome | Idade: $idade anos\n");
        fclose($arquivo);

    } else {

        echo "<h2>Acesso negado, $nome!</h2>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificador de Maioridade</title>
</head>
<body>

    <h1>Verificador de Maioridade</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Ano de Nascimento:</label>
        <input type="number" name="ano_nascimento" required>

        <br><br>

        <button type="submit">Verificar</button>

    </form>

</body>
</html>
```
