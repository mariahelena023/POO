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
        $this -> titulo = $argumentos['titulo'];
        $this -> autor = $argumentos['autor'];
        $this -> isbn = $argumentos['isbn'];
        $this -> ano = $argumentos['ano'];
        $this -> genero = $argumentos['genero'];
        return "INSERT INTO livro(titulo, autor, isbn, ano, genero) VALUES ('$this -> titulo', '$this -> autor', '$this -> isbn', '$this -> ano', '$this -> genero')";
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


$host = 'localhost';
$nomeBancoDeDados = 'biblioteca143';
$usuario = 'root';
$password = '';

$configuracao = "mysql:host=$host;dbname=$nomeBancoDeDados;charset=UTF8";
$pdo = new PDO($configuracao, $usuario, $password);

$cursor = $pdo->prepare($sql);

$cursor->execute();

$resposta = $cursor->fetchAll();

foreach($resposta as $livro){
    echo "<div class='livro'><h2>Título: " . $livro['titulo'] . "</h2></div>";
    echo "<div class='livro'><p>Autor: " . $livro['autor'] . "</p></div>";
    echo "<div class='livro'><p>ISBN: " . $livro['isbn'] . "</p></div>";
    echo "<div class='livro'><p>Ano: " . $livro['ano'] . "</p></div>";
    echo "<div class='livro'><p>Livro: " . $livro['genero'] . "</p></div>";
    echo "==========================================================";
}

?>
