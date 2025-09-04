<?php 

echo "<pre>";

use Gvg\Dbe2\classes\Atleta;
use Gvg\Dbe2\classes\Medico;
// use Gvg\Dbe2\classes\Abstracts\Pessoa as PessoaAbstrata;
// use Gvg\Dbe2\classes\Pessoa;
use Gvg\Dbe2\classes\logs\Relatorio;

$atl1 = new Atleta("Givanildo Vieira de Souza", 41, 1.72, 85, 55000, 4);
$med1 = new Medico("Pualo Paixão",122343,"Fisioterapeuta");


// echo "\nAtleta ".(($atl1 instanceof PessoaAbstrata)?"eh":"não eh")." PessoaAbstrata";
// echo "\nMédico ".(($med1 instanceof Pessoa)?"eh":"não eh")."  Pessoa";

$relatorio = new Relatorio();

$relatorio->add($atl1);
$relatorio->add($med1);

$relatorio->imprime();