<?php
    include 'functions.php';
    
    $nomeArquivo = "usuarios/".strtoupper($_POST['usuario']).".txt";
    
    if(file_exists($nomeArquivo)){
        $arq = file("$nomeArquivo");
        $password = $_POST['password']; //Recebe a senha via post
        $passwordArquivo = trim($arq[1]); //Evita que fique um espaço em branco no final da senha

        if($password !== $passwordArquivo){
            erro("senha incorreta!", "index");
        }
        else{;
            session_start();
            $_SESSION['usuario'] = trim($arq[0]);
            $_SESSION['nivel-acesso'] = trim($arq[2]);
            sucesso("Bem-vindo ".$_SESSION['usuario'], "dashboard");
        }
    }
    else{
        erro("usuário não encontrado! Redirecionando para cadastro...", "cadastro");
    }
?>