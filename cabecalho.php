<?php 
include('conectaDB.php');

session_start();

if(isset($_SESSION['idusuario'])){
    $nome = $_SESSION['nomeusuario'];
}
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
            <li><a href="index.php">Início</a>
                <hr>
            </li>
            <li><a href="">Trabalhe conosco</a>
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
