<?php
namespace Gvg\Dbe2\classes;

use Gvg\Dbe2\classes\Abstracts\Pessoa;

class Paciente extends Pessoa
{
    private $prontuario;
    private $imc;

    public function __construct($nome, $prontuario, $idade = null, $peso = null, $altura = null)
    {
        $this->nome = $nome;
        $this->prontuario = $prontuario;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function getProntuario()
    {
        return $this->prontuario;
    }

    public function getImc()
    {
        return $this->imc;
    }

    public function setImc($imc)
    {
        $this->imc = $imc;
    }

    public function __toString(): string
    {
        $className = self::class;
        return "\nAtributos:"
            . "\n\tNome: $this->nome"
            . "\n\tProntuário: $this->prontuario"
            . ($this->idade ? "\n\tIdade: $this->idade" : "")
            . ($this->peso ? "\n\tPeso: $this->peso kg" : "")
            . ($this->altura ? "\n\tAltura: $this->altura" : "")
            . "\n";
    }
}
