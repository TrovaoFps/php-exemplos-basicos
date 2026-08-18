<?php

function calcularIMC($peso, $altura)
{
    if ($altura <= 0) {
        return 0;
    }
    return $peso / ($altura * $altura);
}

$peso = 75.0;
$altura = 1.75;

$imc = calcularIMC($peso, $altura);
$imcFormatado = number_format($imc, 2, ',', '.');

echo "Peso: {$peso} kg<br>";
echo "Altura: {$altura} m<br>";
echo "IMC Calculado: {$imcFormatado}<br>";
echo "Classificação: ";

if ($imc < 18.5) {
    echo "Abaixo do peso<br>";
} elseif ($imc >= 18.5 && $imc < 25.0) {
    echo "Peso normal<br>";
} elseif ($imc >= 25.0 && $imc < 30.0) {
    echo "Sobrepeso<br>";
} else {
    echo "Obesidade<br>";
}
