<?php
if(isset($_POST['voltar'])){
    header('Location: dashboard.php?login');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Cadastrados</title>
</head>
<body>
<?php
    $nomeArquivo = strtoupper($_POST['nome_arquivo']);
    $composto = strpos($nomeArquivo, ' ');

    if($composto !== false){
        list ($nome, $sobrenome) = explode(" ", $nomeArquivo); //Faz um split no nome recebito
        $nomeArquivo = $nome."_".$sobrenome.".txt"; //Concatena com o underline e o .txt
    }
    else{
        $nomeArquivo .=".txt";
    }
    //Verifica se o arquivo existe
    if(file_exists($nomeArquivo)){
        global $nomeArquivo;
        $arq = file("$nomeArquivo");//Abre o arquivo em modo leitura
        ?>
        <fieldset>
            <legend>CADASTRO DE PESSOAS</legend>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" value="<?php echo $arq[0]?>">
            <label for="sobrenome">Sobrenome: </label>
            <input type="text" name="sobrenome" value="<?php echo $arq[1]?>">
            <label for="senha">Senha:</label>
            <input id="senha" name="senha" type="password" min="6" maxlength="8" value="<?php echo $arq[2]?>">
            <label for="confirma_senha">Repita a senha:</label>
            <input id="confirma_senha" name="confirma_senha" type="password" min="6" maxlength="8" value="<?php echo $arq[3]?>">
            <br/><br/>
            <?php
                $genero = trim($arq[4]);
                $masculino = "";
                $feminino = "";
                $outro = "";
                if(strcmp($genero, 'Masculino') == 0){
                    global $masculino;
                    $masculino = "checked";
                }
                if(strcmp($genero, 'Feminino') == 0){
                    global $feminino;
                    $feminino = "checked";
                }
                if(strcmp($genero, 'Outro') == 0){
                    global $outro;
                    $outro = "checked";
                }
            ?>
            <label for="genero">Gênero:</label>
            <input type="radio" id="masculino" name="genero" value="Masculino" <?php echo $masculino?>>
            <label for="masculino">Masculino</label>
            <input type="radio" id="feminino" name="genero" value="Feminino" <?php echo $feminino?>>
            <label for="feminino">Feminino</label>
            <input type="radio" id="outro" name="genero" value="Outro" <?php echo $outro?>>
            <label for="outro">Outro</label>
            <br/><br/>
            <label for="idade">Idade:</label>
            <input id="idade" name="idade" type="number" value= <?php echo $arq[5]?>>
            <br/><br/>
            <label for="">Preferências de lazer: </label>
            <?php
                $viagem="";
                $mergulho="";
                $navegacao="";
                $videogame="";
                $ciclismo="";
                $atletismo="";
                $pesca="";

                if(strpos($arq[6], 'Viagem') !== false){
                    global $viagem;
                    $viagem = "checked";
                }
                if(strpos($arq[6], 'Mergulho') !== false){
                    global $mergulho;
                    $mergulho = "checked";
                }
                if(strpos($arq[6], 'Navegação na Internet') !== false){
                    global $navegacao;
                    $navegacao = "checked";
                }
                if(strpos($arq[6], 'Videogame') !== false){
                    global $videogame;
                    $videogame = "checked";
                }
                if(strpos($arq[6], 'Ciclismo') !== false){
                    global $ciclismo;
                    $ciclismo = "checked";
                }
                if(strpos($arq[6], 'Atletismo') !== false){
                    global $atletismo;
                    $atletismo = "checked";
                }
                if(strpos($arq[6], 'Pesca') !== false){
                    global $pesca;
                    $pesca = "checked";
                }
            ?>
            <input type="checkbox" id="lazer1" name="lazer[]" value="Viagem" <?php echo $viagem?>>
            <label for="lazer1"> Viagem</label>
            <input type="checkbox" id="lazer2" name="lazer[]" value="Mergulho" <?php echo $mergulho?>>
            <label for="lazer2"> Mergulho</label>
            <input type="checkbox" id="lazer3" name="lazer[]" value="Navegação na Internet" <?php echo $navegacao?>>
            <label for="lazer3"> Navegação na Internet</label>
            <input type="checkbox" id="lazer4" name="lazer[]" value="Videogame" <?php echo $videogame?>>
            <label for="lazer4"> Videogame</label>
            <input type="checkbox" id="lazer5" name="lazer[]" value="Ciclismo" <?php echo $ciclismo?>>
            <label for="lazer5"> Ciclismo</label>
            <input type="checkbox" id="lazer6" name="lazer[]" value="Atletismo" <?php echo $atletismo?>>
            <label for="lazer6"> Atletismo</label>
            <input type="checkbox" id="lazer7" name="lazer[]" value="Pesca" <?php echo $pesca?>>
            <label for="lazer7"> Pesca</label>
        </fieldset>
        <form action="" method="POST">
        <input type="submit" id="voltar" name="voltar" value="VOLTAR">
        </form>
        <?php
    }
    else{
        echo 'ERRO AO ABRIR ARQUIVO';
    }
?>
</body>
</html>
