<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 1 - Cookies - Cássio Gamarra</title>
    <!--CSS Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <br/>
    <div class="container text-center">
        <div class="col-sm-12">
        <div class="card text-center">
            <div class="card-header">
                Cadastrar dados
            </div>
            <div class="card-body">
                <form action="cookie.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <!--O nome é preenchido automaticamente com o valor via $_POST, não sendo possível editar-->
                        <input type="text" class="form-control" id="nome" name="nome" required readonly value="<?php echo $_POST['nome'] ?>">
                        <br/>
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insira o e-mail" required>
                        <br/>
                        <label for="estadocivil">Estado Civil</label>
                        <select class="form-control" id="estadocivil" name="estadocivil" required> 
                            <option disabled selected>Selecione</option>
                            <option>Solteiro</option>
                            <option>Casado</option>
                        </select>
                        <br/>
                        <label for="cor">Cor favorita</label>
                        <input type="color" class="form-control" id="cor" name="cor" required>
                    </div>
                    <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                </form> 
            </div>
        </div>
        </div>
    </div>
    <!--Scripts Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>