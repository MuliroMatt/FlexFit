<?php 
include ('backnav.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $nome = ucwords(strtolower($nome));
    $sobrenome = mysqli_real_escape_string($link, $_POST['sobrenome']);
    $sobrenome = ucwords(strtolower($sobrenome));
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $senha = mysqli_real_escape_string($link, $_POST['senha']);

    $sql = "SELECT COUNT(adm_id) FROM administradores WHERE adm_email = '$email'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if($result >= 1){
        echo "<script>window.alert('Usuário já cadastrado');</script>";
        echo "<script>window.location.href='novoadm.php';</script>";
    }
    else{
        $sql = "INSERT INTO administradores(adm_nome, adm_sobrenome, adm_email, adm_senha, adm_status) 
                VALUES('$nome', '$sobrenome','$email', '$senha', 's')";
        $resultado = mysqli_query($link, $sql);

        echo "<script>window.alert('Usuário cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='listaadm.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>FlexFit</title>
</head>
<body>
    <main class="main-novo">
        <header class="lista-header">
            <div class="right">
                <h3>Administradores</h3>
            </div>
            <div class="left">
                <a href="listaadm.php"><i class="bi bi-chevron-left"></i></a>
            </div>
        </header>
        <div class="cadastra-container">
            <form action="novoadm.php" method="post" class="cadastra-form">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="input-box">
                    <label>Sobrenome</label>
                    <input type="text" name="sobrenome" required>
                </div>
                <div class="input-box">
                    <label>E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-box">
                    <label>Senha</label>
                    <input type="password" name="senha" required>
                </div>
                <button class="cadastrar-btn" type="submit" name="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>