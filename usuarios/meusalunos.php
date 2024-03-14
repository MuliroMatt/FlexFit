<?php 
include('usernav.php');

$sql = "SELECT * FROM instrutores WHERE fk_usu_id = $id";
$return = mysqli_query($link, $sql);
while($tbl = mysqli_fetch_array($return)){
    $instr_id = $tbl['instr_id'];
}

$sql = "SELECT * FROM usuarios AS u
        INNER JOIN alunos AS a ON u.usu_id = a.fk_usu_id
        WHERE u.usu_funcao = 'a' AND a.fk_instr_id = $instr_id;";
$resultado = mysqli_query($link, $sql);
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
    <main class="main-meusalunos">
        <div class="alunos-container">
            <header class="page-header">
                <span class="page-title">Meus Alunos</span>
            </header>
            <div class="listaaluno-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <!-- <th>Experiencia</th> -->
                        <th>Gênero</th>
                        <th>Telefone</th>
                        <th class="tools">Editar Treino</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?=$tbl['usu_nome']?> <?=$tbl['usu_sobrenome']?></td>
                        <!-- <td><?=$tbl['al_experiencia']?></td> -->
                        <td><?=$tbl['al_sexo']?></td>
                        <td><?=$tbl['al_telefone']?></td>
                        <td class="tools">
                            <a href="editartreino.php?id=<?=$tbl[0]?>"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </main>
</body>
<script src="../script.js"></script>
</html>