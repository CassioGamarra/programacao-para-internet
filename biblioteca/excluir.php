<?php
    include_once 'functions/functions.php';
    include_once 'database/crud.php';
    
    $result = getBook($_REQUEST['id']);
    while ($row = $result->fetch_assoc()){
        $id = $row['id'];
        $titulo = $row['titulo'];
    }
    if($result){
        deleteBook($id, $titulo);
    }
?>