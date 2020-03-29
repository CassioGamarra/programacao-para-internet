<?php
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];
    $genero = $_POST['genero'];
    $idade = $_POST['idade'];
    //Verifica se existe alguma preferencia de lazer selecionada
    if(isset($_POST['lazer'])){
        $lazer = $_POST['lazer'];
    }
    //Loop para criar uma string com as opções de lazer selecionadas
    $opcoesLazer = "";
    foreach($lazer as $opLazer){
        $opcoesLazer .= $opLazer." ";
    }
    
    if($senha != $confirma_senha){
        echo "As senhas não são iguais!";
        header("refresh:2;url=cadastro.php"); 
    }
    else{
        //Define o nome do arquivo composto por nome e sobrenome
        $arquivo = strtoupper($nome).'_'.strtoupper($sobrenome).".txt";
        //Define o conteúdo do arquivo
        $conteudo = $nome."\n".$sobrenome."\n".$senha."\n".$confirma_senha."\n".$genero."\n".$idade."\n".$opcoesLazer;
        //Abre o arquivo para gravação
        $arq = fopen($arquivo, "w"); //Grava a partir do inicio do arquivo
        if($arq == false) die ('ERRO AO SALVAR');

        fwrite($arq, $conteudo, strlen($conteudo)); //Grava o conteudo no arquivo
        fclose($arq);
        echo 'CADASTRO SALVO COM SUCESSO!';
        header("refresh:5;url=dashboard.php?login"); 
    }
?>