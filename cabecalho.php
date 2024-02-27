<?php 
include('conectaDB.php');

session_start();

if(isset($_SESSION['idusuario'])){
    $nome = $_SESSION['nomeusuario'];
}
if(!isset($nome)){
?>
<nav class="navbar2">
    <div class="nav-container">
        <div class="logo">
            <img src="img/logo.png">

            <span class="logo-text">
                FlexFit
            </span>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Início</a>
                <hr>
            </li>
            <li><a href="">Trabalhe conosco</a>
                <hr>
            </li>
            <li><a href="">Seja nosso aluno</a>
                <hr>
            </li>
            <li><a class="nav-btn" href="cadastra.php">entrar | Cadastrar-se</a></li>
        </ul>
    </div>
</nav>
<?php 
}
else{
?>
<nav class="navbar2">
    <div class="nav-container">
        <a href="index.php" class="logo">
            <img src="img/logo.png">

            <span class="logo-text">
                FlexFit
            </span>
        </a>
        <ul class="nav-links">
            <li><a href="cronograma.php">Meu Cronograma</a>
                <hr>
            </li>
            <li><a href="videos.php">Vídeos</a>
                <hr>
            </li>
            <!-- <li><a href=""><i class="bi bi-person-circle"></i></a></li> -->
            <li><a class="nav-btn" href="logout.php">sair</a></li>
        </ul>
    </div>
</nav>
  
<?php
}
?>