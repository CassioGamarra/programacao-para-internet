<?php
if(!isset($_GET['login'])){
    header('Location: index.php');
}
if(isset($_POST['logout'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD - EXERCÍCIO - CÁSSIO GAMARRA</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>PAINEL DE ADMINISTRAÇÃO</legend>
            <input type="submit" id="cadastro" name="cadastro" value="CADASTRO">
            <input type="submit" id="busca" name="busca" value="BUSCAR ARQUIVOS">
            <input type="submit" id="logout" name="logout" value="SAIR">
        </fieldset>
    </form>
</body>
</html>
<?php
if(isset($_POST['cadastro'])){
    include('cadastro.php');
}

if(isset($_POST['busca'])){
    include('arquivos.php');
}
?>