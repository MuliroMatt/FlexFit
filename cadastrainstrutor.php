<?php
include("conectaDB.php");
session_start();

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
        echo "<script>window.location.href='instrutor.php';</script>";
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