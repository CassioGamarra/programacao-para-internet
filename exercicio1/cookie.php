<?php
    //Cria uma variável para ser o nome do Cookie com vetor
    $nomeCookie = str_replace(' ', '', $_POST['nome']);//Nome sem espaços

    //Verifica a existência do cookie com o nome informado
    if(!isset($_COOKIE[$nomeCookie])){
        include ("cadastro.php");//Exibe a página de cadastro

        //Se o botão cadastrar for pressionado
        if(isset($_POST['cadastrar'])){
            setcookie($nomeCookie."[nome]", $_POST['nome']);
            setcookie($nomeCookie."[email]", $_POST['email']);
            setcookie($nomeCookie."[estadocivil]", $_POST['estadocivil']);
            setcookie($nomeCookie."[cor]", $_POST['cor']);
            echo '
            <script>
                alert("Dados cadastrados");
                window.location.href="index.php";
            </script>';
        }
    }
    //Se o cookie existir
    else{
        $nome = $_COOKIE[$nomeCookie]["nome"];
        $email = $_COOKIE[$nomeCookie]["email"];
        $estadoCivil = $_COOKIE[$nomeCookie]["estadocivil"];
        $cor = $_COOKIE[$nomeCookie]["cor"];

        //Monta uma mensagem para exibir no alert
        $mensagem = "Nome: ".$nome.'\n'."Email: ".$email.'\n'."Estado civil: ".$estadoCivil;
        
        //A função timeout permite que o background seja carregado antes do alert
        echo "
        <script>
            setTimeout(function() {
                alert('$mensagem');   
                window.location.href='index.php';
            }, 0)
        </script>
        <style>
            body{
                background-color: $cor;
            }
        </style>
        ";
    }
?>