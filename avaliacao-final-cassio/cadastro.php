<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exercício 2 · Cássio Gamarra</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body class="text-center" style="background-image: url('biblioteca/imagens/background.png'); ">
    <br/>
    <div class="container text-center" style="margin: auto; margin-top: 10%; margin-bottom: 10%">
        <div class="row">  
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <img class="mb-4" src="biblioteca/imagens/icon.png" alt="" width="150" height="150">
                <h3 style="color: white">Cadastrar Usuário</h3>
                <form action="functions/cadastrar.php" method="POST">
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required>
                    <small style="color: white">Se você digitar "Fulano de tal", seu usuario vai ser "fulanodetal"</small>
                    <br/>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                    <br/>
                    <button class="btn btn-lg btn-primary btn-block" name="entrar" type="submit" style="background-color: #1f567d">Salvar</button>
                    <a href="index.php"><p class="mt-5 mb-3" style="color: white">Login</p></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
