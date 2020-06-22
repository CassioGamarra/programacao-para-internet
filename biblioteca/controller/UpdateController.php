<?php
    include '../classes/livro.php';
    include '../database/crud.php';
    include '../utils/utils.php';

    $livro = new Livro();
    $livro->setTitulo($_POST['titulo']);
    $livro->setAutor($_POST['autor']);
    $livro->setAno($_POST['ano']);
    $livro->setPaginas($_POST['paginas']);
    $livro->setGenero($_POST['genero']);
    $livro->setClassificacao($_POST['classificacao']);
    $id = $_POST['id'];
    
    updateBook($id, $livro);
?>