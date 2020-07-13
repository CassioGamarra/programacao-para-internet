<?php
    include_once 'functions/functions.php';
    include_once '../functions/functions.php';
    include_once 'utils/utils.php';
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
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Biblioteca Comunitária - <?php echo "Usuário: ".$usuario ?> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#novo">
                    Novo livro
                </button>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar" id="buscarLivro">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="buscarLivros()">Buscar</button>
                    <p>&nbsp</p>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="limparBusca()">Limpar Busca</button>
                </form>
            </div>
            <a href="../logout.php">
                <button type="button" class="btn btn-outline-success my-2 my-sm-0"  style="margin-left: 0.5em">
                    Sair
                </button>
            </a>
        </div>
</nav>