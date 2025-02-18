
<?php

require_once('./interfaceCrud.php');

class Leitor implements Crud{
    public $nome;
    public $cpf;
    public $email;
    public $livro_emprestado = [];
    const qtd_livros = 3;

    public function __construct($nome, $cpf, $email){
        $this->cadastrar(['nome' => $nome, 'cpf' => $cpf, 'email' => $email]);
    }

    public function cadastrar($argumentos){
        $this->nome = $argumentos['nome'];
        $this->cpf = $argumentos['cpf'];
        $this->email = $argumentos['email'];
    }

    public function ler(){
        return [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'livro_emprestado' => $this->livro_emprestado
        ];
    }

    public function atualizar($argumentos){
        $this->nome = $argumentos['nome'] ?? $this->nome;
        $this->cpf = $argumentos['cpf'] ?? $this->cpf;
        $this->email = $argumentos['email'] ?? $this->email;
    }

    public function deletar(){
        // Use a biblioteca para deletar
        Biblioteca::deletarLeitor($this->cpf);
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getEmail(){
        return $this->email;
    }
}

?>
