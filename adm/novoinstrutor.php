<?php 
include ('backnav.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $nome = strtolower($nome);
    $nome = ucwords($nome);
    $sobrenome = mysqli_real_escape_string($link, $_POST['sobrenome']);
    $sobrenome = strtolower($sobrenome);
    $sobrenome = ucwords($sobrenome);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $email = strtolower($email);
    $senha = mysqli_real_escape_string($link, $_POST['senha']);
    $senha_md5 = md5($senha);
    $cpf = mysqli_real_escape_string($link, $_POST['cpf']);
    $genero = mysqli_real_escape_string($link, $_POST['genero']);
    $turno = mysqli_real_escape_string($link, $_POST['turno']);
    $telefone = mysqli_real_escape_string($link, $_POST['telefone']);
    $usu_id = null;

    //Instruções ao  banco de dados
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = '$email'";
    $resultado = mysqli_query($link, $sql);
    
    $resultado = mysqli_fetch_array($resultado) [0];

    //Verificação de usuário
    if($resultado >= 1){
        echo "<script>window.alert('Aluno já cadastrado!');</script>";
        echo "<script>window.location.href='novoinstrutor.php';</script>";
    } else {
        $sql = "INSERT INTO usuarios(usu_nome, usu_sobrenome, usu_email, usu_senha, usu_funcao) 
                VALUES('$nome', '$sobrenome', '$email', '$senha_md5', 'i')";
        $resultado = mysqli_query($link, $sql);

        $sql = "SELECT usu_id FROM usuarios WHERE usu_email = '$email'";
        $resultado = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($resultado)){
            $usu_id = $tbl[0];
        }

        $sql = "INSERT INTO instrutores (instr_cpf, instr_sexo, instr_turno, instr_telefone, instr_status, fk_usu_id)
                VALUES ('$cpf', '$genero', '$turno', '$telefone', 's', '$usu_id')";
        $resultado = mysqli_query($link, $sql);
        
        echo "<script>window.alert('Bem Vindo a FlexFit!');</script>";
        echo "<script>window.location.href='listainstrutor.php';</script>";
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
            <form action="novoinstrutor.php" method="post" class="cadastra-form">
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
                    <label>CPF</label>
                    <input type="text" name="cpf" required>
                </div>
                <div class="input-box">
                    <label>Telefone</label>
                    <input type="text" name="telefone" required>
                </div>
                <div class="input-box">
                    <label>Gênero</label>
                    <select name="genero" id="genero" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Turno</label>
                    <select name="turno" id="turno" required>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                    </select>
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