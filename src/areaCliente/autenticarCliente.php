<?php

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql_busca_cli = "SELECT * FROM cadcliente
        WHERE email = ?";

        $stmt = $conn->prepare($sql_busca_cli);
        $stmt->bindParam(1,$email);

        $stmt->execute();

        $dados_cli = $stmt->fetch(PDO::FETCH_ASSOC);

        if($dados_cli){
           
            if(password_verify($senha,$dados_cli['senha'])){
                $id_usuario = $dados_cli['id'];
                session_start();
                $_SESSION['id_cli'] =  $id_cli;            
                header('Location:/ProjetoAgendamentoparaConsultorios/html/index.html');
            }else{
                header('Location:/ProjetoAgendamentoparaConsultorios/html/loginPaciente.html');
            }           
            
        }else{
            header('Location:/ProjetoAgendamentoparaConsultorios/html/login.html');
        }
    }catch(Exception $erro){

    }

?>