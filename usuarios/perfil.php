<?php 
include('usernav.php');
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
    <main class="main-profile">
        <?php 
        if ($funcao == 'a'){
        ?>
        <div class="perfil-container">
            <header class="page-header">
                <span class="page-title">Meu Perfil</span>
            </header>
            <div class="profile-card">
                <div class="top">
                    <div class="user-pic">
                        <img src="data:image/jpg;base64,<?=$_SESSION['imgusuario']?>">
                    </div>
                    
                    <div class="user-info">
                        <span class="name">
                            <?=$nome?> <br>
                            <?=$sobrenome?>
                        </span>
                        <span class="function">
                            <?=$funcao2?>
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
                <form action="alterausu.php" method="post" class="profile-form">
                    <div class="input-box">
                        <label>Nome <hr></label>
                        <input type="text" name="nome" placeholder="Nome" value="<?=$nome?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Sobrenome <hr></label>
                        <input type="text" name="sobrenome" placeholder="Sobrenome" value="<?=$sobrenome?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Email <hr></label>    
                        <input type="email" name="email" placeholder="email@email.com" value="<?=$email?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Telefone <hr></label>    
                        <input type="text" name="telefone" placeholder="(00) 9999-9999" value="<?=$telefone?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>CPF <hr></label>
                        <input class="readonly" type="text" name="cpf" placeholder="000-000-000-00" value="<?=$cpf?>" readonly>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Nascimento <hr></label>
                        <input type="text" name="nasc" placeholder="00/00/0000" value="<?=$nasc?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Endereço <hr></label>
                        <input type="text" name="endereco" placeholder="Rua das Energias, 123" value="<?=$endereco?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Gênero <hr></label>
                        <input class="readonly" type="text" name="genero" placeholder="masculino" value="<?=$genero?>" readonly>
                        <!-- <hr> -->
                    </div>
                    
                    <hr id="last-hr">
                    <div class="form-btns">
                        <button type="reset" class="btn discard">Descartar</button>
                        <button type="submit" name="alter" class="btn save">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
        }
        elseif ($funcao == 'i'){
        ?>
        <div class="perfil-container">
            <header class="page-header">
                <span class="page-title">Meu Perfil</span>
            </header>
            <div class="profile-card">
                <div class="top">
                    <div class="user-pic">
                    </div>
                    <div class="user-info">
                        <span class="name">
                            <?=$nome?> <br>
                            <?=$sobrenome?>
                        </span>
                        <span class="function">
                            <?=$funcao2?>
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
                <form action="alterausu.php" method="post" class="profile-form">
                    <div class="input-box">
                        <label>Nome <hr></label>
                        <input type="text" name="nome" placeholder="Nome" value="<?=$nome?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Sobrenome <hr></label>
                        <input type="text" name="sobrenome" placeholder="Sobrenome" value="<?=$sobrenome?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Email <hr></label>    
                        <input type="email" name="email" placeholder="email@email.com" value="<?=$email?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Telefone <hr></label>    
                        <input type="text" name="telefone" placeholder="(00) 9999-9999" value="<?=$telefone?>" required>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>CPF <hr></label>
                        <input class="readonly" type="text" name="cpf" placeholder="000-000-000-00" value="<?=$cpf?>" readonly>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Turno <hr></label>
                        <input class="readonly" type="text" name="nasc" placeholder="00/00/0000" value="<?=$turno?>" readonly>
                        <!-- <hr> -->
                    </div>
                    <div class="input-box">
                        <label>Gênero <hr></label>
                        <input class="readonly" type="text" name="genero" placeholder="masculino" value="<?=$genero?>" readonly>
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
        <?php } ?>
    </main>
</body>
</html>
