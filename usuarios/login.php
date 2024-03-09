<?php 
include('../conectaDB.php');

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = '$email' AND usu_senha = '$senha'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if ($result == 1){
        $sql = "SELECT * FROM usuarios WHERE usu_email = '$email' AND usu_senha = '$senha'";
        $result = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($result)) {
            $_SESSION['idusuario'] = $tbl['usu_id'];
            $_SESSION['nomeusuario'] = $tbl['usu_nome'];
            $_SESSION['sobrenomeusuario'] = $tbl['usu_sobrenome'];
            $_SESSION['emailusuario'] = $tbl['usu_email'];
            $_SESSION['funcaousuario'] = $tbl['usu_funcao'];
        }
        echo "<script>window.location.href='../index.php';</script>";

    }
    else {
    //* Exibe uma mensagem de alerta se as credenciais do usuário forem inválidas
    echo "<script>window.alert('USUÁRIO OU SENHA INCORRETOS');</script>";
    echo "<script>window.location.href='loginusuario.php';</script>";
}

}

?>