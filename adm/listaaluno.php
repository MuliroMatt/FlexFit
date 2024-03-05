<?php
//include ao cabeçalho
include("backnav.php");

//Instrução ao SQL
// $sql = "SELECT * FROM alunos WHERE al_status = 's'";
// $retorno = mysqli_query($link, $sql);

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $ativo = $_POST ['ativo'];

//     if($ativo == 's'){
//         $sql = "SELECT * FROM alunos WHERE al_status = 's'";
//     } elseif($ativo == 'n'){
//         $sql = "SELECT * FROM alunos WHERE al_status = 'n'";
//     } else {
//         $sql = "SELECT * FROM alunos";
//     }

//     $retorno = mysqli_query($link , $sql); 
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
        <div class="lista-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Murilo</th>
                        <th>Amorim</th>
                        <th>murilo@gmail.com</th>
                        <th>Ativo</th>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
    <!-- <div class="background">
        <form action="lista_aluno.php" method="post">
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
                <th>Idade</th>
                <th>Nascimento</th>
                <th>Gênero</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Experiência</th>
                <th>Objetivo</th>
                <th>Status</th>
                </tr>
                <?php
                //Preencimento da tabela usando o WHILE
                while ($tbl = mysqli_fetch_assoc($retorno)){
                   ?>
                   <tr>
                    <td><?= $tbl['al_nome']?></td>
                    <td><?= $tbl['al_email']?></td>
                    <td><?= $tbl['al_senha']?></td>
                    <td><?= $tbl['al_cpf']?></td>
                    <td><?= $tbl['al_idade']?></td>
                    <td><?= $tbl['al_dataNasc']?></td>
                    <td><?= $tbl['al_sexo']?></td>
                    <td><?= $tbl['al_endereco']?></td>
                    <td><?= $tbl['al_telefone']?></td>
                    <td><?= $tbl['al_peso']?></td>
                    <td><?= $tbl['al_altura']?></td>
                    <td><?=$tbl['al_experiencia']?></td>
                    <td><?= $tbl['al_objetivo']?></td>
                    <td><?= $tbl['al_status']?></td>

                    <td><a href="#?id=<?= $tbl['al_id']?>"> <input type="button" value="Alterar Dados"></a></td>
                    <td><?= $tbl['al_status'] == "s" ? "SIM" : "NÃO" ?></td>
                   </tr> 
                   <?php
                }
                ?>
            </table>
        </div>
    </div>     -->
</body>
</html>