<?php
  session_start();

  // Verifica se o cliente está logado
  $clienteLogado = isset($_SESSION['cliente_id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="../public/css/responsividade.css"><!--  Arquivo de responsividade -->
  <script src="../public/Js/app.js"></script>

  <title>VivaClin</title>
</head>

<body class="main-bg">
<aside class="menu white-bg">
    <div class="main-content menu-content">
        <h1 class="logo">
            <a href="#">LOGO</a>
        </h1>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
        <nav class="menu-nav">
            <ul>
                <?php if (isset($_SESSION['cliente_id'])): ?>
                    <li><a href="../src/areaCliente/agendarConsulta.php">Agendar consulta</a></li>
                    <li><a href="../src/areaCliente/minhasConsultas.php">Minhas consultas</a></li>
                    <li><a href="../src/logoutCli.php" onclick="return confirm('Tem certeza que deseja sair?')">Sair</a></li>
                <?php else: ?>
                    <li><a href="../views/loginRequired.php">Agendar consulta</a></li>
                    <li><a href="#">Consultas</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Perfil</a>
                        <div class="dropdown-content">
                            <a href="../views/loginPaciente.html">Área Paciente</a>
                            <a href="../views/login.html">Área Médico</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>






  <!-- carrousel -->
  <section>
    <div class="carrosel">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../public/img/equipe.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../public/img/consulta.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../public/img/pediatria.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
      <div class="intro-text-content">
        <h2>Bem Vindos!</h2>
        <p>Agende sua consulta em poucos cliques e<br>garanta seu horário ideal com rapidez e praticidade!</p>
        <a href="#simulacao" class="btn-primary">Agende sua Consulta</a>
      </div>
    </div>
  </section>
  <!-- carrousel -->

  <div class="menu-spacing"></div>


  <section id="description" class="description">
    <div class="container">
      <h2>Especialidades</h2>

      <div class="benefits">
        <div class="benefit-item">
          <i class="fa-solid fa-heart-pulse icon"></i>
          <h3>Cardiologia</h3>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus illum, quo labore enim quas beatae? At
            perferendis quo facilis neque odit beatae officia aspernatur hic adipisci eaque? Modi, minus autem.</p>
        </div>
        <div class="benefit-item">
          <i class="fa-solid fa-baby icon"></i>
          <h3>Pediatria</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit aliquid consequuntur doloribus facere cum.
            Dolorum culpa hic qui asperiores quis perferendis tempore! Recusandae excepturi provident ea possimus, nemo
            magnam? Facere?</p>
        </div>
        <div class="benefit-item">
          <i class="fa-solid fa-brain icon"></i>
          <h3>Piscologia</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus repellendus pariatur error, dicta
            rerum totam nobis adipisci sed ab iure cupiditate, eligendi blanditiis cum dolorem? Facere enim error hic
            totam?</p>
        </div>
      </div>
    </div>
  </section>

  <div class="menu-spacing"></div>


  <div class="consulta-container">
    <p>Agende a sua consulta</p>
    <button>AGENDA CONSULTA</button>
  </div>

  <div class="menu-spacing"></div>


  <section class="gallery">
    <div class="container">
      <div class="gallery-item">
        <img src="../public/img/fachada.webp" alt="Imagem 1" class="gallery-image">
      </div>
      <div class="gallery-item">
        <img src="../public/img/recepcao.webp" alt="Imagem 2" class="gallery-image">
      </div>
      <div class="gallery-item">
        <img src="../public/img/Consultorio.webp" alt="Imagem 3" class="gallery-image">
      </div>
      <div class="gallery-item">
        <img src="../public/img/Exames.webp" alt="Imagem 4" class="gallery-image">
      </div>
      <div class="gallery-item">
        <img src="../public/img/corredor.webp" alt="Imagem 5" class="gallery-image">
      </div>
      <div class="gallery-item">
        <img src="../public/img/recepcao.webp" alt="Imagem 6" class="gallery-image">
      </div>
    </div>
  </section>

  <div class="menu-spacing"></div>

  <section class="container-plano">

    <h2 class="promo">Promoções de Planos</h2>

    <div class="cards-plano">
      <div class="card">
        <h3>Plano Essencial</h3>
        <p>Consultas e exames básicos.</p>
        <p class="price">R$ 99,90/mês</p>
        <a href="#" class="but">Assinar</a>
      </div>

      <div class="card">
        <h3>Plano Premium</h3>
        <p>Inclui consultas especializadas e exames avançados.</p>
        <p class="price">R$ 199,90/mês</p>
        <a href="#" class="but">Assinar</a>
      </div>

      <div class="card">
        <h3>Plano Familiar</h3>
        <p>Atendimento para toda a família com descontos especiais.</p>
        <p class="price">R$ 299,90/mês</p>
        <a href="#" class="but">Assinar</a>
      </div>
    </div>
  </section>

  <div class="menu-spacing"></div>


  <!-- Rodapé -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <p>©2025 VivaClin. Todos os direitos reservados.</p>
        <div class="social-icons">
          <a href="#" aria-label="Facebook"><img
              src="https://img.icons8.com/material-outlined/24/ffffff/facebook-new.png" alt="Facebook" /></a>
          <a href="#" aria-label="Twitter"><img
              src="https://img.icons8.com/material-outlined/24/ffffff/twitter-squared.png" alt="Twitter" /></a>
          <a href="#" aria-label="Instagram"><img
              src="https://img.icons8.com/material-outlined/24/ffffff/instagram-new.png" alt="Instagram" /></a>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


</body>

</html>