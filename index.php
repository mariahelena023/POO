<?php

// class Galinha{
//     //ATRIBUTOS (características do meu objeto/classe)
//     public $ossos_porosos;
//     public $penas;
//     public $bico;
//     public $crista;

//     //MÉTODOS (são as ações que meu objeto/classe realiza)
//     public function botarOvos($quantidadeOvos){
//         echo "botou " . $quantidadeOvos . " ovos";
//         echo "<br>";
//     }
//     public function alimentar_se($alimento, $quantidadeAlimento){
//         echo "galinha se alimentou de " . $quantidadeAlimento . " " . $alimento;
//         echo "<br>";
//     }

// }

// $jurema = new Galinha();
// $jurema -> penas = 200;
// $jurema -> bico = True;

// // var_dump($jurema);

// $jurema -> botarOvos(2);
// $jurema -> alimentar_se("grãos", 36);


class Livro{
    public $paginas;
    public $titulo;
    public $genero;
    public $autor;
    public $editora;

    public function __construct($paginas, $titulo, $genero, $autor, $editora){
        $this -> paginas = $paginas;
        $this -> titulo = $titulo;
        $this -> genero = $genero;
        $this -> autor = $autor;
        $this -> editora = $editora;
    }

    // public function setTitulo($novoTitulo){
    //     $this -> titulo = $novoTitulo;
    // }
    // public function getTitulo(){
    //     return $this -> titulo;
    // }
    
    // public function setGenero($novoGenero){
    //     $this -> genero = $novoGenero;
    // }
    // public function getGenero(){
    //     return $this -> genero;
    // }
    
    // public function setAutor($novoAutor){
    //     $this -> autor = $novoAutor;
    // }
    // public function getAutor(){
    //     return $this -> autor;
    // }

    // public function setEditora($novoEditora){
    //     $this -> editora = $novoEditora;
    // }
    // public function getEditora(){
    //     return $this -> editora;
    // }

    // public function getInfo(){
    //     return "O título do livro é " . $this -> getTitulo() . ", do gênero " . $this -> getGenero() . ", do autor " . $this -> getAutor() . ", publicado pela editora " . $this -> getEditora();
    // }
}

// $livro1 = new Livro();
// $livro1 -> setTitulo("1984");
// $livro1 -> setGenero("Ficção");
// $livro1 -> setAutor("George Orwell");
// $livro1 -> setEditora("Grupo Companhia Das Letras");
// echo $livro1 -> getInfo();

$livro2 = new Livro(7, "A Branca de Neve", "Conto de Fadas", "Irmãos Grimm", "Disney"); 

echo "<pre>";
var_dump($livro2);
echo "</pre>";

?>