<?php

    try{

        if ($senha !== $confirSenha) {
            echo "<script>alert('As senhas não são iguais!'); window.history.back();</script>";
            exit();
        }
    
        $hash  = password_hash($senha, PASSWORD_BCRYPT);
        
        include '../src/conexao.php';
      
        $sql = "INSERT INTO cadcliente(nome,sobrenome,cpf,email,senha) 
                    VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $sobrenome);
        $stmt->bindParam(3, $cpf);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $hash);
        $stmt->execute();     
        
    }catch(Exception $erro){
        echo $erro->getMessage();
    }

?>