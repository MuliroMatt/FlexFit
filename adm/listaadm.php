<?php
//include ao cabeçalho
include("backnav.php");

$sql = "SELECT * FROM administradores WHERE adm_status = 's'";
$resultado = mysqli_query($link, $sql);
 
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $ativo = $_POST['ativo'];

//     if($ativo == 's'){
//         $sql = "SELECT * FROM administradores WHERE adm_status = 's'";
//     } elseif($ativo == 'n'){
//         $sql = "SELECT * FROM administradores WHERE adm_status = 'n'";
//     } else{
//         $sql = "SELECT * FROM administradores";
//     }

//     $resultado = mysqli_query($link, $sql);
// }

if(isset($_POST['searchbtn'])){
    $search = $_POST['search'];
    $search = ucwords(strtolower($search));

    $sql = "SELECT * FROM administradores WHERE adm_nome = '$search'";
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
                <h3>Administradores</h3>
            </div>
            <div class="middle">
                <form action="listaadm.php" method="post" class="search-form">
                    <div class="input-box">
                        <input type="text" name="search">
                        <button type="submit" class="search-btn" name="searchbtn"><i class="bi bi-search"></i></button>
                    </div>
                </form> 
            </div>
            <div class="right">
                <a href="novoadm.php"><i class="bi bi-plus-square-fill"></i></a>
            </div>
        </header>
        <div class="lista-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>  
                        <th>Email</th>
                        <th>Status</th>
                        <th class="tools">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?=$tbl['adm_nome']?></td>
                        <td><?=$tbl['adm_sobrenome']?></td>
                        <td><?=$tbl['adm_email']?></td>
                        <td><?= $check = ($tbl['adm_status'] == "s") ? "Ativo" : "Inativo" ?></td>
                        <td class="tools">
                            <a href="alteraadm.php?id=<?=$tbl[0]?>"><i class="bi bi-pencil-square"></i></a>
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