<?php
//include ao cabeçalho
include("backnav.php");

// Instrução ao SQL
$sql = "SELECT *
        FROM exercicios AS e
        JOIN aparelhos AS a ON e.fk_apa_id = a.apa_id;";
$resultado = mysqli_query($link, $sql);

if(isset($_POST['searchbtn'])){
    $search = $_POST['search'];
    $search = ucwords(strtolower($search));

    $sql = "SELECT * FROM usuarios WHERE ex_nome = '$search';";
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
                <h3>Exercícios</h3>
            </div>
            <div class="middle">
                <form action="listaexercicio.php" method="post" class="search-form">
                    <div class="input-box">
                        <input type="text" name="search">
                        <button type="submit" class="search-btn" name="searchbtn"><i class="bi bi-search"></i></button>
                    </div>
                </form> 
            </div>
            <div class="right">
                <a href="novoexercicio.php"><i class="bi bi-plus-square-fill"></i></a>
            </div>
        </header>
        <div class="lista-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Aparelho</th>
                        <th class="tools">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?=$tbl['ex_nome']?></td>
                        <td><?=$tbl['apa_nome']?></td>
                        <td class="tools">
                            <a href="alteraexercicio.php?id=<?=$tbl[0]?>"><i class="bi bi-pencil-square"></i></a>
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