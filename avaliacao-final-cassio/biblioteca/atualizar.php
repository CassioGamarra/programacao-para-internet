<?php 
    include_once '../functions/functions.php'; 
    //Inicia a sessão
    session_start();
    if(!isset($_SESSION['usuario'])){
        //Por segurança destroi os dados da sessao
        session_unset();
        session_destroy();
        funcErro("Usuário não autenticado", "../index");
    }
    else{
        $usuario = $_SESSION['usuario']; //Busca o usuário na sessão
        include_once 'database/crud.php';
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
<body style="background-image: url('imagens/background.png'); color: white">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Biblioteca Comunitária - <?php echo "Usuário: ".$usuario ?> </a>
        </div>
    </nav>
    <br/>
    <!--Modal-->
    <div class="container">
                <form action="controller/UpdateController.php" method="POST">
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
                            <option disabled selected >Selecione...</option>
                            <option <?php if($class === 'livre') echo 'selected'?>  value="livre">Livre</option>
                            <option <?php if($class === '10') echo 'selected'?> value="10">10+</option>
                            <option <?php if($class === '12') echo 'selected'?> value="12">12+</option>
                            <option <?php if($class === '14') echo 'selected'?> value="14">14+</option>
                            <option <?php if($class === '16') echo 'selected'?> value="16">16+</option>
                            <option <?php if($class === '18') echo 'selected'?> value="18">18+</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12" style="text-align: center">
                        <button type="submit" id="cadastrar" name="cadastrar" class="btn btn-primary">Atualizar</button>
                    </div>
                </form> 
    </div>
</body>
<?php include 'inc/footer.php'; ?>
</html>

