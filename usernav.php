<?php 
include('conectaDB.php');
?>

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
                <li><a href="usuario.php"><i class="bi bi-app"></i> Meu Painel</a></li>
                <li><a href="perfil.php"><i class="bi bi-person-fill"></i> Perfil</a></li>
            </ul>
            <h3 class="title">Cronograma e Planos</h3>
            <ul class="nav-list">
                <li><a href="treinos.php"><i class="bi bi-calendar-week"></i> Cronograma</a></li>
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