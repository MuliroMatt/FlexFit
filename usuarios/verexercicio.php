<?php 
include('usernav.php');

$id = $_GET['id'];
$treino = $_GET['treino'];

$sql = "SELECT *
        FROM exercicios_treino et
        JOIN exercicios ex ON et.fk_ex_id = ex.ex_id
        WHERE et.fk_ex_id = $id
        AND et.fk_tr_id = $treino;";
$return = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($return)){
    $nome = $tbl['ex_nome'];
    $video = $tbl['ex_video'];
    $desc = $tbl['ex_desc'];
    $aparelho = $tbl['fk_apa_id'];
    $tempo = $tbl['et_tempo'];
    $series = $tbl['et_series'];
    $repeticao = $tbl['et_repeticao'];
}

$sql = "SELECT * FROM exercicios_treino WHERE "
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
    <main class="verexercicio-main">
        <div class="video-container">
            <div class="title">
                <h1><?=$nome?></h1>
            </div>
            <iframe 
                    src="<?=$video?>" 
                    allowfullscreen="true"
                    >
            </iframe>
            <p><?=$desc?></p>
        </div>
        <!-- <div class="text-container">
             <?php 
            // echo $nome.'<br>';
            // echo $aparelho.'<br>';
            // echo $tempo.'<br>';
            // echo $series.'<br>';
            // echo $repeticao.'<br>';
            ?> 
            <h1>Supino com barra </h1>
            
        </div> -->
        <div class="workout-list" id="workoutlist">
                <div class="top">
                    <?php 
                    $sql = "SELECT tr_dia FROM treinos WHERE tr_id = $treino";
                    $return = mysqli_query($link, $sql);
                    while($tbl = mysqli_fetch_array($return)){
                        $diasemana = $tbl[0];
                    }
                    ?>
                    <h1><?=$diasemana?></h1>
                    <hr>
                </div>
                <div class="exercises">
                    <?php 
    
                    $sql = "SELECT *
                            FROM exercicios AS e
                            JOIN exercicios_treino AS et ON e.ex_id = et.fk_ex_id
                            WHERE fk_tr_id = $treino;";
                    $return = mysqli_query($link, $sql);
    
                    while($tbl = mysqli_fetch_array($return)){
                    ?>
                    <a href="verexercicio.php?id=<?=$tbl['ex_id']?>&treino=<?=$treino?>" class="exercise-card">
                        <div class="left">
                            <span class="exe-name"><?=$tbl['ex_nome']?></span>
                            <span class="exe-reps"><?=$tbl['et_repeticao']?> Repetições <?=$tbl['et_series']?>x</span>
                        </div>
                        <div class="right">
                            <i class="bi bi-chevron-compact-right"></i>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
    </main>
</body>
</html>