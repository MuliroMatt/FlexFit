<?php 
include('usernav.php');

$sql = "SELECT * FROM treinos 
        WHERE fk_al_id = $al_id
        ORDER BY FIELD(tr_dia, 'Domingo','Segunda-feira', 'Terça-feira', 'Quarta-feira', 
        'Quinta-feira', 'Sexta-feira', 'Sábado' );";
$return = mysqli_query($link, $sql);
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
    <main class="main-treinos">
        <div class="treinos-container">
            <header class="page-header">
                <span class="page-title">Treinos</span>
            </header>
            <div class="workout-container">
                <?php 
                while($tbl = mysqli_fetch_array($return)){
                ?>
                <div class="workout-card">
                    <div class="card-infos">
                        <h3 class="title"><?=$tbl['tr_dia']?></h3>
                        <!-- <span class="level"><i class="bi bi-1-square"></i> Iniciante</span> -->
                        <div class="btns">
                            <button class="btn see" onclick="openWorkoutList()">Ver Treino</button>
                            <form action="" method="post">
                                <button class="btn complete">Concluir Treino</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="workout-list" id="workoutlist">
                <?php 

                $sql = "SELECT * FROM exericios_treino WHERE fk_tr_id = 1";
                $return = mysqli_query($link, $sql);

                while($tbl = mysqli_fetch_array($return)){
                ?>
                <div class="exercise-card">
                    <div class="left">
                        <span class="exe-name"><?=$tbl['et_nome']?></span>
                        <span class="exe-reps"><?=$tbl['et_repeticao']?> Repetições <?=$tbl['et_series']?>x</span>
                    </div>
                    <div class="right">
                        <i class="bi bi-chevron-compact-right"></i>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>
<script src="../script.js"></script>
</html>