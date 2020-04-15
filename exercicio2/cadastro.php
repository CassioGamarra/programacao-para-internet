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
                <h3>Cadastrar Usuário </h3>
                <form action="cadastrar.php" method="POST">
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required>
                    <small class="text-muted">Se você digitar "Fulano de tal", seu usuario vai ser "fulanodetal"</small>
                    <br/>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                    <br/>
                    <select name="nivel" id="nivel" class="form-control">
                        <option selected disabled>Selecione</option>
                        <option value="1">Usuário</option>
                        <option value="2">Administrador</option>
                        <option value="3">Super</option>
                    </select>
                    <br/>
                    <button class="btn btn-lg btn-primary btn-block" name="entrar" type="submit">Salvar</button>
                    <a href="index.php"><p class="mt-5 mb-3">Login</p></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
