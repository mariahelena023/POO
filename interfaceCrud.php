<?php

interface Crud {
    public function cadastrar($argumentos);
    public function ler();
    public function atualizar($argumentos);
    public function deletar();
}

?>
