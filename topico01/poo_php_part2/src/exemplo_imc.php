<?php
require_once 'interfaces/IMC.php';
require_once 'classes/Abstracts/Pessoa.php';
require_once 'classes/Paciente.php';
require_once 'classes/Medico.php';

use Gvg\Dbe2\classes\Paciente;
use Gvg\Dbe2\classes\Medico;

$medico = new Medico("Dr. João Silva", "CRM12345", "Endocrinologia", 45, 1.75, 70);

$pacientes = [
    new Paciente("Maria Santos", "P001", 25, 50, 1.60),   
    new Paciente("João Oliveira", "P002", 30, 90, 1.70),  
    new Paciente("Ana Costa", "P003", 22, 45, 1.65),      
    new Paciente("Pedro Lima", "P004", 35, 110, 1.80),    
];

foreach ($pacientes as $paciente) {
    echo "--- " . $paciente->nome . " ---\n";
    
    try {
        // Calculando o IMC
        $imc = $medico->calc($paciente);
        echo "IMC calculado: " . number_format($imc, 2) . "\n";
        
        // Classificando o IMC
        $classificacao = $medico->classifica($paciente);
        echo "Classificação: " . $classificacao . "\n";
        
        echo $paciente;
        
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage() . "\n";
    }
    
    echo "\n" . str_repeat("-", 50) . "\n";
}
