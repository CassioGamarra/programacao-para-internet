<?php
    class Livro{
        var $titulo;
        var $autor;
        var $ano;
        var $paginas;
        var $genero;
        var $classificacao;

        function setTitulo($_titulo) {
            $this->titulo = $_titulo;
        }
        function getTitulo(){
            return $this->titulo;
        }

        function setAutor($_autor) {
            $this->autor = $_autor;
        }
        function getAutor(){
            return $this->autor;
        }

        function setAno($_ano) {
            $this->ano = $_ano;
        }
        function getAno(){
            return $this->ano;
        }

        function setPaginas($_paginas) {
            $this->paginas = $_paginas;
        }
        function getPaginas(){
            return $this->paginas;
        }

        function setGenero($_genero) {
            $this->genero = $_genero;
        }
        function getGenero(){
            return $this->genero;
        }

        function setClassificacao($_classificacao) {
            $this->classificacao = $_classificacao;
        }
        function getClassificacao(){
            return $this->classificacao;
        }
    }
?>