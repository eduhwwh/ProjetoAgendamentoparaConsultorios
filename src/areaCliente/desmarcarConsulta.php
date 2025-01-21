<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header('Location: ../views/loginPaciente.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $consulta_id = $_POST['consulta_id'];
    $id_paciente = $_SESSION['cliente_id'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se a consulta pertence ao paciente e não está cancelada
        $stmt = $conn->prepare("SELECT id FROM consultas WHERE id = ? AND id_paciente = ? AND cancelada = 0");
        $stmt->execute([$consulta_id, $id_paciente]);

        if ($stmt->rowCount() > 0) {
            // Atualizar consulta para cancelada
            $updateStmt = $conn->prepare("UPDATE consultas SET cancelada = 1 WHERE id = ?");
            $updateStmt->execute([$consulta_id]);
            $_SESSION['mensagem'] = "Consulta desmarcada com sucesso.";
        } else {
            $_SESSION['mensagem'] = "Consulta inválida ou já foi desmarcada.";
        }
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao desmarcar consulta: " . $e->getMessage();
    }
}

header('Location: minhasConsultas.php');
exit();
?>
