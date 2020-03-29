<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
</head>
<body>
    <form action="cadastrar.php" method="POST">
        <fieldset>
            <legend>CADASTRO DE PESSOAS</legend>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" required>
            <label for="sobrenome">Sobrenome: </label>
            <input type="text" name="sobrenome" required>
            <label for="senha">Senha:</label>
            <input id="senha" name="senha" type="password" min="6" maxlength="8" required>
            <label for="confirma_senha">Repita a senha:</label>
            <input id="confirma_senha" name="confirma_senha" type="password" min="6" maxlength="8" required>
            <br/><br/>
            <label for="genero">Gênero:</label>
            <input type="radio" id="masculino" name="genero" value="Masculino" checked>
            <label for="masculino">Masculino</label>
            <input type="radio" id="feminino" name="genero" value="Feminino">
            <label for="feminino">Feminino</label>
            <input type="radio" id="outro" name="genero" value="Outro">
            <label for="outro">Outro</label>
            <br/><br/>
            <label for="idade">Idade:</label>
            <input id="idade" name="idade" type="number" min="0" required>
            <br/><br/>
            <label for="">Preferências de lazer: </label>
            <input type="checkbox" id="lazer1" name="lazer[]" value="Viagem">
            <label for="lazer1"> Viagem</label>
            <input type="checkbox" id="lazer2" name="lazer[]" value="Mergulho">
            <label for="lazer2"> Mergulho</label>
            <input type="checkbox" id="lazer3" name="lazer[]" value="Navegação na Internet">
            <label for="lazer3"> Navegação na Internet</label>
            <input type="checkbox" id="lazer4" name="lazer[]" value="Videogame">
            <label for="lazer4"> Videogame</label>
            <input type="checkbox" id="lazer5" name="lazer[]" value="Ciclismo">
            <label for="lazer5"> Ciclismo</label>
            <input type="checkbox" id="lazer6" name="lazer[]" value="Atletismo">
            <label for="lazer6"> Atletismo</label>
            <input type="checkbox" id="lazer7" name="lazer[]" value="Pesca">
            <label for="lazer7"> Pesca</label>
            <br/><br/>
            <input type="submit" value="CADASTRAR" name="cadastrar" id="cadastrar">
        </fieldset>
    </form>
</body>
</html>