<?php

// notas dos 5 alunos
$notas = [7.5, 9.0, 5.5, 8.0, 10.0];
$soma = 0;
$maiorNota = $notas[0];
$menorNota = $notas[0];

// o começo da morte
foreach ($notas as $nota) {
    $soma += $nota;

    if ($nota > $maiorNota) {
        $maiorNota = $nota;
    }

    if ($nota < $menorNota) {
        $menorNota = $nota;
    }
}


$totalAlunos = count($notas);
$media = $soma / $totalAlunos;

// após a morte
echo "Notas registradas: " . implode(", ", $notas) . "\n";
echo "<br>Média da turma: " . number_format($media, 2, ',', '.') . "\n";
echo "<br>Maior nota: " . number_format($maiorNota, 1, ',', '.') . "\n";
echo "<br>Menor nota: " . number_format($menorNota, 1, ',', '.') . "\n";
