<?php
    session_start();
    if (!isset($_SESSION['id_med']) || !isset($_SESSION['nome_med'])) {
        header('Location:/ProjetoAgendamentoparaConsultorios/html/login.html');
        exit();
    }

    $nomeMedico = $_SESSION['nome_med'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaClin</title>
</head>
<body>
    <h2>Olá, Dr(a). <?php echo htmlspecialchars($nomeMedico); ?>!</21>
    <p>Preencha os detalhes para cadastrar a sua disponibilidade:</p>
    <form action="..\src\backEnd\areaMedico\cadDisponibilidadeConsul.php" method="post">

        <label for="dataConsulta">Data Da Consulta: </label>
        <input type="text" name="dataConsulta" placeholder="EX: 11/09/2001">

        <br>

        <label for="horaConsulta">Horario: </label>
        <input type="text" name="horaConsulta" placeholder="EX: 11/09/2001">

        <br>

        <button type="submit">Cadastrar consulta</button>
    </form>
</body>
</html>