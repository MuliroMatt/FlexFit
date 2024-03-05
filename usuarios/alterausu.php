<?php 
include('../conectaDB.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_SESSION['idusuario']; 
    $nome = $_POST['nome']; 
    $nome = strtolower($nome);
    $nome = ucwords($nome);
    $_SESSION['nomeusuario'] = $nome;
    $sobrenome = $_POST['sobrenome']; 
    $sobrenome = strtolower($sobrenome);
    $sobrenome = ucwords($sobrenome);
    $_SESSION['sobrenomeusuario'] = $sobrenome;
    $email = $_POST['email']; 
    $telefone = $_POST['telefone']; 
    $cpf = $_POST['cpf']; 
    $nasc = $_POST['nasc']; 
    $endereco = $_POST['endereco']; 
    $genero = $_POST['genero']; 

    $sql = "UPDATE usuarios 
            SET usu_nome = '$nome', usu_sobrenome = '$sobrenome', usu_email = '$email'
            WHERE usu_id = $id";
    mysqli_query($link, $sql);

    $sql = "UPDATE alunos 
            SET al_telefone = '$telefone', al_cpf = '$cpf', al_dataNasc = '$nasc',
                al_endereco = '$endereco', al_sexo = '$genero'
            WHERE fk_usu_id = $id";
    mysqli_query($link, $sql);

    echo "<script>window.alert('USUÁRIO ALTERADO COM SUCESSO!');</script>";
    echo "<script>window.location.href='perfil.php';</script>";
    exit();
}

?>