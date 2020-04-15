<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exercício 2 · Cássio Gamarra</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body class="text-center">
    <br/>
    <div class="container text-center">
        <div class="row">  
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h3>Exercício 2 - Sessões</h3>
                <form action="login.php" method="POST">
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required>
                    <br/>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                    <br/>
                    <button class="btn btn-lg btn-primary btn-block" name="entrar" type="submit">Entrar</button>
                    <a href="cadastro.php"><p class="mt-5 mb-3">Registrar-se</p></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
