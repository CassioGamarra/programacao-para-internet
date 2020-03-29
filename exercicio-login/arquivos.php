<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ARQUIVOS</h1>
    <form action="dados-arquivo.php" method="POST">
        <fieldset>
            <legend>CARREGAR DO ARQUIVO</legend>
            <label for="nome_arquivo">Nome completo:</label>
            <input type="text" name="nome_arquivo" id="nome_arquivo" placeholder="Insira o nome" required>
            <input type="submit" value="CARREGAR" name="carregar" id="carregar">
        </fieldset>
    </form> 
</body>
</html>