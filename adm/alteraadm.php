<?php 
include ('backnav.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //* Obtém os dados do formulário 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nome = ucwords(strtolower($nome));
    $sobrenome = $_POST['sobrenome'];
    $sobrenome = ucwords(strtolower($sobrenome));
    $email = $_POST['email'];
    $email = strtolower($email);
    $senha = $_POST['senha'];
    $status = $_POST['status'];

    $sql = "UPDATE administradores SET adm_nome = '$nome', adm_sobrenome = '$sobrenome', adm_email = '$email', 
                   adm_senha = '$senha', adm_status = '$status' 
            WHERE adm_id = '$id'";
    mysqli_query($link, $sql);

    echo "<script>window.alert('Usuário alterado com sucesso!');</script>";
    echo "<script>window.location.href='listaadm.php';</script>";
}

$id = $_GET['id'];

$sql = "SELECT * FROM administradores WHERE adm_id = $id;";
$return = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($return)){
    $nome = $tbl['adm_nome'];
    $sobrenome = $tbl['adm_sobrenome'];
    $email = $tbl['adm_email'];
    $senha = $tbl['adm_senha'];
    $status = $tbl['adm_status'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <main class="main-novo aluno">
        <header class="lista-header">
            <div class="right">
                <h3>Administradores</h3>
            </div>
            <div class="left">
                <a href="listaadm.php"><i class="bi bi-chevron-left"></i></a>
            </div>
        </header>
        <div class="cadastra-container">
            <form action="alteraadm.php" method="post" class="cadastra-form">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?=$nome?>" required>
                </div>
                <div class="input-box">
                    <label>Sobrenome</label>
                    <input type="text" name="sobrenome" value="<?=$sobrenome?>" required>
                </div>
                <div class="input-box">
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?=$email?>" required>
                </div>
                <div class="input-box">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="s">Ativo</option>
                        <option value="n">Inativo</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Senha</label>
                    <input type="password" name="senha" value="<?=$senha?>" required>
                </div>
                <button class="cadastrar-btn" type="submit" name="submit">Alterar</button>
            </form>
        </div>
    </main>
</body>
</html>