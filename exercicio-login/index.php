<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - EXERCÍCIO - CÁSSIO GAMARRA</title>
</head>
<body>
    <form action="login.php" method="POST">
        <fieldset>
            <legend>LOGIN</legend>
            <label for="usuario">USUÁRIO: </label>
            <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário..." required/>
            <label for="senha">SENHA: </label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha..." required>
            <input type="submit" id="login" name="login" value="ENTRAR">
        </fieldset>
    </form>
</body>
</html>