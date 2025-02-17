<?php
session_start();

// Verifica se o médico está logado
if (!isset($_SESSION['id_med']) || !isset($_SESSION['nome_med'])) {
    header('Location: /ProjetoAgendamentoparaConsultorios/views/login.html');
    exit();
}

$idMedico = $_SESSION['id_med'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['selectedDates'])) {
    $selectedDates = explode(",", $_POST['selectedDates']); 
   
    $validDates = [];
    foreach ($selectedDates as $date) {
        if (DateTime::createFromFormat('Y-m-d', $date)) {
            $validDates[] = $date;
        }
    }

    if (empty($validDates)) {
        echo "Nenhuma data válida foi enviada.";
        exit();
    }

    try {
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
        $conn->beginTransaction();

        $sql = "INSERT INTO disponibilidade(id_medico, dataConsulta) VALUES (:id_medico, :dataConsulta)";
        $stmt = $conn->prepare($sql);

        foreach ($validDates as $date) {
            $stmt->execute([
                ':id_medico' => $idMedico,
                ':dataConsulta' => $date,
            ]);
        }

    
        $conn->commit();

    
        $totalDates = count($validDates);
        echo "Disponibilidade cadastrada com sucesso! Total de datas registradas: $totalDates.";
    } catch (Exception $erro) {

        if ($conn->inTransaction()) {
            $conn->rollBack();
        }
        error_log("Erro ao cadastrar disponibilidade: " . $erro->getMessage());
        echo "Ocorreu um erro ao salvar as datas. Tente novamente mais tarde.";
    } finally {
      
        $conn = null;
    }
} else {
    echo "Nenhuma data foi enviada.";
}
?>