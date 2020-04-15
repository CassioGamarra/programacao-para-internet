<?php
    include 'functions.php'; //Inclui o arquivo de funções

    session_start(); //Garante que sessão foi iniciada
    session_unset(); //Remove todos os dados da sessão
    session_destroy(); //Destrói a sessão
    //Redireciona para o index

    sucesso("Logout realizado com sucesso", "index");
?>