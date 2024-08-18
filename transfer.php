<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

function getFakeInfo($key) {
    $info = [
        'cpf' => 'CPF: 123.456.789-00 - Nome: João Silva',
        'telefone' => 'Telefone: (11) 98765-4321 - Nome: Maria Souza',
        'email' => 'Email: exemplo@teste.com - Nome: Ana Santos',
        'chave_aleatoria' => 'Chave Aleatória: ABCD-1234-EFGH-5678 - Nome: Carlos Pereira',
    ];

    return $info[$key] ?? 'Chave não encontrada.';
}

$pixKey = $_POST['pix_key'] ?? '';
$pixInfo = getFakeInfo($pixKey);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulação de Transferência PIX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container text-center mt-5">
    <h1 class="animate__animated animate__fadeInDown">Simulação de Transferência PIX</h1>
    <form action="transfer.php" method="post" class="animate__animated animate__fadeInUp mt-3">
        <div class="form-group">
            <select name="pix_key" class="form-control">
                <option value="">Selecione a chave PIX</option>
                <option value="cpf">CPF</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
                <option value="chave_aleatoria">Chave Aleatória</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Validar</button>
    </form>
    <?php if ($pixKey): ?>
        <div class="mt-3 alert alert-info animate__animated animate__fadeInUp">
            <?php echo $pixInfo; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
