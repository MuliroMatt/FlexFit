<?php
include("conectaDB.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $nome = ucwords(strtolower($nome));
    $sobrenome = mysqli_real_escape_string($link, $_POST['sobrenome']);
    $sobrenome = ucwords(strtolower($sobrenome));
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $email = strtolower($email);
    $senha = mysqli_real_escape_string($link, $_POST['senha']);

    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = '$email'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if($result >= 1){
        echo "<script>window.alert('Usuário já cadastrado');</script>";
    }
    else{
        $sql = "INSERT INTO usuarios(usu_nome, usu_sobrenome, usu_email, usu_senha) 
                VALUES('$nome', '$sobrenome', '$email', '$senha')";
        $resultado = mysqli_query($link, $sql);

        echo "<script>window.alert('Usuário cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }

}
?>
