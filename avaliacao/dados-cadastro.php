<?php
    //Se não existir a variável nome na URL, retorna para a homepage
    if(!isset($_GET['nome'])){
        header('Location: index.php');
    }
    else{
        $nomeArquivo = $_GET['nome'];
        //Verifica se o arquivo solicitado existe
        if(file_exists($nomeArquivo)){
            $arq = file("$nomeArquivo");
        }else{
            //Refresh de 3 segundos para retornar a homepage
            header("refresh:3; url=consulta.php");
        ?>
            <!--Mensagem de erro em HTML dentro do PHP-->
            <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            </head>
            <div class="alert alert-danger text-center" role="alert">
                Arquivo não encontrado
            </div>
        <?php
            exit; //Previne a exibição do restante da página
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DADOS DO CADASTRO - Avaliação 1 - Cássio Gamarra</title>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="py-3 text-center">
        <img class="d-block mx-auto mb-4" src="http://icons.iconarchive.com/icons/webalys/kameleon.pics/256/Food-Dome-icon.png" alt="" width="72" height="72">
        <h2>ALECRIM & TOMILHO - BUFFET'S</h2>
        <p class="lead">Rua dos Andradas, 1670 - Santa Maria/RS</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="d-flex justify-content-between align-items-center col-md-12">
                <span class="badge badge-secondary badge-pill">Orçamento de Buffet - Cliente: <?php echo $arq[0] ?></span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Valor total dos convidados</h6>
                        <small class="text-muted"><?php echo $arq[1]?> convidados | R$22,90 cada</small>
                    </div>
                    <span class="text-muted">R$<?php echo $arq[2] ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Taxa de sobremesa</h6>
                        <small class="text-muted">10% do valor total dos convidado</small>
                    </div>
                    <span class="text-muted">R$<?php echo $arq[3] ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Taxa de garçons</h6>
                        <small class="text-muted"><?php echo trim($arq[4])/250 ?> garçon(s) | R$250,00 cada</small>
                    </div>
                    <span class="text-muted">R$<?php echo $arq[4] ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BRL)</span>
                    <strong>R$<?php echo $arq[5] ?></strong>
                </li>
            </ul>
            <div class="input-group">
                <div class="input-group-append">
                    <a href="index.php">VOLTAR AO INICIO</a>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>