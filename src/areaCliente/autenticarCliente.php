<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    // Validação dos campos
    if (empty($email) || empty($senha)) {
        $_SESSION['erro'] = "Preencha todos os campos.";
        header("Location: ../../views/loginPaciente.html");
        exit();
    }

    try {
        // Criação da conexão PDO
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para buscar o cliente
        $sql_busca_cli = "SELECT id, nome, senha FROM cadcliente WHERE email = ?";
        $stmt = $conn->prepare($sql_busca_cli);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        // Busca os dados do cliente
        $dados_cli = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados_cli) {
            // Verifica se a senha é válida
            if (password_verify($senha, $dados_cli['senha'])) {
                // Armazena o ID e nome do cliente na sessão
                $_SESSION['cliente_id'] = $dados_cli['id'];
                $_SESSION['cliente_nome'] = $dados_cli['nome'];

                // Redireciona para a página inicial
                header("Location: ../../public/index.php");
                exit();
            } else {
                // Senha inválida
                $_SESSION['erro'] = "Senha incorreta.";
                header("Location: ../../views/loginPaciente.html");
                exit();
            }
        } else {
            // Cliente não encontrado
            $_SESSION['erro'] = "E-mail não encontrado.";
            header("Location: ../../views/loginPaciente.html");
            exit();
        }
    } catch (PDOException $e) {
        // Em caso de erro de conexão ou consulta
        $_SESSION['erro'] = "Erro no sistema: " . $e->getMessage();
        header("Location: ../../views/loginPaciente.html");
        exit();
    }
} else {
    // Se o acesso não for via POST, redireciona para o login
    header("Location: ../../views/loginPaciente.html");
    exit();
}
