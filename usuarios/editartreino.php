<?php 
include('usernav.php');



$usu_id = $_GET['id'];

$sql = "SELECT al_id FROM alunos WHERE fk_usu_id = $usu_id";
$return = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($return)){
    $al_id = $tbl['al_id'];
}

$sql = "SELECT * FROM treinos WHERE fk_al_id = $al_id";
$return = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <main class="main-editartreino">
    <div class="treinos-container">
            <header class="page-header">
                <div class="left">
                    <h3>Alunos</h3>
                </div>
                <!-- <div class="middle">
                    <form action="listaaluno.php" method="post" class="search-form">
                        <div class="input-box">
                            <input type="text" name="search">
                            <button type="submit" class="search-btn" name="searchbtn"><i class="bi bi-search"></i></button>
                        </div>
                    </form> 
                </div> -->
                <!-- <div class="right">
                    <a href=""><i class="bi bi-plus-square-fill"></i></a>
                </div> -->
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
                        </div>
                    </div>
                </div>
                <?php }?>
                <button class="new-btn"><i class="bi bi-plus-square-fill"></i></button>
            </div>
            <div class="workout-list" id="workoutlist">
                <?php 
                // $_GET['']

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
</html>