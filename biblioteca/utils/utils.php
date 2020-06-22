<?php
    function erro($msg, $url){
        header("refresh:3; url=$url.php");
        echo "
            <!--Mensagem de erro em HTML dentro do PHP-->
            <head>
                <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
            </head>
            <div class=\"alert alert-danger text-center\" role=\"alert\">Erro: $msg</div>
        ";
        header("refresh:3; url=$url.php");
    }
    //Caso o login ocorra com sucesso
    function sucesso($msg, $url){
        header("refresh:3; url=$url.php");
        echo "
            <!--Mensagem de erro em HTML dentro do PHP-->
            <head>
                <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
            </head>
            <div class=\"alert alert-success text-center\" role=\"alert\">$msg</div>
        ";
        exit;
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }
?>