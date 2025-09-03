<?php 

namespace Gvg\Dbe2\interfaces;

use Gvg\Dbe2\classes\Paciente;

interface IMC
{
	public function calcImc(): void;
    public function showImc(): void;
    public function calc(Paciente $paciente): float;
    public function classifica(Paciente $paciente): string;
}
