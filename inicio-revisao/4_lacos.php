<?php

// Laço (FOR) para Tabuada 8
for ($i = 1; $i <=10; $i++) {
    echo "8 x $i = " . (8 * $i) . "\n";
}

// While -(Enquanto) Contagem regressiva
echo "<br>";
$i = 5;
while ($i >0) {
    echo $i. "<br>";
    $i--;
}

// Do while - (Faça enquanto) Executa ao menos 1 vez
$x = 10;
do {
    echo "x vale: $x <br>";
    $x++;
} while ($x < 10);