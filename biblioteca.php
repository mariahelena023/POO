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
        $livro = new Livro($titulo, $autor, $isbn, $ano);
        array_push(self::$listaDeLivros, $livro);
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

?>
