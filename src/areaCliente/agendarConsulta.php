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
    <title>Agendar Consulta</title>
    <style>
        /* Adicionar estilos básicos */
        .container { width: 80%; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 10px 15px; background-color: #28a745; color: #fff; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
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
