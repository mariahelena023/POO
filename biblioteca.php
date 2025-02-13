<?php

class Biblioteca{
    public static function emprestar($livro, $leitor){
        array_push($leitor -> livro_emprestado, $livro);
    }
    public static function devolver(){

    }
    public static function cadastrarLivro($titulo, $autor, $isbn, $ano){
        $livro = new Livro($titulo, $autor, $isbn, $ano);
        return $livro;

    }
    public static function consultarLivro(){

    }
    public static function cadastrarLeitor($nome, $cpf, $email){
        $leitor = new Leitor($nome, $cpf, $email);
        return $leitor;
    }
    public static function consultarLeitor(){
        
    }
    
}

class Livro{
    private $titulo;
    private $autor;
    private $isbn;
    private $ano;
    public $status;

    public function __construct($titulo, $autor, $isbn, $ano){
        $this -> titulo = $titulo;
        $this -> autor = $autor;
        $this -> isbn = $isbn;
        $this -> ano = $ano;
        $this -> status = "DISPONÍVEL";
    }

    public function emprestar(){

    }
    public function devolver(){

    }

}

class Leitor{
    public $nome;
    public $cpf;
    public $email;
    public $livro_emprestado = [];
    const qtd_livros = 3;

    public function __construct($nome, $cpf, $email){
        $this -> nome = $nome;
        $this -> cpf = $cpf;
        $this -> email = $email;
    }
    
    public function emprestar(){

    }
    public function devolver(){

    }
}

$vinicius = Biblioteca::cadastrarLeitor("vinicius", "12345678910", "vinicius@gmail.com");

echo "<pre>";
var_dump($vinicius);
echo "</pre>";

$arteDaGuerra = Biblioteca::cadastrarLivro("Arte da Guerra", "Sun Tuz", "1234567890", "500 a.C");

echo "<pre>";
var_dump($arteDaGuerra);
echo "</pre>";

Biblioteca::emprestar($arteDaGuerra, $vinicius);

?>