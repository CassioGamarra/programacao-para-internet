<?php
    include_once 'functions/functions.php'; //Inclui o arquivo de funções
    include_once 'biblioteca/database/conn.php'; //Inclui o arquivo de conexão

    //Função para realizar o login, passando como parâmetro usuario e senha
    function login($usuario, $password){
        $conn = conn();
        if($conn->connect_error) {
            die(
                funcErro("Falha na conexão: " . $conn->connect_error, "index")//Caso ocorra uma falha
            );
        }

        $sql = "select login, senha from usuario where login = '$usuario'"; //Consulta SQL para buscar o login e a senha do usuário

        $result = $conn->query($sql);

        if ($result->num_rows == 0){
            funcErro("Usuário não encontrado! Redirecionando para cadastro...", "cadastro"); //Caso o usuáriuo não possua cadastro
        }else{
            $usuarioDB = '';
            $senhaDB = '';
            //Percorre o result set
            while($row = $result->fetch_assoc()){
                $usuarioDB = $row['login'];
                $senhaDB = $row['senha'];
            }
            //Verifica o usuario e a senha
            if($usuario === $usuarioDB){
                if(password_verify($password, $senhaDB)){
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    funcSucesso("Bem-vindo ".$usuario."!", "biblioteca/index");
                }
                else{
                    funcErro("Senha incorreta!", "index");
                }
            }
        }
    }

    //Realiza o logout
    function logout(){
        session_start(); //Garante que sessão foi iniciada
        session_unset(); //Remove todos os dados da sessão
        session_destroy(); //Destrói a sessão
        //Redireciona para o index

        funcSucesso("Logout realizado com sucesso", "index");
    }
?>