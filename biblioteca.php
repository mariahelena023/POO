<?php
class Biblioteca{

    public static $listaDeLivros = [];
    public static $leitor = [];

    public static function emprestar($livro, $leitor){
        if($livro -> getStatusLivro() == "DISPONÍVEL"){
            $livro -> setStatusLivro();
            array_push($leitor -> livro_emprestado, $livro);
        } else{
            echo "<script>alert('LIVRO NÃO PODE SER EMPRESTADO')</script>";
        }

    }

    public static function devolver(){

    }

    public static function cadastrarLivro($titulo, $autor, $isbn, $ano) {
        $livro = new Livro($titulo, $autor, $isbn, $ano);
        array_push(Biblioteca::$listaDeLivros, $livro);
    }

    public static function consultarLivro(){
            
    }

    public static function cadastrarLeitor($nome, $cpf, $email){
        $leitor = new Leitor($nome, $cpf, $email);
        self::$leitor[] = $leitor;
        return $leitor;
    }

    public static function consultarLeitor() {
    }
}

class Livro {
    private $titulo;
    private $autor;
    private $isbn;
    private $ano;
    protected $status;

    public function __construct($titulo, $autor, $isbn, $ano) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->ano = $ano;
        $this->status = "DISPONÍVEL";
    }

    public function setStatusLivro(){
        if($this -> status == "DISPONÍVEL"){
            $this -> status = "INDISPONÍVEL";
        } else{
            $this -> status = "DISPONÍVEL";
        }
    }
    public function getStatusLivro(){
        if($this -> status == "DISPONÍVEL"){
            $this -> status = "INDISPONÍVEL";
        } else{
            $this -> status = "DISPONÍVEL";
        }
    }

    public function getTitulo(){
        return $this -> titulo;
    }
    public function getAutor(){
        return $this -> autor;
    }
    public function getISBN(){
        return $this -> isbn;
    }
    public function getAno(){
        return $this -> ano;
    }
}

class Leitor {
    public $nome;
    public $cpf;
    public $email;
    public $livro_emprestado = [];
    const qtd_livros = 3;

    public function __construct($nome, $cpf, $email) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }
}

if(isset($_POST['titulo'], $_POST['autor'], $_POST['isbn'], $_POST['ano'])){
    Biblioteca::cadastrarLivro($_POST['titulo'], $_POST['autor'], $_POST['isbn'], $_POST['ano']);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <h1>Biblioteca Senac</h1>
    <div id="livros">
        <?php
            foreach(Biblioteca::$listaDeLivros as $livroAtual){
                echo '<div class = livro>';
                    echo '==============================================================';
                    echo '<h2>TÍTULO: '. $livroAtual -> getTitulo() .'</h2>';
                    echo '<h2>AUTOR: '. $livroAtual -> getAutor() .'</h2>';
                    echo '<h2> ISBN: '. $livroAtual -> getISBN() .'</h2>';
                    echo '<h2>ANO: '. $livroAtual -> getAno() .'</h2>';
                    echo '==============================================================';
                echo '</div>';
            }
        ?>
    </div>
    <form method="POST">
        <label for="">Título do Livro</label>
        <input type="text" name = "titulo">
        <label for="">Autor do Livro</label>
        <input type="text" name = "autor">
        <label for="">ISBN do Livro</label>
        <input type="text" name = "isbn">
        <label for="">Ano do Livro</label>
        <input type="text" name = "ano">

        <input type="submit" value = "cadastrar"> 
    </form>
</body>
</html>