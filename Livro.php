<?php

require_once('./interfaceCrud.php');

class Livro implements Crud{
    private $titulo;
    private $autor;
    private $isbn;
    private $ano;
    protected $status;

    public function __construct($titulo, $autor, $isbn, $ano){
        $this->cadastrar(['titulo' => $titulo, 'autor' => $autor, 'isbn' => $isbn, 'ano' => $ano]);
    }

    public function setStatusLivro(){
        if ($this->status == "DISPONÍVEL"){
            $this->status = "INDISPONÍVEL";
        } else{
            $this->status = "DISPONÍVEL";
        }
    }

    public function cadastrar($argumentos){
        $this->titulo = $argumentos['titulo'];
        $this->autor = $argumentos['autor'];
        $this->isbn = $argumentos['isbn'];
        $this->ano = $argumentos['ano'];
        $this->status = "DISPONÍVEL";
    }

    public function ler(){
        return [
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'isbn' => $this->isbn,
            'ano' => $this->ano,
            'status' => $this->status
        ];
    }

    public function atualizar($argumentos){
        $this->titulo = $argumentos['titulo'] ?? $this->titulo;
        $this->autor = $argumentos['autor'] ?? $this->autor;
        $this->isbn = $argumentos['isbn'] ?? $this->isbn;
        $this->ano = $argumentos['ano'] ?? $this->ano;
    }

    public function deletar(){
        // Use a biblioteca para deletar
        Biblioteca::deletarLivro($this->isbn);
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getISBN(){
        return $this->isbn;
    }

    public function getAno(){
        return $this->ano;
    }

    public function getStatusLivro(){
        return $this->status;
    }
}

?>
