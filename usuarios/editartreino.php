<?php 
include('usernav.php');



$usu_id = $_GET['id'];

$sql = "SELECT al_id FROM alunos WHERE fk_usu_id = $usu_id";
$return = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($return)){
    $al_id = $tbl['al_id'];
}

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
                <div class="newworkout-container">
                    <!-- <button class="new-btn"><i class="bi bi-plus-square-fill"></i></button> -->
                    <div class="newworkout">
                        <form action="novotreino.php" method="post" class="workout-form">
                            <input type="hidden" name="usu_id" value="<?=$usu_id?>">
                            <input type="hidden" name="instr_id" value="<?=$id?>">
                            <input type="hidden" name="al_id" value="<?=$al_id?>">
                            <select name="novotreino">
                                <option value="Domingo">Domingo</option>
                                <option value="Segunda-feira">Segunda</option>
                                <option value="Terça-feira">Terça</option>
                                <option value="Quarta-feira">Quarta</option>
                                <option value="Quinta-feira">Quinta</option>
                                <option value="Sexta-feira">Sexta</option>
                                <option value="Sábado">Sábado</option>
                            </select>
                            <button name="newworkout" class="btn" type="submit">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="workout-list" id="workoutlist">
                <div class="btn-div">
                    <button class="btn" id="newWk" onclick="createExe()"><i class="bi bi-plus"></i>Adicionar Exercício</button>
                </div>
                <div class="exercise-card" id="newCard" style="display: none;">
                        <form action="" method="post" class="exercise-form">
                            <div class="left">
                                <div class="top">
                                    <input placeholder="Exercício" type="text" name="exe_nome" class="exe-name">
                                </div>
                                <div class="bottom">
                                    <div class="input-box">
                                        
                                        <i class="bi bi-arrow-repeat"></i>
                                        <select name="reps">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <i class="bi bi-x" style="font-size: 24px;"></i>
                                        <select name="sets">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <i class="bi bi-stopwatch" style="font-size: 17px;"></i>
                                        <select name="time">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="right">
                                <button type="submit" name="new-exe"><i class="bi bi-plus"></i></button>
                            </div>
                        </form>
                </div>
                
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
                        <a href="deletaexercicio.php?id="><i class="bi bi-pencil-square"></i></a>
                        <a href=""><i class="bi bi-trash"></i></a>                        
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <script src="../script.js"></script>
</body>
</html>