<?php 
include('usernav.php');
session_start();

if (isset($_SESSION['idusuario'])){
    $id = $_SESSION['idusuario'];
    $sql = "SELECT * FROM usuarios WHERE usu_id = '$id';";
    $return = mysqli_query($link, $sql);
    
    $sql = "SELECT * FROM usuarios
            JOIN alunos ON usuarios.usu_id = alunos.fk_usu_id
            WHERE usu_id = '$id';";
    $return = mysqli_query($link, $sql);
    
    while($tbl = mysqli_fetch_array($return)){
        $nome = $tbl[1];
        $sobrenome = $tbl[2];
        $email = $tbl[3];
        $cpf = $tbl[8];
        $nasc = $tbl[9];
        $sexo = $tbl[10];
        $endereco = $tbl[11];
        $telefone = $tbl[12];
    }
}
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
    <main class="main-profile">
        <div class="perfil-container">
            <header class="page-header">
                <span class="page-title">Meu Perfil</span>
            </header>
            <div class="profile-card">
                <div class="top">
                    <div class="user-pic"></div>
                    <div class="user-info">
                        <span class="name">
                            <?=$nome?> <br>
                            <?=$sobrenome?>
                        </span>
                        <span class="function">
                            Aluno
                        </span>
                    </div>
                    <hr>
                </div>
                <div class="achievements">
                    <span class="category"></span>
                </div>
                
            </div>
            <div class="profile-infos">
                <h3 class="title">Informações Pessoais</h3>
                <form action="" method="post" class="profile-form">
                    <div class="input-box">
                        <label>Nome <hr></label>
                        <input type="text" name="nome" placeholder="Nome" value="<?=$nome?>">
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Sobrenome <hr></label>
                        <input type="text" name="sobrenome" placeholder="Sobrenome" value="<?=$sobrenome?>">
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Email <hr></label>    
                        <input type="email" name="email" placeholder="email@email.com" value="<?=$email?>">
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Telefone <hr></label>    
                        <input type="text" name="telefone" placeholder="(00) 9999-9999" value="<?=$telefone?>">
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>CPF <hr></label>
                        <input class="notallowed" type="text" name="cpf" placeholder="000-000-000-00" value="<?=$cpf?>" readonly>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Nascimento <hr></label>
                        <input type="text" name="nasc" placeholder="00/00/0000" value="<?=$nasc?>">
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Endereço <hr></label>
                        <input type="text" name="endereco" placeholder="Rua das Energias, 123" value="<?=$endereco?>">
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Gênero <hr></label>
                        <input type="text" name="sexo" placeholder="masculino" value="<?=$sexo?>">
                        <!-- <hr> -->
                    </div>
                    <hr id="last-hr">
                    <div class="form-btns">
                        <button type="reset" class="btn discard">Descartar</button>
                        <button type="submit" class="btn save">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
