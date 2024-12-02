<?php

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirSenha = $_POST['confirSenha'];

    if ($senha !== $confirSenha) {
        echo "<script>alert('As senhas não são iguais!'); window.history.back();</script>";
        exit();
    }


    try{
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $hash  = password_hash($senha, PASSWORD_BCRYPT);

        $sql = "INSERT INTO cadcliente(nome,sobrenome,cpf,email,senha) 
                    VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $sobrenome);
        $stmt->bindParam(3, $cpf);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $hash);
        $stmt->execute();     
        
        header('Location:/ProjetoAgendamentoparaConsultorios/html/loginPaciente.html');
        exit();

    }catch(Exception $erro){
        echo $erro->getMessage();
    }

?>