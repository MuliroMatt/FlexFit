<?php
//Variável de sessão
// session_start();
//incluir o cabeçalho ao PHP
include("cabecalho.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $senha = mysqli_real_escape_string($link, $_POST['senha']);
    $cpf = mysqli_real_escape_string($link, $_POST['cpf']);
    $idade = mysqli_real_escape_string($link ,$_POST['idade']);
    $dataNascimento = mysqli_real_escape_string($link, $_POST['nascimento']);
    $sexo = mysqli_real_escape_string($link, $_POST['genero']);
    $endereco = mysqli_real_escape_string($link, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($link, $_POST['celular']);
    $peso = mysqli_real_escape_string($link, $_POST['peso']);
    $altura = mysqli_real_escape_string($link, $_POST['altura']);
    $experiencia = mysqli_real_escape_string( $link, $_POST['experiencia']);
    $objetivo = mysqli_real_escape_string($link, $_POST['objetivo']);

    $key = rand(100000, 999999);

    //Instruções ao  banco de dados
    $sql = "SELECT CONT(al_id) FROM alunos WHERE al_nome = '$nome', al_email = '$email', 
    al_senha = '$senha', al_cpf = '$cpf', al_idade = '$idade', al_dataNasc = '$dataNascimento', 
    al_sexo = '$sexo', al_endereco = '$endereco', al_telefone = '$telefone', al_peso = '$peso', 
    al_altura = '$altura', al_experiencia = '$experiencia', al_objetivo = '$objetivo'";
    $resultado = mysqli_query($link, $sql);

    if(!$resultado){
        die('Erro de consulta SQL: ' . mysqli_error($link));
    }
    $resultado = mysqli_fetch_array($resultado[0]);

    //Verificação de usuário
    if($resultado >= 1){
        echo "<script>window.alert('Email ou nome já existentes!');</script>";
        echo "<script>window.location.href='cadastro_aluno.php';</script>";
    } else {
        $sql = "INSERT INTO alunos (al_nome, al_email, al_senha, al_cpf, al_idade, al_dataNasc,
        al_sexo, al_endereco, al_telefone, al_peso, al_altura, al_experiencia, al_objetivo, al_status)
        VALUES ('$nome', '$email', '$senha', '$cpf', '$idade', '$dataNascimento', '$sexo', '$endereco', '$telefone',
         '$peso', '$altura', '$experiencia', '$objetivo', 's')";
          
          if (!mysqli_query($link, $sql)) {
            die('Erro na inserção de usuário: ' . mysqli_error($link));
        }
        echo "<script>window.alert('Aluno cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='cadastro.php';</script>";
    }
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
    <div class="" id="cadastra">
        <form action="cadastro_aluno.php" method="post">
            <label for="">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
            <label for="">Email:</label>
            <input type="text" name="email" id="email" placeholder="email@email.com" required>
            <label for="">Senha</label>
            <input type="password" name="senha" id="senha"  placeholder="Digite a senha" required>
            <label for="">CPF:</label>
            <input type="tel" name="cpf" id="cpf" placeholder="000.000.000-00" required>
            <label for="">Idade:</label>
            <input type="number" name="idade" id="idade" placeholder="Digite sua idade">
            <label for="">Data de Nascimento:</label>
            <input type="date" name="dataNascimento" id="dataNascimento" required>
            <label for="">Gênero:</label>
            <input type="checkbox" name="feminino" id="feminino"  value="Feminino"> Feminino
            <input type="checkbox" name="masculino" id="masculino" value="Masculino"> Masculino
            <label for="">Endereço:</label>
            <input type="text" name="endereco" id="endereco">
            <label for="">Telefone:</label>
            <input type="tel" name="telefone" id="telefone" placeholder="(16) 91234-5678" required>
            <label for="peso">Peso (kg):</label>
            <input type="text" id="peso" name="peso" step="0.01" required>
            <label for="altura">Altura (cm):</label>
            <input type="text" id="altura" name="altura" step="0.01" required>
            <label for="">Experiência</label>
            <input type="checkbox" name="iniciante" id="iniciante" value="Iniciante"> Iniciante
            <input type="checkbox" name="intermediario" id="intermediario" value="Intermediário"> Intermediário
            <input type="checkbox" name="Avançado" id="Avançado" value="Avançado"> Avançado
            <button type="submit">Cadastrar Aluno</button>
        </form>
    </div>
</body>
</html>