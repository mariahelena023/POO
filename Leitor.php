<?php

require_once('./interfaceCrud.php');

class Leitor implements Crud{
    public $nome;
    public $cpf;
    public $email;
    public $livro_emprestado = [];
    const qtd_livros = 3;

    public function __construct($nome, $cpf, $email){
        $this -> cadastrar($nome, $cpf, $email);
    }

    public function cadastrar($argumentos){
        $this->nome = $argumentos['nome'];
        $this->cpf = $argumentos['cpf'];
        $this->email = $argumentos['email'];
    }

    public function ler(){

    }

    public function atualizar(){

    }

    public function deletar(){

    }
}

?>