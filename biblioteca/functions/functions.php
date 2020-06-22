<?php
    function dashboard(){
        include './database/crud.php';

        if(allBooks()){
            $result = allBooks();
            if($result->num_rows == 0){
                erro("nenhum livro cadastrado...");
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
                                        <h5 class=\"card-title\">".$row['titulo']."</h5>
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
                                        <a href=\"#\" class=\"btn btn-primary\">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    echo "</div>";
                }
            }
        }
    }

    function cadastro(){
        echo '
            <div class="container">
                <form action="/biblioteca/controller/RegisterController.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="titulo">Nome do livro</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                        <label for="ano">Ano lançamento</label>
                        <input type="number" class="form-control" id="ano" name="ano" required>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="paginas">Nº de páginas</label>
                        <input type="number" class="form-control" id="paginas" name="paginas" min="1" required>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="genero">Gênero</label>
                        <input type="text" class="form-control" id="genero" name="genero" required >
                        </div>
                        <div class="form-group col-md-3">
                        <label for="classificacao">Classificação</label>
                        <select id="classificacao" name="classificacao" class="form-control" required>
                            <option selected>Selecione...</option>
                            <option value="livre">Livre</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12" style="text-align: center">
                        <button type="submit" id="cadastrar" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form> 
            </div>
        ';
    }
?>