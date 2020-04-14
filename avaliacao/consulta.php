<?php
    //Verifica se o submit CONSULTAR foi clicado
    if(isset($_POST['consultar'])){
        $nome = $_POST['nome'];
        $nomeArquivo = str_replace(' ', '', $nome);
        $nomeArquivo = removerAcentos($nomeArquivo);
        $arquivo = "clientes/".strtoupper($nomeArquivo).".txt"; //Busca na pasta clientes
        header("Location: dados-cadastro.php?nome=$arquivo"); 
    }

    //função para remover acentos de um nome
    function removerAcentos($texto){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$texto);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta - Avaliação 1 - Cássio Gamarra</title>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!--HEADER-->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
        <img src="http://icons.iconarchive.com/icons/webalys/kameleon.pics/256/Food-Dome-icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Orçamento de Buffets
        </a>
    </nav>
    <br/>
    <div class="container">
        <fieldset>
            <legend>CONSULTAR ORÇAMENTO</legend>
            <form action="" method="POST">
                <div class="form-group">
                  <label for="nome">Nome do cliente: </label>
                  <!--O campo pattern é um regex para aceitar apenas letras, trantando apenas com o próprio html-->
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome" required pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$">
                </div>
                <button name="consultar" type="submit" class="btn btn-primary">Consultar</button>
            </form>
        </fieldset>
    </div>
    <!--JavaScript Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>