<?php

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
    <link rel="stylesheet" href="style.css">
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