<?php

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirSenha = $_POST['confirSenha'];
session_start();
$id_usuarios = $_SESSION['id_usuario'];

if ($senha !== $confirSenha) {
    echo "<script>alert('As senhas não são iguais!'); window.history.back();</script>";
    exit();
}

try {
    $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $hash = password_hash($senha, PASSWORD_BCRYPT);

    
            $sql = "INSERT INTO cadmedico(nome, sobrenome, especialidade, crm, email, senha) 
            VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $sobrenome);
            $stmt->bindParam(3, $especialidade);
            $stmt->bindParam(4, $crm);
            $stmt->bindParam(5, $email);
            $stmt->bindParam(6, $hash);
            $stmt->execute();

        // Redirecionamento após sucesso
        header('Location:/ProjetoAgendamentoparaConsultorios/html/login.html');
        exit();
    

} catch (Exception $erro) {
    echo "Erro ao cadastrar: " . $erro->getMessage();
}
?>