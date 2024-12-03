<?php

    $acao = $_GET['acao'];

    if($acao == 'formCadastrarMed'){

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $especialidade = $_POST['especialidade'];
        $crm = $_POST['crm'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirSenha = $_POST['confirSenha'];
        session_start();
        $id_usuarios = $_SESSION['id_usuario'];
        include '../src/areaMedico/formCadastrarMed.php';
        header('Location:../views/login.html');

    }else if($acao == 'formCadastrarCliente'){

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirSenha = $_POST['confirSenha'];

        include '../src/areaCliente/formCadastrarCliente.php';
        header('Location:../views/loginPaciente.html');
    }
?>