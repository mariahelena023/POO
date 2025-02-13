<?php

class Animais{
    public $alimentacao;
    public $colunaVertebral;
    private $habitat;

    public function __construct($alimentacao, $colunaVertebral) {
        $this->alimentacao = $alimentacao;
        $this->colunaVertebral = $colunaVertebral;
    }

    public function alimentarSe() {
        return "alimentou-se";
    }
}

class Mamiferos extends Animais {
    public function mamar() {
        return "mamou";
    }
}

class Baleia extends Mamiferos {
    public function alimentarSe() {
        return "comeu peixe";
    }
}

class Morcego extends Mamiferos {
    public function alimentarSe() {
        return "chupou sangue";
    }
}

class Ornitorrinco extends Mamiferos {
    public function poderes() {
        return "bota ovos, brilha no escuro e solta veneno";
    }
}

$animalQualquer = new Animais("Carnívoro", True);
echo $animalQualquer -> alimentarSe() . "<br>";

$moby = new Baleia("Carnívoro", True);
echo $moby -> alimentarSe() . "<br>";

$batman = new Morcego("Carnívoro", True);
echo $batman -> alimentarSe();
?>
