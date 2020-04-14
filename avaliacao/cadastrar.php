<?php
    //Recebendo os dados via POST
    $nome = $_POST['nome'];
    $qtdConvidados = $_POST['convidados'];
    $sobremesa = 'off'; //Define o valor padrão como off
    if(isset($_POST['sobremesa'])){
        $sobremesa = $_POST['sobremesa'];
    }
    //Declaração prévia das variáveis para facilitar a alteração/manutenção
    $valorTotal = 0.00; //Variável para receber o valor total
    $garcons = 1; //Quantidade de garçons, no mínimo 1 garçom.
    $valorPrato = 22.90;//Valor do prato quente
    $cacheGarcom = 250.00;//Cache dos garçons
    
    $porcentagemSobremesa = 0.10;//10% do valor do convidado

    //Taxas
    $taxaSobremesa = 0.00;//Taxa da sobremesa
    $taxaGarcons = 0.00;//Taxa dos garçons
    $valorConvidado = 0.00;//Total dos convidados

    /* O valor total é calculado com: valor por convidado + taxa de sobremesa + taxa de garçons
    *Valor do convidado: quantidade de convidados X valor do prato quente(R$22,90)
    *Taxa sobremesa: 10% do valor do convidado
    *Taxa de garçons: numero de garçons X R$250,00 (1 garçom para cada 15 convidados)
    */

    $valorConvidado = $qtdConvidados * $valorPrato; //Valor por convidado

    //Valor da taxa de sobremesa
    if($sobremesa === 'on'){
        $taxaSobremesa = $valorConvidado * $porcentagemSobremesa; 
    }
    
    //Taxa dos garçons, inicia com 1 garçom.
    if($qtdConvidados > 15){
        //Se a quantidade de garçons for um número divisível por 15
        if($qtdConvidados%15 === 0){
            $garcons = $qtdConvidados/15;
        }
        //Se não, pega o valor inteiro da divisão e soma com a quantidade inicial de garçons
        else{
            $garcons = $garcons + intdiv($qtdConvidados, 15);
        }
    }
    $taxaGarcons = $garcons * $cacheGarcom;
    
    //Valor total
    $valorTotal = $valorConvidado + $taxaSobremesa + $taxaGarcons;

    //Define o nome do arquivo como o nome via POST
    $nomeArquivo = str_replace(' ', '', $nome);
    $nomeArquivo = removerAcentos($nomeArquivo);
    $arquivo = "clientes/".strtoupper($nomeArquivo).".txt"; //Salva na pasta clientes

    //Define o conteúdo do arquivo
    $conteudo = $nome."\n".$qtdConvidados."\n".$valorConvidado."\n".$taxaSobremesa."\n".$taxaGarcons."\n".$valorTotal;
    //Abre o arquivo para gravação
    $arq = fopen($arquivo, "w");
    //Se não for possível abrir o arquivo
    if($arq == false){
        //Da um refresh em 3 segundos e retorna pro cadastro
        header("refresh:3; url=cadastro.php");
    ?>
        <!--Mensagem de erro em HTML dentro do PHP-->
        <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        </head>
        <div class="alert alert-danger text-center" role="alert">Erro ao salvar</div>
    <?php
        exit; //Evita que continue a execução do script
    } 
    
    fwrite($arq, $conteudo, strlen($conteudo)); //Grava o conteúdo no arquivo
    fclose($arq);
    
    header("Location: sucesso.php?nome=$arquivo");

    //Função para remover os acentos
    function removerAcentos($texto){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$texto);
    }
?>