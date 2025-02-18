<?php

require_once('./interfaceCrud.php');

class Livro implements Crud{
    private $titulo;
    private $autor;
    private $isbn;
    private $ano;
    protected $status;

    public function __construct($titulo, $autor, $isbn, $ano){
        $this -> cadastrar($titulo, $autor, $isbn, $ano);
    }

    public function setStatusLivro(){
        if ($this->status == "DISPONÍVEL"){
            $this->status = "INDISPONÍVEL";
        } else{
            $this->status = "DISPONÍVEL";
        }
    }

    public function cadastrar($argumentos){
        $this-> titulo = $argumentos['titulo'];
        $this->autor = $argumentos['autor'];
        $this->isbn = $argumentos['isbn'];
        $this->ano = $argumentos['ano'];
        $this->status = "DISPONÍVEL";
    }

    public function ler(){
    }

    public function atualizar(){
    }

    public function deletar(){
    }
}

?>
