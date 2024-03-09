<?php
//include ao cabeçalho
include("backnav.php");

// Instrução ao SQL
$sql = "SELECT * FROM usuarios AS u
        INNER JOIN instrutores AS i ON u.usu_id = i.fk_usu_id
        WHERE i.instr_status = 's' AND u.usu_funcao = 'i';";
$resultado = mysqli_query($link, $sql);

// $ativo = 's';

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $ativo = $_POST ['ativo'];

//     if($ativo == 's'){
//         $sql = "SELECT * FROM instrutores WHERE instr_status = 's'";
//     } elseif($ativo == 'n'){
//         $sql = "SELECT * FROM instrutores WHERE instr_status = 'n'";
//     } else {
//         $sql = "SELECT * FROM instrutores";
//     }

//     $resultado = mysqli_query($link , $sql); 
// }

if(isset($_POST['searchbtn'])){
    $search = $_POST['search'];
    $search = ucwords(strtolower($search));

    $sql = "SELECT * FROM usuarios AS u
            INNER JOIN instrutores AS i ON u.usu_id = i.fk_usu_id
            WHERE u.usu_funcao = 'i' AND u.usu_nome = '$search';";
    $resultado = mysqli_query($link, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
<main class="main-lista">
        <header class="lista-header">
            <div class="left">
                <h3>Instrutores</h3>
            </div>
            <div class="middle">
                <form action="listainstrutor.php" method="post" class="search-form">
                    <div class="input-box">
                        <input type="text" name="search">
                        <button type="submit" class="search-btn" name="searchbtn"><i class="bi bi-search"></i></button>
                    </div>
                </form> 
            </div>  
            <div class="right">
                <a href="novoinstrutor.php"><i class="bi bi-plus-square-fill"></i></a>
            </div>
        </header>
        <div class="lista-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Turno</th>
                        <th>Gênero</th>
                        <th>Telefone</th>
                        <th>Status</th>
                        <th class="tools">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?=$tbl[1]?> <?=$tbl[2]?></td>
                        <td><?=$tbl[3]?></td>
                        <td><?=$tbl[10]?></td>
                        <td><?=$tbl[11]?></td>
                        <td><?=$tbl[9]?></td>
                        <td><?= $check = ($tbl[12] == "s") ? "Ativo" : "Inativo" ?></td>
                        <td class="tools">
                            <a href="alterainstrutor.php?id=<?=$tbl[0]?>"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>