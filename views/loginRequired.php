<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css"> <!-- Atualize o caminho se necessário -->
    <title>Login Necessário</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .modal-container {
            text-align: center;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
        }
        .modal-container h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .modal-container p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 1.5rem;
        }
        .modal-container a {
            text-decoration: none;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .modal-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="modal-container">
        <h1>Login Necessário</h1>
        <p>Você precisa estar logado para agendar uma consulta.</p>
        <a href="../public/index.php">Voltar</a>
        <a href="../views/loginPaciente.html">Fazer Login</a>
    </div>
</body>
</html>
