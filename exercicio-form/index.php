<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício com Form - Cássio Gamarra</title>
</head>
<body>
    <div >
        <form action="" method="POST">
            <fieldset>
                <legend>Cadastro</legend>
                <h1 style="text-align:center">.::CADASTRO::.</h1>
                <fieldset>
                    <legend>Dados Pessoais</legend>
                    <label for="nome">Nome:</label>
                    <input id="nome" name="nome" type="text">
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email">
                    <label for="telefone">Telefone:</label>
                    <input id="telefone" name="telefone" type="tel">
                    <label for="senha">Senha:</label>
                    <input id="senha" name="senha" type="password" min="6" maxlength="8">
                    <label for="confirma_senha">Repita a senha:</label>
                    <input id="confirma_senha" name="confirma_senha" type="password" min="6" maxlength="8">
                    <br/><br/>
                    <label for="genero">Gênero:</label>
                    <input type="radio" id="masculino" name="genero" value="Masculino" checked>
                    <label for="masculino">Masculino</label>
                    <input type="radio" id="feminino" name="genero" value="Feminino">
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="outro" name="genero" value="Outro">
                    <label for="outro">Outro</label>
                    <br/><br/>
                    <label for="objetivos">Objetivos:</label><br/>
                    <textarea name="objetivos" id="objetivos" cols="100" rows="10"></textarea>
                    <br/><br/>
                    <label for="">Linguagens: </label>
                    <input type="checkbox" id="linguagem1" name="linguagens[]" value="Java">
                    <label for="linguagem1"> Java</label>
                    <input type="checkbox" id="linguagem2" name="linguagens[]" value="JavaScript">
                    <label for="linguagem2"> JavaScript</label>
                    <input type="checkbox" id="linguagem3" name="linguagens[]" value="PHP">
                    <label for="linguagem3"> PHP</label>
                    <input type="checkbox" id="linguagem4" name="linguagens[]" value="Python">
                    <label for="linguagem4"> Python</label>
                    <input type="checkbox" id="outra_linguagem" name="linguagens[]" value="Python">
                    <label for="linguagem5"> Outro</label>
                    <input id="outra_linguagem_nome" name="linguagens[]" type="text">
                    <br/><br/>
                    <label for="universidade">Universidade:</label>
                    <select id="universidade" name="universidade">
                        <option value="UFN">UFN</option>
                        <option value="UFSM">UFSM</option>
                        <option value="FISMA">FISMA</option>
                        <option value="OUTRO">OUTRO</option>
                    </select>
                    <br/><br/>
                    <label for="rede_social">Rede social favorita:</label>
                    <input list="rede_social" name="rede_social">
                    <datalist id="rede_social">
                        <option value="Facebook">
                        <option value="Twitter">
                        <option value="Linkedin">
                        <option value="Instagram">
                        <option value="Outro">
                    </datalist>
                    <br/><br/>
                    <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
                    <input type="reset" value="Limpar Campos">
                </fieldset>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php
    echo '<h1 style="text-align:center">.::DADOS CADASTRADOS::.</h1>';
    if(isset($_POST['cadastrar'])){
        if(isset($_POST['nome'])){
            if($_POST['nome'] == ''){
                echo "<h3>O CAMPO NOME NÃO PODE ESTAR EM BRANCO!</h3>";
            }
            else{
                exibirDados();
            }
        }
    }

    function exibirDados(){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $senhaConfirma = $_POST['confirma_senha'];
        $genero = $_POST['genero'];
        $objetivo = $_POST['objetivos'];
        //Verifica se existe alguma linguagem selecionada
        if(isset($_POST['linguagens'])){
            $linguagens = $_POST['linguagens'];
        }
        $universidade = $_POST['universidade'];
        //Verifica se existe alguma rede social selecionada
        if(isset($_POST['rede_social'])){
            $rede_social = $_POST['rede_social'];
        }
        //Verifica se as duas senhas coincidem
        $senhaCorreta = 'Senha Inválida';
        if(($senha === $senhaConfirma)&&($senha != '')&&($senhaConfirma != '')){
            $senhaCorreta = 'Senha Válida';
        }
        //Loop para criar o campo com as linguagens selecionadas
        $linguagensSelecionadas = "";
        foreach($linguagens as $linguagem){
            $linguagensSelecionadas .= $linguagem." ";
        }

        echo '<fieldset>';
        echo '<legend>Dados Pessoais:</legend>';
        echo "<h3>Nome: $nome</h3>";
        echo "<h3>Email: $email</h3>";
        echo "<h3>Telefone: $telefone</h3>";
        echo "<h3>Senha: $senhaCorreta</h3>";
        echo "<h3>Gênero: $genero</h3>";
        echo "<h3>Objetivos: <p>$objetivo</p></h3>";
        echo "<h3>Linguagens: $linguagensSelecionadas</h3>";
        echo "<h3>Universidade: $universidade</h3>";
        echo "<h3>Rede Social: $rede_social</h3>";
        echo '</fieldset>';
    }
?>

<style>
label{
    font-weight: 700;
}
</style>