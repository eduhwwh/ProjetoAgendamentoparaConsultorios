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
    <link rel="stylesheet" href="../../public/css/minhas_consul.css">
    <title>Minhas Consultas</title>
</head>

<body>

    <div class="menu-spacing"></div>

    <h1>Minhas Consultas</h1>

    <div class="cards-container">
        <?php foreach ($consultas as $consulta): ?>
            <div class="cards">
                <div class="pin">
                    <h3>Médico:
                        <?= htmlspecialchars($consulta['medico']) ?>
                    </h3>
                    <p>Especialidade:
                        <?= htmlspecialchars($consulta['especialidade']) ?>
                    </p>
                    <p>Data da Consulta:
                        <?= htmlspecialchars($consulta['data_consulta']) ?>
                    </p>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    <div class="menu-spacing"></div>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>©2025 VivaClin. Todos os direitos reservados.</p>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><img
                            src="https://img.icons8.com/material-outlined/24/ffffff/facebook-new.png"
                            alt="Facebook" /></a>
                    <a href="#" aria-label="Twitter"><img
                            src="https://img.icons8.com/material-outlined/24/ffffff/twitter-squared.png"
                            alt="Twitter" /></a>
                    <a href="#" aria-label="Instagram"><img
                            src="https://img.icons8.com/material-outlined/24/ffffff/instagram-new.png"
                            alt="Instagram" /></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>