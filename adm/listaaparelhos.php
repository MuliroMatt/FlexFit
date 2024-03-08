<?php
//include ao cabeçalho
include("backnav.php");

$sql = "SELECT * FROM aparelhos WHERE apa_status = 's'";
$resultado = mysqli_query($link, $sql);
 
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $ativo = $_POST['ativo'];
//     if($ativo == 's'){
//         $sql = "SELECT * FROM aparelhos WHERE apa_status = 's'";
//     }elseif($ativo == 'n'){
//         $sql = "SELECT * FROM aparelhos WHERE apa_status = 'n'";
//     }else{
//         $sql = "SELECT * FROM aparelhos";
//     }
// }
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
            <div class="right">
                <h3>Aparelhos</h3>
            </div>
            <div class="left">
                <a href="novoaparelho.php"><i class="bi bi-plus-square-fill"></i></a>
            </div>
        </header>
        <div class="lista-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Nivel</th>
                        <th>Quantidade</th>
                        <th>Status</th>
                        <th class="tools">Ferramentas</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?=$tbl[1]?></td>
                        <td><?=$tbl[2]?></td>
                        <td><?=$tbl[3]?></td>
                        <td><?=$tbl[4]?></td>
                        <td><?= $check = ($tbl[5] == "s") ? "Ativo" : "Inativo" ?></td>
                        <td class="tools">
                            <a href="alteraaparelho.php?id=<?=$tbl[0]?>"><i class="bi bi-pencil-square"></i></a>
                            <a href=""><i class="bi bi-trash-fill"></i></a>
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