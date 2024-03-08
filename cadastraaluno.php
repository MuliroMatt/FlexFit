<?php
include("conectaDB.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cpf = mysqli_real_escape_string($link, $_POST['cpf']);
    $dataNascimento = mysqli_real_escape_string($link, $_POST['nasc']);
    $genero = mysqli_real_escape_string($link, $_POST['genero']);
    $endereco = mysqli_real_escape_string($link, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($link, $_POST['telefone']);
    $usu_id = $_SESSION['idusuario'];
    $_SESSION['funcaousuario'] = 'a';

    //Instruções ao  banco de dados
    $sql = "SELECT COUNT(al_id) FROM alunos WHERE al_cpf = '$cpf' OR fk_usu_id = '$usu_id'";
    $resultado = mysqli_query($link, $sql);
    
    $resultado = mysqli_fetch_array($resultado) [0];

    //Verificação de usuário
    if($resultado >= 1){
        echo "<script>window.alert('Aluno já cadastrado!');</script>";
        echo "<script>window.location.href='aluno.php';</script>";
    } else {
        $sql = "INSERT INTO alunos (al_cpf, al_dataNasc, al_sexo, al_endereco, al_telefone, fk_usu_id, al_status)
                VALUES ('$cpf', '$dataNascimento', '$genero', '$endereco', '$telefone', '$usu_id', 's')";
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