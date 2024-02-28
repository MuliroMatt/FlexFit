<?php 
// include('cabecalho.php');
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
    <nav class="user-nav">
        <div class="logo">
            <img src="img/logo.png" width="50">
            <span class="logo-text">
                FlexFit
            </span>
        </div>
        <div class="nav-options">
            <h3 class="title">Minha conta</h3>
            <ul class="nav-list">
                <li><a href=""><i class="bi bi-person-fill"></i> Perfil</a></li>
            </ul>
            <h3 class="title">Cronograma e Planos</h3>
            <ul class="nav-list">
                <li><a href=""><i class="bi bi-calendar-week"></i> Cronograma</a></li>
                <li><a href=""><i class="bi bi-bullseye"></i> Objetivos</a></li>
            </ul>
            <h3 class="title">Navegação</h3>
            <ul class="nav-list">
                <li><a href="index.php"><i class="bi bi-house"></i> Início</a></li>
            </ul>
        </div>
        <div class="nav-bottom">
            <hr>
            <a class="exit-btn" href="logout.php"><i class="bi bi-box-arrow-right"></i>Sair</a>
        </div>
    </nav>
    <main class="main-user">
        <header></header>
    </main>
</body>
</html>