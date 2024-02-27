<?php
//include ao cabeçalho
include("cabecalho.php");

//Instrução ao SQL
$sql = "SELECT * FROM instrutores WHERE instr_status = 's'";
$retorno = mysqli_query($link, $sql);

$ativo = 's';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ativo = $_POST ['ativo'];

    if($ativo == 's'){
        $sql = "SELECT * FROM instrutores WHERE instr_status = 's'";
    } elseif($ativo == 'n'){
        $sql = "SELECT * FROM instrutores WHERE instr_status = 'n'";
    } else {
        $sql = "SELECT * FROM instrutores";
    }

    $retorno = mysqli_query($link , $sql); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="background">
        <form action="lista_instrutor.php" method="post">
            <input type="radio" name="ativo" class="radio" value="s" required  <?= $ativo == 's' ? "checked" : "" ?>> ATIVOS
            <input type="radio" name="ativo" class="radio" value="n"  required  <?= $ativo == 'n' ? "checked" : "" ?>> INATIVOS
            <input type="radio" name="ativo" class="radio" value="todos" required <?= $ativo == 'todos' ? "checked" : "" ?>> TODOS    
        </form>
        <div class="container">
            <table border="1">
                <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Turno</th>
                <th>Gênero</th>
                <th>Cargo</th>
                <th>Status</th>
                </tr>
                <?php
                //Preencimento da tabela usando o WHILE
                while ($tbl = mysqli_fetch_assoc($retorno)){
                   ?>
                   <tr>
                    <td><?= $tbl['instr_nome']?></td>
                    <td><?= $tbl['instr_email']?></td>
                    <td><?= $tbl['instr_senha']?></td>
                    <td><?= $tbl['instr_cpf']?></td>
                    <td><?= $tbl['instr_telefone']?></td>
                    <td><?= $tbl['instr_turno']?></td>
                    <td><?= $tbl['instr_sexo']?></td>
                    <td><?= $tbl['instr_cargo']?></td>
                    <td><?= $tbl['instr_status']?></td>

                    <td><a href="#?id=<?= $tbl['instr_id']?>"> <input type="button" value="Alterar Dados"></a></td>
                    <td><?= $tbl['instr_status'] == "s" ? "SIM" : "NÃO" ?></td>
                   </tr> 
                   <?php
                }
                ?>
            </table>
        </div>
    </div>    
</body>
</html>