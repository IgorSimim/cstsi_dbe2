<?php

namespace Gvg\Dbe2\classes;

use Exception;
use Gvg\Dbe2\classes\Abstracts\Pessoa;
use Gvg\Dbe2\interfaces\IMC;
use Gvg\Dbe2\interfaces\Funcionario;

class Atleta extends Pessoa implements IMC, Funcionario
{

	// public $altura, $peso;
	private $imc;

	public function __construct($nome, $idade, $altura, $peso, $salario = 1200, $tempoContrato = 0)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
		$this->salario = $salario;
		$this->tempoContrato = $tempoContrato;
		// parent::__construct($nome, $idade, $peso, $altura); //Apenas para Pessoa Concreta
		$this->calcImc();
	}

	public function setAltura(float $altura)
	{
		$this->altura = $altura;
		$this->calcImc();
	}

	public function setPeso(float $peso)
	{
		$this->peso = $peso;
		$this->calcImc();
	}

	public function __set($name, $value)
	{

		if ($name == 'imc') {
			var_dump($name, $value);
			if (is_array($value)) {
				if ($value[0] > $value[1])
					$this->imc = $value[0] / $value[1] ** 2;
				else throw new Exception("Erro, o primeiro valor deve ser o peso.");
			} else {
				echo "Erro ao atualizar imc, esperado um array [peso, altura]";
			}
		} else {
			$this->$name = $value;
		}
	}

	public function calcImc(): void
	{
		try {
			if (isset($this->peso) && isset($this->altura)) {
				$this->imc = $this->peso / $this->altura ** 2;
			} else {
				throw new Exception("Erro, defina peso e altura primeiro!");
			}
		} catch (Exception $error) {
			echo $error->getMessage();
			foreach ($error->getTrace() as $trace)
				print_r($trace);
			throw $error;
		} finally {
			$this->showImc();
		}
	}

	public function showImc(): void
	{
		if (is_numeric($this->imc))
			echo "\nO IMC do $this->nome é: " . number_format($this->imc, 2) . "\n";
	}

	public function mostrarSalario(): string
	{
		return "O salário do $this->nome é: R$ " . number_format($this->salario, 2) . "\n";
	}

	public function mostrarTempoContrato(): string
	{
		return "O tempo de contrato do $this->nome é: " . $this->tempoContrato . " anos\n";
	}

	public function __toString(): string
	{
		$saida = "\n===Dados do " . self::class
			. "==="
			. "\nNome: $this->nome"
			. ($this->idade ? "\nIdade: $this->idade" : "")
			. "\nPeso: $this->peso"
			. "\nAltura: $this->altura";

		$saida .= (isset($this->imc))
			? "\nIMC: " . number_format($this->imc, 3)
			: "";
		return $saida;
	}
}
