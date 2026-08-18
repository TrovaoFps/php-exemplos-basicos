<?php

// as variavel lá man
$n1 = 20;
$n2 = 10;

$multi = $n1 * $n2;

$desconto = 10;

$valorDesconto = ($multi / 100) * $desconto;

$precoFinal = $multi - $valorDesconto;

// aqui fudeu kkkkkk
if ($multi >= 200) {
    echo "O preço é: $precoFinal";
} elseif ($multi < 200) {
    echo "O preço é: $multi";
}
