<?php
    function dashboard(){
        include_once './database/crud.php';

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
                            <option disabled selected >Selecione...</option>
                            <option value="livre">Livre</option>
                            <option value="10">10+</option>
                            <option value="12">12+</option>
                            <option value="14">14+</option>
                            <option value="16">16+</option>
                            <option value="18">18+</option>
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
<script>
    function excluir(id){
        let excluir = confirm("Deseja excluir o livro "+document.getElementById("titulo_excluir").innerHTML+" ?");
        
        if(excluir){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $(document).ready(function(){
                        $("#excluir").modal("show");
                    });
                    document.getElementById("result").innerHTML = this.responseText;

                    setTimeout(() => {
                        document.location.reload(true);
                    }, 1500);
                }
            };
            xhttp.open("GET", "excluir.php?id="+id, true);
            xhttp.send();
        }
    }
    function buscarLivros(){
        $param = document.getElementById("buscarLivro").value;
        if($param){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dashboardIndex").innerHTML = this.responseText;
                };
            }
            xhttp.open("GET", "buscar.php?busca="+$param, true);
            xhttp.send();
        }
        else{
            alert("Campo de busca vazio...")
        }
    }
    function limparBusca(){
        $param = document.getElementById("buscarLivro").value;
        if($param){
            document.location.reload(true);
        }
    }
</script>