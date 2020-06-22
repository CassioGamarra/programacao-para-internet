<?php
    include 'functions/functions.php';
    include 'database/crud.php';
    $result = getBook($_GET['id']);

    while ($row = $result->fetch_assoc()){
        $id = $row['id'];
        $titulo = $row['titulo'];
        $autor = $row['autor'];
        $ano = $row['ano'];
        $paginas = $row['paginas'];
        $genero = $row['genero'];
        $class = $row['classificacao'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Comunitária</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php include 'inc/header.php'; ?>
    <br/>
    <!--Modal-->
    <div class="container">
                <form action="/biblioteca/controller/UpdateController.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value='<?php echo $id ?>' required readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="titulo">Nome do livro</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value='<?php echo $titulo ?>' required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor" value='<?php echo $autor ?>' required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                        <label for="ano">Ano lançamento</label>
                        <input type="number" class="form-control" id="ano" name="ano" value='<?php echo $ano ?>' required>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="paginas">Nº de páginas</label>
                        <input type="number" class="form-control" id="paginas" name="paginas" value='<?php echo $paginas ?>' min="1" required>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="genero">Gênero</label>
                        <input type="text" class="form-control" id="genero" name="genero" value='<?php echo $genero ?>' required >
                        </div>
                        <div class="form-group col-md-3">
                        <label for="classificacao">Classificação</label>
                        <select id="classificacao" name="classificacao" class="form-control" required>
                            <option selected>Selecione...</option>
                            <option value="livre">Livre</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12" style="text-align: center">
                        <button type="submit" id="cadastrar" name="cadastrar" class="btn btn-primary">Atualizar</button>
                    </div>
                </form> 
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

