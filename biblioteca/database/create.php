<?php
    function createDatabase(){
        $ip = "localhost"; //IP da máquina onde se encotra a base
        $usuario = "php_user"; //Usuario
        $senha = "php@123"; //Senha

        $conn = new mysqli($ip, $usuario, $senha); //Cria uma nova conexão

        if($conn->connect_error) {
            die(
                erro("Falha na conexão: " . $conn->connect_error, "index")//Caso ocorra uma falha
            );
        }
        sucesso("Conexão realizada com sucesso!", "index");

        //Cria a base
        $sql = "create database biblioteca";

        if($conn->query($sql) === TRUE){
            sucesso("Base de dados criada com sucesso!");
            $sql1 = "USE biblioteca"; //Seleciona a base
            //Cria a tabela
            $sql2 = "create table livro(
                        id INT UNSIGNED AUTO_INCREMENT NOT NULL,
                        titulo VARCHAR(200),
                        autor VARCHAR(100),
                        ano INT UNSIGNED,
                        paginas  INT UNSIGNED,
                        genero VARCHAR(30),
                        classificacao VARCHAR(50),
                        PRIMARY KEY(id)
                    )";
            if($conn->query($sql1) === TRUE){
                if($conn->query($sql2) === TRUE){
                    sucesso("Tabela criada com sucesso!", "index");
                }
            }
            else{
                erro("Erro na criação tabela: ".$conn->error, "index");
            }
        }
        else{
            erro("Erro na criação da base de dados: ".$conn->error, "index");
        }

        $conn->close();
    }
    createDatabase();
?>