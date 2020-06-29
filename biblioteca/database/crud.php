<?php
    include_once 'conn.php';
    include_once 'create.php';
    function allBooks(){
        $conn = conn();
        if($conn->connect_error) {
            createDatabase();
        }else{
            $sql = "select * from livro";
            $result = $conn->query($sql);
            $conn->close();
            return $result;
        }
    }

    function getBook($id){
        $conn = conn();
        if($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
        $sql = "select * from livro where id = $id";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    function searchBooks($title){
        $conn = conn();
        if($conn->connect_error) {
            createDatabase();
        }else{
            $sql = "select * from livro where titulo like '%$title%'";
            $result = $conn->query($sql);
            $conn->close();
            return $result;
        }
    }

    function insertBook($livro){
        $conn = conn();
        if($conn->connect_error) {
            die(
                erro("Falha na conexão: " . $conn->connect_error)//Caso ocorra uma falha
            );
        }
        
        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $ano = $livro->getAno();
        $paginas = $livro->getPaginas();
        $genero = $livro->getGenero();
        $classificacao = $livro->getClassificacao();
    
        $sql = "insert into livro(titulo, autor, ano, paginas, genero, classificacao)
                values('$titulo','$autor', $ano, $paginas, '$genero', '$classificacao')";

        if ($conn->query($sql) === true){
            sucesso("O livro ".$titulo." foi cadastrado com sucesso!", "../index");
            $livro->setTitulo('');
            $livro->setAutor('');
            $livro->setAno('');
            $livro->setPaginas('');
            $livro->setGenero('');
            $livro->setClassificacao('');
        }
        else{
            erro("Erro ao cadastrar: ".$conn->error);
        }
        $conn->close();
    }

    function updateBook($id, $livro){
        $conn = conn();
        if($conn->connect_error) {
            die(
                erro("Falha na conexão: " . $conn->connect_error)//Caso ocorra uma falha
            );
        }
        
        $titulo = $livro->getTitulo();
        $autor = $livro->getAutor();
        $ano = $livro->getAno();
        $paginas = $livro->getPaginas();
        $genero = $livro->getGenero();
        $classificacao = $livro->getClassificacao();
    
        $values = "titulo = '$titulo', autor = '$autor', ano = '$ano', paginas = '$paginas', genero = '$genero', classificacao = '$classificacao' ";

        $sql = "update livro set $values where id = $id";
        
        if ($conn->query($sql) === true){
            sucesso("O livro ".$titulo." foi atualizado com sucesso!", "../index");
            $livro->setTitulo('');
            $livro->setAutor('');
            $livro->setAno('');
            $livro->setPaginas('');
            $livro->setGenero('');
            $livro->setClassificacao('');
        }
        else{
            erro("Erro ao atualizar: ".$conn->error);
        }
        $conn->close();
    }

    function deleteBook($id, $titulo){
        include_once './utils/utils.php';
        $conn = conn();
        if($conn->connect_error) {
            die(
                erro("Falha na conexão: " . $conn->connect_error)//Caso ocorra uma falha
            );
        }
        
        $sql = "delete from livro where id = $id";
        if ($conn->query($sql) === true){
            sucesso("O livro ".$titulo." foi excluído com sucesso!", "index");
        }
        else {
            erro("Erro ao deletar: ".$conn->error);
        }
        $conn->close();
    }
?>