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
    $sql = "SELECT COUNT(adm_id) FROM administradores WHERE adm_email = '$email'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if($result >= 1){
        echo "<script>window.alert('Usuário já cadastrado');</script>";
        echo "<script>window.location.href='adm /loginadm.php';</script>";
    }
    else{
        $sql = "INSERT INTO administradores(adm_nome, adm_sobrenome, adm_email, adm_senha, adm_status) 
                VALUES('$nome', '$sobrenome','$email', '$senha', 's')";
        $resultado = mysqli_query($link, $sql);

        echo "<script>window.alert('Usuário cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='adm/loginadm.php';</script>";
    }
}

?>
