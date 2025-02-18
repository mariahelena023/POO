<?php

require('Biblioteca.php');

if(isset($_POST['titulo'], $_POST['autor'], $_POST['isbn'], $_POST['ano'])){
    Biblioteca::cadastrarLivro($_POST['titulo'], $_POST['autor'], $_POST['isbn'], $_POST['ano']);
}

if(isset($_POST['isbn'], $_POST['update'])){
    Biblioteca::atualizarLivro($_POST['isbn'], [
        'titulo' => $_POST['new_titulo'],
        'autor' => $_POST['new_autor'],
        'ano' => $_POST['new_ano']
    ]);
}

if(isset($_POST['isbn'], $_POST['delete'])){
    Biblioteca::deletarLivro($_POST['isbn']);
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
            foreach(Biblioteca::consultarLivro() as $livroAtual){
                echo '<div class="livro">';
                    echo '<h2>TÍTULO: '. $livroAtual->getTitulo() .'</h2>';
                    echo '<h2>AUTOR: '. $livroAtual->getAutor() .'</h2>';
                    echo '<h2>ISBN: '. $livroAtual->getISBN() .'</h2>';
                    echo '<h2>ANO: '. $livroAtual->getAno() .'</h2>';
                    echo '<h2>STATUS: '. $livroAtual->getStatusLivro() .'</h2>';
                    echo '<form method="POST">
                            <input type="hidden" name="isbn" value="'.$livroAtual->getISBN().'">
                            <input type="text" name="new_titulo" placeholder="Novo Título">
                            <input type="text" name="new_autor" placeholder="Novo Autor">
                            <input type="text" name="new_ano" placeholder="Novo Ano">
                            <button type="submit" name="update">Atualizar</button>
                            <button type="submit" name="delete">Deletar</button>
                          </form>';
                echo '</div>';
            }
        ?>
    </div>
    <form method="POST">
        <label for="titulo">Título do Livro</label>
        <input type="text" name="titulo" required>
        <label for="autor">Autor do Livro</label>
        <input type="text" name="autor" required>
        <label for="isbn">ISBN do Livro</label>
        <input type="text" name="isbn" required>
        <label for="ano">Ano do Livro</label>
        <input type="text" name="ano" required>

        <input type="submit" value="Cadastrar"> 
    </form>
</body>
</html>
