<?php 
include('usernav.php');

// if (isset($_SESSION['idusuario'])){
    // $id = $_SESSION['idusuario'];
    // $nome = $_SESSION['nomeusuario'];
    // $sobrenome = $_SESSION['sobrenomeusuario'];
    // $email = $_SESSION['emailusuario'];
    // $funcao = $_SESSION['funcaousuario'];

    // $sql = "SELECT * FROM usuarios WHERE usu_id = '$id';";
    // $return = mysqli_query($link, $sql);
    // while($tbl = mysqli_fetch_array($return)){
    //     $nome = $tbl[1];    
    //     $sobrenome = $tbl[2];
    //     $email = $tbl[3];
    //     $funcao = $tbl[5];
    // } 

    // if ($funcao == 'a'){
    //     $funcao2 = 'Aluno';
    // }
    // elseif ($funcao == 'i'){
    //     $funcao2 = 'Instrutor';
    // }
// }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <script src="https://kit.fontawesome.com/fc1c840fda.js" crossorigin="anonymous"></script>
    <title>FlexFit</title>
</head>
<body>
    <main class="main-user">
        <!-- <h1 class="page-title">Meu Painel</h1> -->
        <div class="dashboard">
            <header class="page-header">
                <span class="page-title">Meu Painel</span>
            </header>
            <div class="profile-card">
                <div class="top">
                    <div class="user-pic"></div>
                    <div class="user-info">
                        <span class="name">
                            <?=$nome?> <br>
                            <?=$sobrenome?>
                        </span>
                        <span class="function">
                            <?=$funcao2?>
                        </span>
                    </div>
                    <hr>
                </div>
                <div class="achievements">
                    <span class="category"></span>
                </div>
            </div>
            <?php 
            if($funcao == "a"){
            ?>
            <div class="workout-card">
                <?php 
                $sql = "SELECT *
                        FROM treinos
                        WHERE tr_dia = (
                            CASE
                                WHEN DAYOFWEEK(NOW()) = 1 THEN 'Domingo'
                                WHEN DAYOFWEEK(NOW()) = 2 THEN 'Segunda-feira'
                                WHEN DAYOFWEEK(NOW()) = 3 THEN 'Terça-feira'
                                WHEN DAYOFWEEK(NOW()) = 4 THEN 'Quarta-feira'
                                WHEN DAYOFWEEK(NOW()) = 5 THEN 'Quinta-feira'
                                WHEN DAYOFWEEK(NOW()) = 6 THEN 'Sexta-feira'
                                WHEN DAYOFWEEK(NOW()) = 7 THEN 'Sábado'
                            END
                        ) AND fk_al_id = $al_id;";
                $result = mysqli_query($link, $sql);
                while($tbl = mysqli_fetch_array($result)){
                    $tr_id = $tbl['tr_id'];
                    $dia = $tbl['tr_dia'];  
                }
                if(isset($tr_id)){
                ?>
                    <h1 class="title"><?=$dia?></h1>
                    <hr>
                    <?php 
                    $sql = "SELECT *
                    FROM exercicios AS e
                    JOIN exercicios_treino AS et ON e.ex_id = et.fk_ex_id
                    WHERE fk_tr_id = $tr_id";
                    $result = mysqli_query($link, $sql);
                    while($tbl = mysqli_fetch_array($result)){
                    ?>
                    <div class="exercise-card">
                        <div class="left">
                            <div class="img"></div>
                            <span class="exe-name"><?=$tbl['ex_nome']?></span>
                        </div>
                        <div class="right">
                            <p><span class="exe-reps"><?=$tbl['et_repeticao']?> Repetições <?=$tbl['et_series']?>x</span></p>
                        </div>
                    </div>
                    <hr>
                <?php   
                    } 
                }
                else{
                ?>
                <h1>Dia de descanso</h1>
                <?php
                }
                ?>
            </div>
            <!-- <div class="progress-card"></div> -->
            <?php }?>
        </div>
    </main>
</body>
</html>
