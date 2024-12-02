<?php

    $dataConsulta = $_POST['dataConsulta'];
    $horaConsulta = $_POST['horaConsulta'];
   

    try{
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "INSERT INTO disponibilidadeconsulta(dataConsulta,horaConsulta) 
                    VALUES ('$dataConsulta','$horaConsulta')";

        $conn->exec($sql);      
        
        header('Location:/ProjetoAgendamentoparaConsultorios/html/index.html');
        exit();

    }catch(Exception $erro){
        echo $erro->getMessage();
    }

?>