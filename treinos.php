<?php 
include('usernav.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                <div class="workout-card">
                    <div class="card-infos">
                        <h3 class="title">Segunda-Feira</h3>
                        <span class="level"><i class="bi bi-1-square"></i> Iniciante</span>
                        <div class="btns">
                            <button class="btn see" onclick="openWorkoutList()">Ver Treino</button>
                            <form action="" method="post">
                                <button class="btn complete">Concluir Treino</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="workout-list" id="workoutlist">
                
            </div>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>