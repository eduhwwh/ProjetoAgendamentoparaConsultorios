<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header('Location: ../views/loginPaciente.html');
    exit();
}

if (!isset($_GET['id_medico'])) {
    die('ID do médico não especificado.');
}

$id_medico = $_GET['id_medico'];
$id_paciente = $_SESSION['cliente_id'];
$data_consulta = date('Y-m-d H:i:s'); // Pode ser ajustado para permitir escolha de data

try {
    $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inserir a consulta
    $sql = "INSERT INTO consultas (id_paciente, id_medico, data_consulta) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_paciente, $id_medico, $data_consulta]);

    echo "Consulta marcada com sucesso!";
    header('Location: minhasConsultas.php');
    exit();
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
