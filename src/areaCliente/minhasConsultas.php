<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header('Location: ../views/loginPaciente.html');
    exit();
}

$id_paciente = $_SESSION['cliente_id'];

$conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT c.id, m.nome AS medico, m.especialidade, c.data_consulta
        FROM consultas c
        JOIN cadmedico m ON c.id_medico = m.id
        WHERE c.id_paciente = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_paciente]);
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Consultas</title>
</head>
<body>
    <h1>Minhas Consultas</h1>
    <table>
        <thead>
            <tr>
                <th>Médico</th>
                <th>Especialidade</th>
                <th>Data da Consulta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= htmlspecialchars($consulta['medico']) ?></td>
                    <td><?= htmlspecialchars($consulta['especialidade']) ?></td>
                    <td><?= htmlspecialchars($consulta['data_consulta']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
