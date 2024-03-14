<?php 
include('usernav.php');



$usu_id = $_GET['id'];
$_SESSION['usu_id'] = $usu_id;

if(isset($_GET['dia'])){
    $treino_id = $_GET['dia'];
    $_SESSION['treino_id'] = $treino_id;
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                // Your function code here
                openWorkoutList();
            });
         </script>';
}

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

if(isset($_POST['new-exe'])){
    echo "asdlfasdlkflsdhlkjgkladvmkaç";
    $exe_nome = $_POST['exe_nome'];
    $reps = $_POST['reps'];
    $sets = $_POST['sets'];
    $time = $_POST['time'];
    
    $sql = "INSERT INTO exercicios_treino (et_nome, et_tempo, et_series, et_repeticao, fk_tr_id)
            VALUES ('$exe_nome', '$time', '$sets', '$reps', '{$_SESSION['treino_id']}')";

    $return2 = mysqli_query($link, $sql);
    echo "<script>window.location.href='editartreino.php?id={$_SESSION['usu_id']}&dia={$_SESSION['treino_id']}';</script>";
 
}


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
            </header>
            <div class="workout-container">
                <?php 
                while($tbl = mysqli_fetch_array($return)){
                    $tr_id = $tbl[0];
                ?>
                <!--//* CARDS DE TREINO -->
                <div class="workout-card">
                    <div class="card-infos">
                    <h3 class="title"><?=$tbl['tr_dia']?></h3>
                        <div class="btns">
                            <a class="btn see" href="editartreino.php?id=<?=$usu_id?>&dia=<?=$tr_id?>">ver treino</a>
                        </div>
                    </div>
                </div>
                <?php }?>
                
                <!--//* ADICIONA NOVO CARD DE TREINO -->
                <?php 
                $sql = "SELECT COUNT(tr_id) FROM treinos WHERE fk_al_id = '$al_id'";
                $return = mysqli_query($link, $sql);
                $cont = mysqli_fetch_array($return) [0];
                // echo $cont;

                if($cont < 7){
                ?>
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
                <?php }?>
            </div>

            <!--//* LISTA DE EXERCÍCIOS DO DIA -->
            <div class="workout-list" id="workoutlist">
                <div class="top">
                    <!--//* BOTÃO PARA ADICIONAR NOVO EXERCÍCIO -->
                    
                    <div class="btn-div">
                        <button class="btn" id="newWk" onclick="createExe()"><i class="bi bi-plus"></i>Adicionar Exercício</button>
                    </div>
                    <div class="exercise-card" id="newCard" style="display: none;">
                            <form action="editartreino.php?id=<?=$usu_id?>&dia=<?=$treino_id?>" method="post" class="exercise-form">
                                <div class="left">
                                    <div class="top">
                                        <input placeholder="Exercício" type="text" name="exe_nome" class="exe-name">
                                    </div>
                                    <div class="bottom">
                                        <div class="input-box">        
                                            <i class="bi bi-arrow-repeat"></i>
                                            <select name="reps">
                                                <option value="0">0</option>
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
                                                <option value="0">0</option>
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
                                                <option value="0">0</option>
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
                    <div class="exercises">
                        <?php 
                        $sql = "SELECT * FROM exercicios_treino WHERE fk_tr_id = '$treino_id' ";
                        
                        $return = mysqli_query($link, $sql);
        
                        while($tbl = mysqli_fetch_array($return)){
                        ?>
                        <!--//* CARD DE EXERCÍCIOS -->
                        <div class="exercise-card">
                            <div class="left">
                                <span class="exe-name"><?=$tbl['et_nome']?></span>
                                <span class="exe-reps"><?=$tbl['et_repeticao']?> Repetições <?=$tbl['et_series']?>x</span>
                            </div>
                            <div class="right">
                                <!--//* BOTÃO DE EDITAR EXERCÍCIO -->
                                <a href=""><i class="bi bi-pencil-square"></i></a>
                                <!--//* BOTÃO DE DELETAR EXERCÍCIO -->
                                <a href="deletaexercicio.php?id=<?=$tbl['et_id']?>"><i class="bi bi-trash"></i></a>                        
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="bottom">
                    <hr>
                    <!--//* BOTÃO PARA DELETAR O TREINO -->
                    <div class="btns">
                        <a class="btn delete" href="deletatreino.php?id=<?=$tr_id?>"><i class="bi bi-trash"></i> Deletar Treino</a> 
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../script.js"></script>
</body>
</html>