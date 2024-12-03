<?php
    try {

        if ($senha !== $confirSenha) {
            echo "<script>alert('As senhas não são iguais!'); window.history.back();</script>";
            exit(); 
        }

        $hash = password_hash($senha, PASSWORD_BCRYPT);
        include '../src/conexao.php';

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

        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../views/login.html';</script>"; // Mensagem de sucesso

    } catch (Exception $erro) {
        echo "Erro ao cadastrar: " . $erro->getMessage();
    }
?>
