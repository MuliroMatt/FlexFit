<?php
//include ao cabeçalho
include("backnav.php");

// Instrução ao SQL
$sql = "SELECT * FROM usuarios AS u
        INNER JOIN alunos AS a ON u.usu_id = a.fk_usu_id
        WHERE u.usu_funcao = 'a';";
$resultado = mysqli_query($link, $sql);

// $ativo = "s";

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $ativo = $_POST ['ativo'];

//     if($ativo == 's'){
//         $sql = "SELECT * FROM usuarios AS u
//                 INNER JOIN alunos AS a ON u.usu_id = a.fk_usu_id
//                 WHERE a.al_status = 's' AND u.usu_funcao = 'a';";
//     } elseif($ativo == 'n'){
//         $sql = "SELECT * FROM usuarios AS u
//                 INNER JOIN alunos AS a ON u.usu_id = a.fk_usu_id
//                 WHERE a.al_status = 'n' AND u.usu_funcao = 'a';";
//     } else {
//         $sql = "SELECT * FROM usuarios AS u
//                 INNER JOIN alunos AS a ON u.usu_id = a.fk_usu_id
//                 WHERE u.usu_funcao = 'a';";
//     }

//     $resultado = mysqli_query($link , $sql); 
// }

if(isset($_POST['searchbtn'])){
    $search = $_POST['search'];
    $search = ucwords(strtolower($search));

    $sql = "SELECT * FROM usuarios AS u
            INNER JOIN alunos AS a ON u.usu_id = a.fk_usu_id
            WHERE u.usu_funcao = 'a' AND u.usu_nome = '$search';";
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
                <h3>Alunos</h3>
            </div>
            <div class="middle">
                <form action="listaaluno.php" method="post" class="search-form">
                    <div class="input-box">
                        <input type="text" name="search">
                        <button type="submit" class="search-btn" name="searchbtn"><i class="bi bi-search"></i></button>
                    </div>
                </form> 
            </div>
            <div class="right">
                <a href="novoaluno.php"><i class="bi bi-plus-square-fill"></i></a>
            </div>
        </header>
        <div class="lista-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nascimento</th>
                        <th>Gênero</th>
                        <th>Telefone</th>
                        <th>Instrutor</th>
                        <th>Status</th>
                        <th class="tools">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?=$tbl['usu_nome']?> <?=$tbl['usu_sobrenome']?></td>
                        <td><?=$tbl['usu_email']?></td>
                        <td><?=$tbl['al_dataNasc']?></td>
                        <td><?=$tbl['al_sexo']?></td>
                        <td><?=$tbl['al_telefone']?></td>
                        <td>
                            <?php 
                            if(isset($tbl['fk_instr_id'])){
                                $instr_id = $tbl['fk_instr_id'];
                                $sql = "SELECT usuarios.usu_nome
                                        FROM usuarios
                                        INNER JOIN instrutores ON usuarios.usu_id = instrutores.fk_usu_id
                                        INNER JOIN alunos ON instrutores.instr_id = alunos.fk_instr_id
                                        WHERE alunos.fk_instr_id = '" . $instr_id . "'";
                                $retorno = mysqli_query($link, $sql);
                                while ($tbl2 = mysqli_fetch_array($retorno)){
                                    $instr = $tbl2['usu_nome'];
                                }
                                echo $instr;
                            }
                            else{
                                echo'A definir';
                            }
                            ?>
                        </td>
                        <td><?= $check = ($tbl['al_status'] == "s") ? "Ativo" : "Inativo" ?></td>
                        <td class="tools">
                            <a href="alteraaluno.php?id=<?=$tbl[0]?>"><i class="bi bi-pencil-square"></i></a>
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