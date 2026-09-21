<?php
$mensagem = '';
$statusClasse = '';

// Processa o formulário apenas quando for submetido via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $anoNascimento = filter_input(INPUT_POST, 'ano_nascimento', FILTER_VALIDATE_INT);
    $anoAtual = (int) date('Y');

    if (!empty($nome) && $anoNascimento && $anoNascimento <= $anoAtual) {
        $idade = $anoAtual - $anoNascimento;

        if ($idade >= 18) {
            $mensagem = "Acesso permitido, " . htmlspecialchars($nome) . "!";
            $statusClasse = "sucesso";

            // Registra no arquivo log_acessos.txt
            $registro = date('Y-m-d H:i:s') . " | Nome: {$nome} | Idade: {$idade} anos" . PHP_EOL;
            file_put_contents('log_acessos.txt', $registro, FILE_APPEND | LOCK_EX);
        } else {
            $mensagem = "Acesso negado, " . htmlspecialchars($nome) . "!";
            $statusClasse = "erro";
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos corretamente.";
        $statusClasse = "erro";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Acesso</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .card { background: white; padding: 20px; border-radius: 8px; max-width: 400px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .campo { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background-color: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .mensagem { padding: 10px; margin-bottom: 15px; border-radius: 4px; font-weight: bold; }
        .sucesso { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .erro { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="card">
    <h2>Verificação de Acesso</h2>

    <?php if (!empty($mensagem)): ?>
        <div class="mensagem <?= $statusClasse ?>">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="campo">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="campo">
            <label for="ano_nascimento">Ano de Nascimento:</label>
            <input type="number" id="ano_nascimento" name="ano_nascimento" min="1900" max="<?= date('Y') ?>" required>
        </div>

        <button type="submit">Verificar</button>
    </form>
</div>

</body>
</html>