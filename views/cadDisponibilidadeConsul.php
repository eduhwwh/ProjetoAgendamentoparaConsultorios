<?php
    session_start();
    if (!isset($_SESSION['id_med']) || !isset($_SESSION['nome_med'])) {
        header('Location:/ProjetoAgendamentoparaConsultorios/views/login.html');
        exit();
    }

    $nomeMedico = $_SESSION['nome_med'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['selectedDates'])) {
            $selectedDates = $_POST['selectedDates']; // Ex: "6,12,20,24,30"
            $datesArray = explode(",", $selectedDates); // Transforma em array

            // Aqui você pode salvar as datas no banco de dados
            foreach ($datesArray as $date) {
            // Salvar cada data com o ID do médico
            // Exemplo: INSERT INTO disponibilidade (id_medico, data) VALUES ($id_medico, $date);
            }

            echo "Disponibilidade cadastrada com sucesso!";
        } else {
            echo "Nenhuma data selecionada.";
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/cadDisponibilidade.css">
        
        <title>VivaClin</title>
    </head>
    <body>
        <div class="menu-spacing"></div>
        <h2>Olá, Dr(a). <?php echo htmlspecialchars($nomeMedico); ?>!</h2>
        <p>Selecione os dias em que você estará disponível:</p>

        <!-- Calendário Interativo -->
        <div id="calendar-container">
            <div id="calendar-header">
                <button id="prev-month">&lt;</button>
                <span id="month-year"></span>
                <button id="next-month">&gt;</button>
            </div>
            <div id="calendar"></div>
        </div>


        <!-- Formulário para envio -->
        <form action="../src/areaMedico/cadDisponibilidadeConsul.php" method="post">
            <input type="hidden" id="selectedDates" name="selectedDates">
            <button type="submit">Cadastrar Disponibilidade</button>
        </form>

        <script src="../public/Js/Disponibilidade.js"></script>
    </body>
</html>