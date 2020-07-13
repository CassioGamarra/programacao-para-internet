<?php
    include_once 'biblioteca/utils/utils.php';
    //Cria a base de dados
    createDatabase();
    
    function createDatabase(){
        $ip = "localhost"; //IP da máquina onde se encotra a base
        $usuario = "php_user"; //Usuario
        $senha = "php@123"; //Senha

        $conn = new mysqli($ip, $usuario, $senha); //Cria uma nova conexão

        if($conn->connect_error) {
            die(
                erro("Falha na conexão: " . $conn->connect_error)//Caso ocorra uma falha
            );
        }else{
            //Cria a base
            $sql = "create database biblioteca";

            if($conn->query($sql) === TRUE){
                $sql1 = "USE biblioteca"; //Seleciona a base
                //Cria a tabela de usuario
                $sql2 = "
                    create table usuario(
                        id INT UNSIGNED AUTO_INCREMENT NOT NULL,
                        login VARCHAR(200),
                        senha VARCHAR(255),
                        PRIMARY KEY (id)
                    )
                ";
                //Cria a tabela de livros
                $sql3 = "
                    create table livro(
                        id INT UNSIGNED AUTO_INCREMENT NOT NULL,
                        titulo VARCHAR(200),
                        autor VARCHAR(100),
                        ano INT UNSIGNED,
                        paginas INT UNSIGNED,
                        genero VARCHAR(30),
                        classificacao VARCHAR(50),
                        PRIMARY KEY(id)
                    ) 
                ";
                if($conn->query($sql1) === TRUE){
                    if($conn->query($sql2) === TRUE){
                        if($conn->query($sql3) === TRUE){
                            echo "
                                <!--Mensagem de erro em HTML dentro do PHP-->
                                <head>
                                    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
                                </head>
                                <div class=\"alert alert-success text-center\" role=\"alert\">Tabelas criadas com sucesso!</div>
                            ";
                        }
                    }
                }
                else{
                    erro("Erro na criação tabela: ".$conn->error);
                }
            }
            else{
                erro("Erro na criação da base de dados: ".$conn->error);
            }

        }
        $conn->close();
    }
?>