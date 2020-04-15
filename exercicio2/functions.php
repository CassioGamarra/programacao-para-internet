<?php
    //Erro de sessão
    function erro($mensagem, $url){
        //Da um refresh em 3 segundos e retorna pro cadastro
        header("refresh:3; url=$url.php");
        echo "
            <!--Mensagem de erro em HTML dentro do PHP-->
            <head>
                <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
            </head>
            <div class=\"alert alert-danger text-center\" role=\"alert\">Erro: $mensagem</div>
        ";
        exit;
    }
    //Caso o login ocorra com sucesso
    function sucesso($mensagem, $url){
        //Da um refresh em 3 segundos e retorna pro cadastro
        header("refresh:3; url=$url.php");
        echo "
            <!--Mensagem de erro em HTML dentro do PHP-->
            <head>
                <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
            </head>
            <div class=\"alert alert-success text-center\" role=\"alert\">$mensagem, redirecionando...</div>
        ";
        exit;
    }
    //Função para remover os acentos
    function removerAcentos($texto){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$texto);
    }
?>