<?php
session_start();

if (!isset($_SESSION['cliente_id'])) {
    // Redireciona para o login caso o cliente não esteja logado
    header("Location: ../../views/loginPaciente.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TESTE</h1>
</body>
</html>