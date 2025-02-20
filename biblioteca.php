<?php

require_once('./Livro.php'); 
require_once('./Leitor.php'); 

class Biblioteca {

    public static $listaDeLivros = [];
    public static $leitores = [];

    public static function emprestar($livro, $leitor){
        if ($livro->getStatusLivro() == "DISPONÍVEL") {
            $livro->setStatusLivro();
            array_push($leitor->livro_emprestado, $livro);
        } else {
            echo "<script>alert('LIVRO NÃO PODE SER EMPRESTADO')</script>";
        }
    }

    public static function devolver() {
    }

    public static function cadastrarLivro($titulo, $autor, $isbn, $ano){
        $argumentos = [
            'titulo' => $titulo,
            'autor' => $autor,
            'isbn' => $isbn,
            'ano' => $ano,
            'genero' => $genero
        ];

        $livro = new Livro($argumentos);
        return $livro;
    }

    public static function consultarLivro() {
        return self::$listaDeLivros;
    }

    public static function cadastrarLeitor($nome, $cpf, $email) {
        $leitor = new Leitor($nome, $cpf, $email);
        array_push(self::$leitores, $leitor);
    }

    public static function consultarLeitor() {
        return self::$leitores;
    }

    public static function deletarLivro($isbn){
        self::$listaDeLivros = array_filter(self::$listaDeLivros, function($livro) use ($isbn) {
            return $livro->getISBN() !== $isbn;
        });
    }

    public static function deletarLeitor($cpf){
        self::$leitores = array_filter(self::$leitores, function($leitor) use ($cpf) {
            return $leitor->getCpf() !== $cpf;
        });
    }

    public static function atualizarLivro($isbn, $argumentos){
        foreach(self::$listaDeLivros as $livro) {
            if($livro->getISBN() === $isbn) {
                $livro->atualizar($argumentos);
                break;
            }
        }
    }
}



$host = 'localhost';
$nomeBancoDeDados = 'biblioteca143';
$usuario = 'root';
$password = '';

$configuracao = "mysql:host=$host;dbname=$nomeBancoDeDados;charset=UTF8";

$pdo = new PDO($configuracao, $usuario, $password);


$sql = Biblioteca::cadastrarLivro("o auto da compadecida", "ariano suasssuna", "12345678901", "1234", "sla");

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
