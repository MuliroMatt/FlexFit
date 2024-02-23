

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
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
        <a class="about-btn" href="#about">
            saiba mais
        </a>
        <div class="header-container" id="navbar">
            <div class="logo">
                <img src="img/logo.png">
                
                <span class="logo-text">
                    FlexFit
                </span>
            </div>
            <ul class="header-links">
                <li><a href="#inicio">Início</a> <hr></li>
                <li><a href="">Trabalhe conosco</a> <hr></li>
                <li><a href="">Seja nosso aluno</a> <hr></li>
                <li class="header-btn"><a href="cadastra.php">Cadastre-se</a></li>
            </ul>
        </div>
    </header>
    <main class="main-index">
        <div class="wrapper">
            <section class="about" id="about">
                <div class="about-container">
                    <div class="about-img">
                        <img src="./img/background2.5.jpg">
                    </div>
                    <div class="about-text">
                        <h2>
                            Conheça a FlexFit
                        </h2>
                        <div class="text">
                            <p>Na FlexFit, estamos comprometidos em proporcionar uma experiência de academia que vai além do comum. Nossa academia é mais do que um local para levantar pesos; é um ambiente onde você é capacitado a alcançar seus objetivos de saúde e fitness de maneira personalizada.</p>
                            <br>
                            <p>Nossa plataforma oferece acesso a treinos personalizados, interação com instrutores e muito mais. Junte-se a nós para uma experiência de fitness única e eficaz!</p>
                        </div>
                        <a href="cadastrocliente.php" class="about-btn">Faça Parte</a>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php 
    include("footer.php")
    ?>
</body>
</html>
<script src="script.js"></script>