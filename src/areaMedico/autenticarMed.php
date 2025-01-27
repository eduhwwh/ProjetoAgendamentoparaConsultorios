<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM cadmedico WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$email]);
            $dados_med = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dados_med) {
                if (password_verify($senha, $dados_med['senha'])) {
                    $_SESSION['id_med'] = $dados_med['id'];
                    $_SESSION['nome_med'] = $dados_med['nome'];
                    header('Location: /ProjetoAgendamentoparaConsultorios/public/perfilMedico.php');
                    exit();
                } else {
                    echo "<script>alert('Senha incorreta!'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Usuário não encontrado!'); window.history.back();</script>";
            }
        } catch (Exception $erro) {
            echo "<script>alert('Erro no login: {$erro->getMessage()}'); window.history.back();</script>";
        }
    }
?>