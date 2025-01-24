<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header('Location: ../views/loginPaciente.html');
    exit();
}

$id_paciente = $_SESSION['cliente_id'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT c.id, m.nome AS medico, m.especialidade, c.data_consulta, c.cancelada
            FROM consultas c
            JOIN cadmedico m ON c.id_medico = m.id
            WHERE c.id_paciente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_paciente]);
    $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Feedback de mensagens
$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : null;
unset($_SESSION['mensagem']);
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

    <!-- Exibir mensagem de feedback -->
    <?php if ($mensagem): ?>
        <div class="mensagem">
            <p><?= htmlspecialchars($mensagem) ?></p>
        </div>
    <?php endif; ?>

    <div class="cards-container">
    <?php if (empty($consultas)): ?>
        <p>Você ainda não possui consultas agendadas.</p>
    <?php else: ?>
        <?php foreach ($consultas as $consulta): ?>
            <div class="cards <?php if ($consulta['cancelada']) echo 'canceled'; ?>">
                <?php if (!$consulta['cancelada']): ?>
                    <div class="pin"></div> <!-- Exibe o alfinete apenas se não estiver cancelada -->
                <?php endif; ?>
                <h3>Médico: <?= htmlspecialchars($consulta['medico']) ?></h3>
                <p>Especialidade: <?= htmlspecialchars($consulta['especialidade']) ?></p>
                <p>Data da Consulta: 
                    <?php
                    // Remover a hora da data
                    $data_formatada = date("d/m/Y", strtotime($consulta['data_consulta']));
                    echo htmlspecialchars($data_formatada);
                    ?>
                </p>
                <?php if ($consulta['cancelada']): ?>
                    <p style="color: crimson;">Consulta Cancelada</p>
                <?php else: ?>
                    <form method="POST" action="desmarcarConsulta.php" onsubmit="return confirm('Deseja realmente desmarcar esta consulta?');">
                        <input type="hidden" name="consulta_id" value="<?= htmlspecialchars($consulta['id']) ?>">
                        <button type="submit">Desmarcar</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>©2025 VivaClin. Todos os direitos reservados.</p>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook">
                        <img src="https://img.icons8.com/material-outlined/24/ffffff/facebook-new.png" alt="Facebook" />
                    </a>
                    <a href="#" aria-label="Twitter">
                        <img src="https://img.icons8.com/material-outlined/24/ffffff/twitter-squared.png" alt="Twitter" />
                    </a>
                    <a href="#" aria-label="Instagram">
                        <img src="https://img.icons8.com/material-outlined/24/ffffff/instagram-new.png" alt="Instagram" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
