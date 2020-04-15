<?php
    include 'functions.php'; //Inclui o arquivo com funções
    //Recebendo os dados via POST
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $nivelAcesso = $_POST['nivel'];
    
    //Define o nome do arquivo como o nome via POST
    $nomeArquivo = str_replace(' ', '', $usuario);
    $nomeArquivo = removerAcentos($nomeArquivo); //Remove possíveis acentos do nome
    $arquivo = "usuarios/".strtoupper($nomeArquivo).".txt"; //Salva na pasta usuarios

    if(file_exists($arquivo)){ 
        erro("o usuário já existe!", "cadastro");
    }

    //Define o conteúdo do arquivo
    $conteudo = $usuario."\n".$password."\n".$nivelAcesso;
    //Abre o arquivo para gravação
    $arq = fopen($arquivo, "w");
    //Se não for possível abrir o arquivo
    if($arq == false){
        erro("não foi possível abrir o arquivo para gravação!", "cadastro");
    } 
    fwrite($arq, $conteudo, strlen($conteudo)); //Grava o conteúdo no arquivo
    fclose($arq);
    
    sucesso("Cadastro realizado com sucesso", "index");
?>