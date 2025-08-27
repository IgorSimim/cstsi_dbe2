<?php
include_once "Pessoa.php";

class IMC{

    public static function toString() {
        return self::class;
    }

    public static function calc(Pessoa $objPessoa){
        if (!is_numeric($objPessoa->altura) || !is_numeric($objPessoa->peso)) {
            echo "\nIMC {$objPessoa->nome}: Erro, informe peso e altura corretamente." . "\n";
            return null;
        }

        $imc = $objPessoa->peso / ($objPessoa->altura ** 2);
        $objPessoa->setImc($imc);
        return $imc;
    }

    public static function classifica(Pessoa $objPessoa):string{
        $imc = $objPessoa->getImc();

        if (!is_numeric($imc)) {
            $imc = self::calc($objPessoa);
            if (!is_numeric($imc)) {
                return "IMC não calculado para {$objPessoa->nome}";
            }
        }

        if ($imc < 16) {
            $categoria = "Magreza grave";
        } elseif ($imc < 17) {
            $categoria = "Magreza moderada";
        } elseif ($imc < 18.5) {
            $categoria = "Magreza leve";
        } elseif ($imc < 25) {
            $categoria = "Peso normal";
        } elseif ($imc < 30) {
            $categoria = "Sobrepeso";
        } elseif ($imc < 35) {
            $categoria = "Obesidade Grau I";
        } elseif ($imc < 40) {
            $categoria = "Obesidade Grau II";
        } else {
            $categoria = "Obesidade Grau III";
        }

        $msg = "Classificação IMC de {$objPessoa->nome}: {$categoria}";
        echo "\n" . $msg . "\n";
        return $msg;
    }
}