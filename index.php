<?php 
include("conectaDB.php");

session_start();

if(isset($_SESSION['idusuario'])){
    // echo "<script>window.location.href='usuario.php';</script>";
    $nome = $_SESSION['nomeusuario'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/fc1c840fda.js" crossorigin="anonymous"></script>
    <title>FlexFit</title>
</head>

<body>
    <header class="header-principal" id="inicio">
        <div class="bg-container">
            <div class="bg-image"></div>
            <div class="mascara-esquerda"></div>
            <div class="mascara-direita"></div>
            <h1 class="bg-title">Treine como <br> um <span>campeão</span></h1>
        </div>
        <nav class="navbar" id="navbar">
            <div class="nav-container">
                <a href="#inicio" class="logo">
                    <img src="img/logo.png">

                    <span class="logo-text">
                        FlexFit
                    </span>
                </a>
                <ul class="nav-links">
                    <li><a href="#inicio">Início</a>
                        <hr>
                    </li>
                    <li><a href="cadastrainstrutor.php">Trabalhe conosco</a>
                        <hr>
                    </li>
                    <li><a href="cadastraaluno.php">Seja nosso aluno</a>
                        <hr>
                    </li>
                    <?php if(!isset($nome)){?>
                    <li><a class="nav-btn" href="cadastra.php">entrar | Cadastrar-se</a></li>
                    <?php }else{?>
                    <li><a href="usuario.php">meu perfil</a>
                        <hr>
                    </li>
                    <li><a class="nav-btn" href="logout.php">sair</a></li>
                    <?php }?>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main-index">
        <div class="wrapper">
            <section class="about">
                <div class="about-container">
                    <div class="about-img">
                        <img src="./img/background2.5.jpg">
                    </div>
                    <div class="about-text">
                        <h2>
                            Conheça a FlexFit
                        </h2>
                        <div class="text">
                            <p>Na FlexFit, estamos comprometidos em proporcionar uma experiência de academia que vai
                                além do comum. Nossa academia é mais do que um local para levantar pesos; é um ambiente
                                onde você é capacitado a alcançar seus objetivos de saúde e fitness de maneira
                                personalizada.</p>
                            <br>
                            <p>Nossa plataforma oferece acesso a treinos personalizados, interação com instrutores e
                                muito mais. Junte-se a nós para uma experiência de fitness única e eficaz!</p>
                        </div>
                        <a href="cadastra.php" class="about-btn">Faça Parte</a>
                    </div>
                </div>
            </section>
        </div>
        <section class="infos">
            <div class="wrapper">
                <div class="infos-container">
                    <div class="colunas">
                        <header class="info-header">
                            <i class="fa-solid fa-dumbbell"></i>
                            <h3>Treinos</h3>
                        </header>
                        <p>Acesse com facilidade sua programação de treinos, permitindo que você ajuste sua rotina de acordo com sua disponibilidade e objetivos pessoais de forma conveniente e eficiente.</p>
                    </div>
                    <div class="colunas">
                        <div class="info-header">
                            <i class="fa-solid fa-video"></i>
                            <h3>Videos</h3>
                        </div>
                        <p>Aprimore seu conhecimento e técnica de exercícios com nossos vídeos instrutivos detalhados, garantindo que você execute cada movimento corretamente e otimize seus resultados dentro e fora da academia. <br>Cadastre-se e já tenha acesso.</p>
                    </div>
                    <div class="colunas">
                        <div class="info-header">
                            <i class="fa-solid fa-medal"></i>
                            <h3>Objetivos</h3>
                        </div>
                        <p>Estabeleça objetivos e acompanhe seu desenvolvimento ao longo do tempo, mantendo o foco em sua jornada de fitness com determinação e motivação.</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="wrapper">
            <section class="division">
                
            </section>
        </div>
    </main>
    <?php 
    include("footer.php")
    ?>
</body>

</html>
<script src="script.js"></script>