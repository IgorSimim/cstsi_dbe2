<?php
namespace Gvg\Dbe2\classes;

use Exception;
use Gvg\Dbe2\classes\Abstracts\Pessoa;
use Gvg\Dbe2\classes\Paciente;
use Gvg\Dbe2\interfaces\IMC;

class Medico extends Pessoa implements IMC{

	private $CRM, $especialidade, $imc;

	public function __construct($nome, $crm,$especialidade,$idade=null,$altura=1, $peso=1)
	{
		$this->nome = $nome;
		$this->CRM = $crm;
		$this->especialidade = $especialidade;
		$this->idade = $idade;
		$this->peso = $peso;
		$this->altura = $altura;
		$this->calcImc();
	}

	public function getCRM(){
		return $this->CRM;
	}

	public function calcImc():void 
	{
		try {
			if(isset($this->peso)&&isset($this->altura)) {
				$this->imc = $this->peso/$this->altura**2;		
			} else{
				throw new Exception("Erro, defina peso e altura primeiro!");
			}
		} catch (Exception $error) {
			echo $error->getMessage();
			foreach($error->getTrace() as $trace)
				 print_r($trace);
			throw $error;
		}
	}

	public function showImc():void
	{
		if(is_numeric($this->imc))
			echo "\nO IMC do Médico $this->nome é: " . number_format($this->imc, 2) . "\n";
	}

	public function calc(Paciente $paciente): float
	{
		if ($paciente->peso === null || $paciente->altura === null) {
			throw new Exception("Peso e altura do paciente devem estar definidos para calcular o IMC!");
		}
		
		if ($paciente->peso <= 0 || $paciente->altura <= 0) {
			throw new Exception("Peso e altura devem ser valores positivos!");
		}
		
		$imc = $paciente->peso / ($paciente->altura ** 2);
		$paciente->setImc($imc);
		
		return $imc;
	}

	public function classifica(Paciente $paciente): string
	{
		$imc = $paciente->getImc();
		
		if ($imc === null) {
			$imc = $this->calc($paciente);
		}
		
		if ($imc < 18.5) {
			return "Abaixo do peso";
		} elseif ($imc >= 18.5 && $imc < 25) {
			return "Peso normal";
		} elseif ($imc >= 25 && $imc < 30) {
			return "Sobrepeso";
		} elseif ($imc >= 30 && $imc < 35) {
			return "Obesidade grau I";
		} elseif ($imc >= 35 && $imc < 40) {
			return "Obesidade grau II";
		} else {
			return "Obesidade grau III";
		}
	}

	public function __toString()
	{
		$className = self::class;
		return 	"\n=== Dados de $className ==="
			. "\nHerança: ".parent::class
			. "\nAtributos:"
			. "\nIMC: ".$this->imc
			. "\n\tNome: $this->nome"
			. ($this->idade ? "\n\tIdade: $this->idade" : "")
			. "\n\tEspecialidade: $this->especialidade"
			. "\n\tCRM: $this->CRM\n";
	}
}