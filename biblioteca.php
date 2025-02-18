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
}

Biblioteca::cadastrarLivro("Dom Casmurro", "Machado de Assis", "123456789876", "1899");
Biblioteca::cadastrarLeitor("Caique Fernandes", "123.123.123-12", "caique@gmail.com");

echo "<pre>";
var_dump(Biblioteca::$listaDeLivros); 
echo "</pre>";

?>
