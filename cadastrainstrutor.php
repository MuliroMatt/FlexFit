<?php
include("cabecalho.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cpf =  mysqli_real_escape_string($link, $_POST['cpf']); 
    $telefone = mysqli_real_escape_string($link, $_POST['telefone']);
    $turno = mysqli_real_escape_string($link, $_POST['turno']);
    $sexo = mysqli_real_escape_string($link, $_POST['genero']);
    $usu_id = $_SESSION['idusuario'];


    //Instruções para o sql

    $sql = "SELECT COUNT(instr_id) FROM instrutores WHERE instr_cpf = '$cpf' or fk_usu_id = '$usu_id'";
    $resultado = mysqli_query($link, $sql);

    $resultado = mysqli_fetch_array($resultado) [0];

    if($resultado >= 1){
        echo "<script>window.alert('Instrutor já cadastrado!');</script>";
        echo "<script>window.location.href='cadastro_instrutor.php';</script>";
    } else{
        $sql = "INSERT INTO instrutores (instr_cpf, instr_telefone, instr_turno, instr_sexo, instr_status, fk_usu_id) 
                VALUES('$cpf', '$telefone', '$turno', '$sexo', 's', $usu_id)";
        $resultado = mysqli_query($link, $sql);
        $sql = "UPDATE usuarios
                SET usu_funcao = 'i'
                WHERE usu_id = $usu_id";
        $resultado = mysqli_query($link, $sql);

        echo "<script>window.alert('Instrutor cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }

    $retorno = mysqli_query($link , $sql); 
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <!-- <div id="container">
        <form action="cadastrainstrutor.php" method="post">
           
            <label for="">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
            <label for="">Email:</label>
            <input type="text" name="email" id="email" placeholder="email@email.com" required>
            <label for="">Senha</label>
            <input type="password" name="senha" id="senha"  placeholder="Digite a senha" required>
            <label for="">CPF:</label>
            <input type="tel" name="cpf" id="cpf" placeholder="000.000.000-00" required>
            <label for="">Telefone:</label>
            <input type="tel" name="telefone" id="telefone" placeholder="(16) 91234-5678" required>
            <label for="">Turno</label>
            <input type="radio" name="turno" class="radio" value="Manhã" required  <?= $turno == 'Manhã' ? "checked" : "" ?> required> Manhã
            <input type="radio" name="turno" class="radio" value="Tarde"  required  <?= $turno == 'Tarde' ? "checked" : "" ?> required> Tarde
            <input type="radio" name="turno" class="radio" value="Noite" required <?= $turno == 'Noite' ? "checked" : "" ?> required> Noite
            <label for="">Gênero:</label>
            <input type="radio" name="genero" id="feminino"  value="Feminino"> Feminino
            <input type="radio" name="genero" id="masculino" value="Masculino"> Masculino
            <input type="submit" value="Enviar" required>        
        </form>
    </div> -->

    <main class="main-cadastraaluno">
        <div class="wrapper">
            <section class="cadastra-container">
                <form action="cadastrainstrutor.php" method="post" class="cadastra-form">
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
                    
                    <button class="cadastrar-btn" type="submit" name="submit">Cadastrar-se</button>
                </form>
            </section>
        </div>
    </main>
<?php include('footer.php');?>
</body>
</html>