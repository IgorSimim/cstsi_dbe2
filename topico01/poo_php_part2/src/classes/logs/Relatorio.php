<?php

namespace Gvg\Dbe2\classes\logs;

use Gvg\Dbe2\classes\Abstracts\Pessoa;
use Gvg\Dbe2\interfaces\Funcionario;

class Relatorio
{

	private array $pessoas = []; //lista

	public function add(Pessoa $pessoa): void
	{
		$this->pessoas[] = $pessoa;
	}

	public function log(Pessoa $pessoa): void
	{
		echo "\n\nlog: \n" . $pessoa; //__toString retorna objeto como string
	}

	public function imprime(): void
	{
		echo "\n### RELATORIO ###\n";
		foreach ($this->pessoas as $pessoa)
			$this->log($pessoa);

		if ($pessoa instanceof Funcionario)
			echo "\n===============\nContrato: 
	\nSalario: R$ " . number_format($pessoa->salario, 2, ',', '.') . "\nContrato de {$pessoa->tempoContrato} anos.";
		echo "\n#############\n";
	}
}
