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
    $funcao = $_POST['funcao'];
    $img = $_POST['img'];
    $cpf = $_POST['cpf'];
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];
    $turno = $_POST['turno'];
    $status = $_POST['status'];

    $sql = "UPDATE usuarios SET usu_nome = '$nome', usu_sobrenome = '$sobrenome', usu_email = '$email', 
                   usu_senha = '$senha',  usu_funcao = '$funcao' 
            WHERE usu_id = '$id'";
    mysqli_query($link, $sql);

    $sql = "UPDATE instrutores SET instr_cpf = '$cpf', instr_sexo = '$genero', 
                   instr_telefone = '$telefone', instr_turno = '$turno', instr_status = '$status'
            WHERE fk_usu_id = '$id'";
    mysqli_query($link, $sql);

    echo "<script>window.alert('Usuário alterado com sucesso!');</script>";
    echo "<script>window.location.href='listainstrutor.php';</script>";
}

$id = $_GET['id'];

$sql = "SELECT *
        FROM usuarios u
        JOIN instrutores i ON u.usu_id = i.fk_usu_id
        WHERE u.usu_id = $id;";
$return = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($return)){
    $nome = $tbl['usu_nome'];
    $sobrenome = $tbl['usu_sobrenome'];
    $email = $tbl['usu_email'];
    $senha = $tbl['usu_senha'];
    $funcao = $tbl['usu_funcao'];
    $img = $tbl['usu_img'];
    $cpf = $tbl['instr_cpf'];
    $genero = $tbl['instr_sexo'];
    $telefone = $tbl['instr_telefone'];
    $turno = $tbl['instr_turno'];
    $status = $tbl['instr_status'];
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
                <h3>Instrutores</h3>
            </div>
            <div class="left">
                <a href="listainstrutor.php"><i class="bi bi-chevron-left"></i></a>
            </div>
        </header>
        <div class="cadastra-container">
            <form action="alterainstrutor.php" method="post" class="cadastra-form">
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
                    <label>Função</label>
                    <select name="funcao" id="funcao" required>
                        <!-- <option value="<?=$funcao?>"><?=$funcao?></option> -->
                        <option value="i">Instrutor</option>
                        <option value="a">Aluno</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>CPF</label>
                    <input type="text" name="cpf" value="<?=$cpf?>" required>
                </div>
                <div class="input-box">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?=$telefone?>" required>
                </div>
                <div class="input-box">
                    <label>Gênero</label>
                    <select name="genero" id="genero" required>
                        <option value="<?=$genero?>"><?=$genero?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Turno</label>
                    <select name="turno" id="turno" required>
                        <option value="<?=$turno?>"><?=$turno?></option>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                    </select>
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