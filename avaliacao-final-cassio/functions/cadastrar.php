<?php
    include_once '../functions/functions.php'; //Inclui o arquivo de funções
    include_once '../biblioteca/database/conn.php'; //Inclui o arquivo de conexão
    //Recebendo os dados via POST
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    
    //Define o nome de usuario como o nome via POST
    $nomeUsuario = str_replace(' ', '', $usuario);
    $nomeUsuario = removerAcentos($nomeUsuario); //Remove possíveis acentos do nome

    insertUser($usuario, $password);
    //Cadastra um novo usuario
    function insertUser($usuario, $password){
        $conn = conn();
        if($conn->connect_error) {
            die(
                funcErro("Falha na conexão: " . $conn->connect_error)//Caso ocorra uma falha
            );
        }
        
        $usuario = strtoupper($usuario);
        $senha = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "select id from usuario where login = '$usuario'";
        $result = $conn->query($sql);
        if ($result->num_rows != 0){
            funcErro("Usuário já cadastrado", "../index");
        }
        else{
            $sql = "insert into usuario(login, senha)
                values('$usuario','$senha')";
            if ($conn->query($sql) === true){
                funcSucesso("O usuário ".$usuario." foi cadastrado com sucesso!", "../index");
            } else{
                funcErro("Erro ao cadastrar", "cadastrar");
            }
        }
        $conn->close();
    }
?>