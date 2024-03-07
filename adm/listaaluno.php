<?php
//include ao cabeçalho
include("backnav.php");

// Instrução ao SQL
$sql = "SELECT * FROM usuarios AS u
        INNER JOIN alunos AS a ON u.usu_id = a.fk_usu_id
        WHERE a.al_status = 's' AND u.usu_funcao = 'a';";
$resultado = mysqli_query($link, $sql);

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $ativo = $_POST ['ativo'];

//     if($ativo == 's'){
//         $sql = "SELECT * FROM alunos WHERE al_status = 's'";
//     } elseif($ativo == 'n'){
//         $sql = "SELECT * FROM alunos WHERE al_status = 'n'";
//     } else {
//         $sql = "SELECT * FROM alunos";
//     }

//     $resultado = mysqli_query($link , $sql); 
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
                <h3>Alunos</h3>
            </div>
            <div class="left">
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
                        <th class="tools">Ferramentas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?=$tbl[1]?> <?=$tbl[2]?></td>
                        <td><?=$tbl[3]?></td>
                        <td><?=$tbl[9]?></td>
                        <td><?=$tbl[10]?></td>
                        <td><?=$tbl[12]?></td>
                        <td>
                            <?php 
                            if(isset($tbl[17])){
                                $instr_id = $tbl[17];
                                $sql = "SELECT usuarios.usu_nome
                                        FROM usuarios
                                        INNER JOIN instrutores ON usuarios.usu_id = instrutores.fk_usu_id
                                        INNER JOIN alunos ON instrutores.instr_id = alunos.fk_instr_id
                                        WHERE alunos.fk_instr_id = '" . $instr_id . "'";
                                $retorno = mysqli_query($link, $sql);
                                while ($tbl2 = mysqli_fetch_array($retorno)){
                                    $instr = $tbl2[0];
                                }
                                echo $instr;
                            }
                            else{
                                echo'A definir';
                            }
                            ?>
                        </td>
                        <td><?= $check = ($tbl[18] == "s") ? "Ativo" : "Inativo" ?></td>
                        <td class="tools">
                            <a href=""><i class="bi bi-pencil-square"></i></a>
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