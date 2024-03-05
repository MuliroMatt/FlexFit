<?php 
include('../conectaDB.php');
session_start();

$id = $_SESSION['idadmin'];
$nome = $_SESSION['nomeadmin'];
$email = $_SESSION['emailadmin'];
?>

<header class="user-header">
    <a href="index.php" class="logo">
        <img src="../img/logo.png" width="50">
        <span class="logo-text">
            FlexFit
        </span>
    </a>
    <ul class="user-header-list">
        <li class="dropdown" id="dropdown">
            <div class="top" onclick="openDropdown()">
                <div class="img"></div>
                <?=$nome?><i class="bi bi-chevron-compact-down" id="arrow"></i>
            </div>
            <div class="dropdown-content" id="dropdown-content">
                <ul>
                    <li><a href="">Adicionar Conta</a></li>
                </ul>
            </div>
        </li>
        <li class="close-btn" id="closebtn" onclick="closeWorkoutList()"><button><i class="bi bi-x-lg"></i></button></li>
    </ul>
</header>
<nav class="user-nav">
    <div class="nav-options">
        <h3 class="title">Administradores</h3>
        <ul class="nav-list">
            <li><a href=""><i class="bi bi-person-lines-fill"></i> Lista Admins</a></li>
            <li><a href=""><i class="bi bi-person-fill-add"></i> Cadastra Admins</a></li>
        </ul>
        <h3 class="title">Alunos</h3>
        <ul class="nav-list">
            <li><a href="listaaluno.php"><i class="bi bi-person-lines-fill"></i> Lista Alunos</a></li>
            <li><a href=""><i class="bi bi-person-fill-add"></i> Cadastra Alunos</a></li>
        </ul>
        <h3 class="title">Instrutores</h3>
        <ul class="nav-list">
            <li><a href="listainstrutor.php"><i class="bi bi-person-lines-fill"></i> Lista Instrutores</a></li>
            <li><a href=""><i class="bi bi-person-fill-add"></i> Cadastra Instrutores</a></li>
        </ul>
        <h3 class="title">Aparelhos</h3>
        <ul class="nav-list">
            <li><a href=""><i class="bi bi-person-lines-fill"></i> Lista Aparelhos</a></li>
            <li><a href=""><i class="bi bi-person-fill-add"></i> Cadastra Aparelhos</a></li>
        </ul>
    </div>
    <div class="nav-bottom">
        <hr>
        <a class="exit-btn" href="logout.php"><i class="bi bi-box-arrow-right"></i>Sair</a>
    </div>
</nav>
<script src="../script.js"></script>