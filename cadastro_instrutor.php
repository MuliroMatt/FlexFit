<?php
session_start();

include("conectaDB.php");

if($_SERVER('REQUEST_METHOD')=='POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $senha = mysqli_real_escape_string($link, $_POST['senha']); 
    $cpf =  mysqli_real_escape_string($link, $_POST['cpf']); 
    $telefone = mysqli_real_escape_string($link, $_POST['telefone']);
    $turno = mysqli_real_escape_string($link, $_POST['turno']);
    $sexo = mysqli_real_escape_string($link, $_POST['genero']);
    $status = mysqli_real_escape_string($link, $_POST['status']);


    //Instruções para o sql

    $sql = "SELECT COUNT(instr_id) FROM instrutores WHERE instr_nome = '$nome', instr_email = '$email', 
    instr_senha = '$senha', instr_cpf = '$cpf', instr_telefone = '$telefone', instr_turno = '$turno' , instr_sexo = '$sexo'";
     $resultado = mysqli_query($link, $sql);

     if(!$resultado){
        die('Erro de consulta SQL: ' . mysqli_error($link));
    }
    $resultado = mysqli_fetch_array($resultado[0]);

    if($resultado >= 1){
        echo "<script>window.alert('Instrutor já cadastrado!');</script>";
        echo "<script>window.location.href='cadastro_instrutor.php';</script>";
    } else{
        $sql = "INSERT INTO instrutores (instr_nome, instr_email, instr_senha, instr_cpf, instr_telefone,
        instr_turno, instr_sexo, instr_status) VALUES('$nome', '$email', '$senha', '$cpf', '$telefone', '$turno', '$sexo', 's')";

        if (!mysqli_query($link, $sql)) {
            die('Erro na inserção de usuário: ' . mysqli_error($link));
        }
        echo "<script>window.alert('Instrutor cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='cadastro.php';</script>";
    }

    $retorno = mysqli_query($link , $sql); 
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <form action="cadastro_instrutor.php" method="post">
            <!-- MONTAR A ESTRUTURA DE CADASTRO DE INSTRUTOR -->
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
    </div>
</body>
</html>