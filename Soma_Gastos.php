<?php
session_start();

// Inicializa as variáveis de números e soma se não estiverem definidas
if (!isset($_SESSION['numeros']) ) {
    $_SESSION['numeros'] = array();
}

if (!isset($_SESSION['soma'])) {
    $_SESSION['soma'] = 0;
}

// Verifica se o botão "Somar" foi clicado
if (isset($_POST['somar'])) {
    // Obtém o número digitado pelo usuário
    $numero = $_POST['numero'];
    
    // Adiciona o número à lista de números
    $_SESSION['numeros'][] = $numero;
    
    // Soma todos os números na lista
    $_SESSION['soma'] = array_sum($_SESSION['numeros']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Somador PHP</title>
</head>
<body>
    <form method="post">
        <label for="numero">Digite um número:</label>
        <input type="number" name="numero" id="numero" required>
        <input type="submit" name="somar" value="Somar">
    </form>
    
    <h3>Números digitados:</h3>
    <ul>
        <?php foreach ($_SESSION['numeros'] as $numero): ?>
            <li><?php echo $numero; ?></li>
        <?php endforeach; ?>
    </ul>
    
    <p>Soma total: <?php echo $_SESSION['soma']; ?></p>
</body>
</html>
