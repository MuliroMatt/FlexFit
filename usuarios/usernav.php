<?php 
include('../conectaDB.php');
session_start();




$id = $_SESSION['idusuario'];
$nome = $_SESSION['nomeusuario'];
$sobrenome = $_SESSION['sobrenomeusuario'];
$email = $_SESSION['emailusuario'];
$funcao = $_SESSION['funcaousuario'];
$img = $_SESSION['imgusuario'];
if ($funcao == 'a'){
    $funcao2 = 'Aluno';
    $sql = "SELECT * FROM alunos WHERE fk_usu_id = '$id';";
    $return = mysqli_query($link, $sql);
    
    while($tbl = mysqli_fetch_array($return)){
        $al_id = $tbl['al_id'];
        $cpf = $tbl['al_cpf'];
        $nasc = $tbl['al_dataNasc'];
        $genero = $tbl['al_sexo'];
        $endereco = $tbl['al_endereco'];
        $telefone = $tbl['al_telefone'];
    }
}
elseif ($funcao == 'i'){
    $funcao2 = 'Instrutor';
    $sql = "SELECT * FROM instrutores WHERE fk_usu_id = '$id';";
    $return = mysqli_query($link, $sql);

    while($tbl = mysqli_fetch_array($return)){
        $instr_id = $tbl['instr_id'];
        $cpf = $tbl['instr_cpf'];
        $telefone = $tbl['instr_telefone'];
        $turno = $tbl['instr_turno'];
        $genero = $tbl['instr_sexo'];
    }
}

?>
<link rel="icon" type="image/png" href="../img/logo.png">
<header class="user-header">
    <a href="../index.php" class="logo">
        <img src="../img/logo.png" width="50">
        <span class="logo-text">
            FlexFit
        </span>
    </a>
    <ul class="user-header-list">
        <li class="navigation"><a href="../index.php"><i class="bi bi-house"></i> Inicio</a></li>
        <li class="dropdown" id="dropdown">
            <div class="top" onclick="openDropdown()">
                <div class="img">
                    <img src="data:image/jpg;base64,<?=$img?>">
                </div>
                <?=$nome?> <?=$sobrenome?><i class="bi bi-chevron-compact-down" id="arrow"></i>
            </div>
            <div class="dropdown-content" id="dropdown-content">
                <ul>
                    <li><a href="">Adicionar Conta</a></li>
                </ul>
            </div>
        </li>
        <?php 
        if(isset($_GET['treino'])){
            // $treino = $_GET['treino'];
            // // echo $treino
        ?>
        <li class="close-btn on" id="closebtn"><a href="treinos.php"><i class="bi bi-x-lg"></i></a></li>
        <?php }?>
        <li class="close-btn" id="closebtn" onclick="closeWorkoutList()"><button><i class="bi bi-x-lg"></i></button></li>
    </ul>
</header>
<nav class="user-nav">
    <div class="nav-options">
        <h3 class="title">Minha conta</h3>
        <ul class="nav-list">
            <?php 
            if($funcao == 'a'){
            ?>
            <li><a href="dashboard.php"><i class="bi bi-columns"></i> Meu Painel</a></li>       
            <li><a href="perfil.php"><i class="bi bi-person-fill"></i> Perfil</a></li>
            <li><a href="treinos.php"><i class="bi bi-calendar-week"></i> Cronograma</a></li>
            <!-- <li><a href=""><i class="bi bi-bullseye"></i> Objetivos</a></li> -->
            <?php 
            }
            elseif ($funcao == 'i'){
            ?>
            <li><a href="perfil.php"><i class="bi bi-person-fill"></i> Perfil</a></li>
            <li><a href="meusalunos.php"><i class="bi bi-people-fill"></i> Alunos</a></li>
            <?php }?>
        </ul>
    </div>
    <div class="nav-bottom">
        <hr>
        <a class="exit-btn" href="../logout.php"><i class="bi bi-box-arrow-right"></i>Sair</a>
    </div>
</nav>
<script src="../script.js"></script>