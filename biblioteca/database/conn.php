<?php
    function conn(){
        $ip = "localhost"; //IP da máquina onde se encotra a base
        $usuario = "php_user"; //Usuario
        $senha = "php@123"; //Senha
        $db = "biblioteca";

        return new mysqli($ip, $usuario, $senha, $db); //Cria uma nova conexão
    }
?>