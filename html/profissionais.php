<?php

    session_start();
    try{
        $conn = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM cadmedico";
        

        $resultado = $conn->query($sql);

        echo "<table>";
        echo "<tr>";
        echo "<td>Nome</td>";
        echo "</tr>";
        while($linha = $resultado->fetch()){
            echo "<tr>";
            echo "<td>".$linha['nome']."</td>";
            echo "</tr>";
        }
        echo "</table>";

    }catch(Exception $erro){
        echo $erro->getMessage();
    }

?>