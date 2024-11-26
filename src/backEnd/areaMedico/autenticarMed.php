<?php

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql_busca_med = "SELECT * FROM cadmedico
        WHERE email = ?";

        $stmt = $conn->prepare($sql_busca_med);
        $stmt->bindParam(1,$email);

        $stmt->execute();

        $dados_med = $stmt->fetch(PDO::FETCH_ASSOC);

        if($dados_med){
           
            if(password_verify($senha,$dados_med['senha'])){
                $id_usuario = $dados_med['id'];
                session_start();
                $_SESSION['id_med'] =  $id_med;            
                header('Location:/ProjetoAgendamentoparaConsultorios/html/cadDisponibilidadeConsul.html');
            }else{
                header('Location:/ProjetoAgendamentoparaConsultorios/html/login.html');
            }           
            
        }else{
            header('Location:/ProjetoAgendamentoparaConsultorios/html/login.html');
        }
    }catch(Exception $erro){

    }

?>