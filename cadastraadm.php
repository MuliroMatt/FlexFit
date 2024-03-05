<?php
include("conectaDB.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $nome = ucwords(strtolower($nome));
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $senha = mysqli_real_escape_string($link, $_POST['senha']);

    $sql = "SELECT COUNT(adm_id) FROM administradores WHERE adm_email = '$email'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if($result >= 1){
        echo "<script>window.alert('Usuário já cadastrado');</script>";
    }
    else{
        $sql = "INSERT INTO administradores(adm_nome, adm_email, adm_senha, adm_status) 
                VALUES('$nome', '$email', '$senha', 's')";
        $resultado = mysqli_query($link, $sql);

        echo "<script>window.alert('Usuário cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='cadastraadm.php';</script>";
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
    <title>FlexFit|Cadastro</title>
</head>
<body>
    <main class="main-cadastra">
        <div class="wrapper">
            <section class="cadastra-container">
                <form action="cadastraadm.php" method="post" class="cadastra-form" id="cadastra">
                    <div class="input-box">
                        <label>Nome</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="input-box">
                        <label>E-mail</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="input-box">
                        <label>Senha</label>
                        <input type="password" name="senha" required>
                    </div>
                    <button class="cadastrar-btn" type="submit" name="submit">Cadastrar-se</button>
                    <p>Já tem conta? <a onclick="toggleLogin()">Entrar</a></p>
                </form>
                <form action="loginadm.php" method="post" class="login-form" id="login">
                    <div class="input-box">
                        <label>E-mail</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="input-box">
                        <label>Senha</label>
                        <input type="password" name="senha" required>
                    </div>
                    <button class="login-btn" type="submit" name="submit">Entrar</button>
                    <p>Não tem conta? <a onclick="toggleCadastra()">Cadastra-se</a></p>
                </form>
            </section>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>