
<?php
session_start();

if (!isset($_SESSION['id_med']) || !isset($_SESSION['nome_med'])) {
    header('Location: /ProjetoAgendamentoparaConsultorios/views/login.html');
    exit();
}

$idMedico = $_SESSION['id_med'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedDates'])) {
    $selectedDates = explode(",", $_POST['selectedDates']); // Transformar em array

    try {
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO disponibilidade(id_medico, dataConsulta) VALUES (:id_medico, :dataConsulta)";
        $stmt = $conn->prepare($sql);

        foreach ($selectedDates as $date) {
            // Validar a data antes de inserir
            if (DateTime::createFromFormat('Y-m-d', $date)) {
                $stmt->execute([
                    ':id_medico' => $idMedico,
                    ':dataConsulta' => $date,
                ]);
            }
        }
        echo "Disponibilidade cadastrada com sucesso!";
    } catch (Exception $erro) {
        error_log($erro->getMessage());
        echo "Ocorreu um erro ao salvar as datas. Tente novamente mais tarde.";
    }
} else {
    echo "Nenhuma data foi enviada.";
}
?>
