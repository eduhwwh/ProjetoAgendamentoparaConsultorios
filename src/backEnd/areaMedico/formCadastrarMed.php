<?php

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $especialidade = $_POST['especialidade'];
    $crm = $_POST['crm'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $hash  = password_hash($senha, PASSWORD_BCRYPT);

        $sql = "INSERT INTO cadmedico(nome,sobrenome,especialidade, crm, email, senha) 
                    VALUES ('$nome','$sobrenome', '$especialidade', '$crm', '$email', '$hash')";

        $conn->exec($sql);      
        
        header('Location:/ProjetoAgendamentoparaConsultorios/html/index.html');
        exit();

    }catch(Exception $erro){
        echo $erro->getMessage();
    }

?>