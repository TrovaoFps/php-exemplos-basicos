<?php

// Vetor (array simples)
$frutas = ["Maça", "Banana", "Uva"];

// Exibindo (Usando laço)
foreach ($frutas as $indice => $fruta) {
    echo "Posição $indice: $fruta\n";
}

// Matriz (array completo "Linhas e colunas)
$matriz = [
    ["Max Verstappen", "Lando Norris", "Oscar Piastri"],
    ["Charler Lelclerc", "Lewis Hamilton", "Kimi Antonelli"],
    ["Fernando Alonso", "Calor Sainz", "Ayrton Senna"]
];

// Exibindo nome dos pilotos
echo "\n\n";
echo "Melhores pilotos da F1: \n\n";
foreach ($matriz as $linha) {
    foreach ($linha as $piloto) {
        echo $piloto . "|";
    }
    echo "\n";
}