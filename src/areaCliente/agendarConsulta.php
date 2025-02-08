<?php
// Sessão iniciada para verificar o login do paciente
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header('Location: ../views/loginPaciente.html');
    exit();
}

// Conexão com o banco de dados
$conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Buscar médicos cadastrados
$sql = "SELECT * FROM cadmedico";
$stmt = $conn->prepare($sql);
$stmt->execute();
$medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/agendarConsulta.css">
    <link rel="shortcut icon" href="../../public/img/logo1.webp" type="image/x-icon">

    <title>Agendar Consulta</title>

</head>

<body>
    <div class="menu-spacing"></div>

    <div class="container">
        <h1>Agendar Consulta</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>CRM</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicos as $medico): ?>
                    <tr>
                        <td><?= htmlspecialchars($medico['nome'] . ' ' . $medico['sobrenome']) ?></td>
                        <td><?= htmlspecialchars($medico['especialidade']) ?></td>
                        <td><?= htmlspecialchars($medico['crm']) ?></td>
                        <td>
                            <a href="marcarConsulta.php?id_medico=<?= $medico['id'] ?>" class="btn">Marcar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</body>

</html>