<?php
    include 'functions.php'; //Inclui o arquivo com as funções
    //Inicia a sessão
    session_start();
    if(!isset($_SESSION['usuario'])){
        //Por segurança destroi os dados da sessao
        session_unset();
        session_destroy();
        erro("usuário não autenticado", "index");
    }
    else{
        $usuario = $_SESSION['usuario']; //Busca o usuário na sessão
        $nivel = $_SESSION['nivel-acesso']; //Busca o nível de acesso na sessão
        
        //Define o nome para exibir no navbar
        if($nivel == 1){
            $nivelAmigavel = "Usuário";
        }
        elseif($nivel == 2){
            $nivelAmigavel = "Administrador";
        }
        elseif($nivel == 3){
            $nivelAmigavel = "Super Usuário";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Exercicio 2 - Cássio Gamarra</title>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar com imagem e texto -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Dashboard | <?php echo "Usuário: ".$usuario." | Nível de acesso: ".$nivelAmigavel ?></a>
        <a class="nav-link" href="logout.php">Logout</a>
    </nav>
    <br/>
    <div class="container">
        <div class="row">
            <!--Nivel de acesso 1-->
            <div class="col-sm-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Conteúdo do Usuário</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <?php if($nivel > 1) {?>
                <!--Nivel de acesso 2-->
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Conteúdo do Administrador</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($nivel > 2) {?>
                <!--Nivel de acesso 3-->
                <div class="col-sm-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Conteúdo do Super Usuário</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>