<?php
    include_once 'database/crud.php';
    include_once 'utils/utils.php';
    $result = searchBooks($_REQUEST['busca']);
    if($result->num_rows == 0){
        erro("nenhum livro encontrado...");
    }
    else{
        if($result->num_rows > 0){
            echo "<div class=\"row row-cols-1 row-cols-md-3\">";
            while($row = $result->fetch_assoc()){
            echo "
                <div class=\"card\" style=\"max-width: 35rem;\">
                    <div class=\"row no-gutters\">
                    <div class=\"col-md-4\">
                    <img src=\"./imagens/livro.png\" class=\"card-img\" alt=\"Título: ".$row['titulo']."\">
                </div>
                <div class=\"col-md-8\">
                    <div class=\"card-body\">
                        <h5 id=\"titulo_excluir\" class=\"card-title\">".$row['titulo']."</h5>
                            <p class=\"card-text\">
                                        Autor: ".$row['autor']."
                                        <br/>
                                        Lançamento: ".$row['ano']."
                                        <br/>
                                        Páginas: ".$row['paginas']."
                                        <br/>
                                        Gênero: ".$row['genero']."
                                        <br/>   
                                        Classificação: ".$row['classificacao']."
                                        </p>
                                        <a href='atualizar.php?id=".$row['id']."' class=\"btn btn-primary\">Alterar</a>
                                        <button class=\"btn btn-primary\" onclick=\"excluir(".$row['id'].")\">Excluir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    echo "</div>";
                    echo '<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Excluir livro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <div id="result" name="result"></div>
                                </div>
                            </div>
                    </div>';
                }
            }
?>