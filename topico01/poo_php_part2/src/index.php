<?php

require "../vendor/autoload.php";

echo "<pre>";

// use Gvg\Dbe2\classes\Atleta;


// $atl1 = new Atleta("Luizito Soares",36,1.8,80);

// // echo "<hr>";//---
// // echo "<pre>";
// // $atl1->showImc();

// // var_dump($atl1);

// // require "exemplo_01_slugfy.php";
// require "exemplo_02_abstract_class.php";
// // require "exemplo_03_traits.php";
// // require "exemplo_04_interface.php";

use Gvg\Dbe2\classes\Atleta;
use Gvg\Dbe2\classes\Medico;
use Gvg\Dbe2\classes\logs\Relatorio;

$atl1 = new Atleta("Givanildo Vieira de Souza", 41, 1.72, 85, 55000, 4);
$med1 = new Medico("Pualo Paixão",122343,"Fisioterapeuta");

$relatorio = new Relatorio();

$relatorio->add($atl1);
// $relatorio->add($med1);

$relatorio->imprime();