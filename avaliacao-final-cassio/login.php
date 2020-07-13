<?php
    include_once 'LoginController.php';
    $usuario = strtoupper($_POST['usuario']);
    $password = $_POST['password']; //Recebe a senha via post

    login($usuario, $password);
?>