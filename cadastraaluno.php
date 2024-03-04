<?php
//Variável de sessão
// session_start();
//incluir o cabeçalho ao PHP
include("cabecalho.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cpf = mysqli_real_escape_string($link, $_POST['cpf']);
    $dataNascimento = mysqli_real_escape_string($link, $_POST['nasc']);
    $sexo = mysqli_real_escape_string($link, $_POST['sexo']);
    $endereco = mysqli_real_escape_string($link, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($link, $_POST['telefone']);
    $usu_id = $_SESSION['idusuario'];

    //Instruções ao  banco de dados
    $sql = "SELECT COUNT(al_id) FROM alunos WHERE al_cpf = '$cpf' OR fk_usu_id = '$usu_id'";
    $resultado = mysqli_query($link, $sql);
    
    $resultado = mysqli_fetch_array($resultado) [0];

    //Verificação de usuário
    if($resultado >= 1){
        echo "<script>window.alert('Aluno já cadastrado!');</script>";
        echo "<script>window.location.href='cadastraaluno.php';</script>";
    } else {
        $sql = "INSERT INTO alunos (al_cpf, al_dataNasc, al_sexo, al_endereco, al_telefone, fk_usu_id)
                VALUES ('$cpf', '$dataNascimento', '$sexo', '$endereco', '$telefone', '$usu_id')";
        $resultado = mysqli_query($link, $sql);
        $sql = "UPDATE usuarios
                SET usu_funcao = 'a'
                WHERE usu_id = $usu_id";
        $resultado = mysqli_query($link, $sql);
        
        echo "<script>window.alert('Bem Vindo a FlexFit!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>FlexFit</title>
</head>
<body>
    <main class="main-cadastraaluno">
        <div class="wrapper">
            <section class="cadastra-container">
                <form action="cadastraaluno.php" method="post" class="cadastra-form">
                    <div class="input-box">
                        <label>CPF</label>
                        <input type="text" name="cpf" required>
                    </div>
                    <div class="input-box">
                        <label>Nascimento</label>
                        <input type="date" name="nasc" required>
                    </div>
                    <div class="input-box">
                        <label>Telefone</label>
                        <input type="text" name="telefone" required>
                    </div>
                    <div class="input-box">
                        <label>Gênero</label>
                        <input type="text" name="sexo" required>
                    </div>
                    <div class="input-box">
                        <label>Endereço</label>
                        <input type="text" name="endereco" required>
                    </div>
                    <button class="cadastrar-btn" type="submit" name="submit">Cadastrar-se</button>
                </form>
            </section>
        </div>
    </main>
<?php include("footer.php") ?>
</body>
</html>