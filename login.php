<?php 
include('conectaDB.php');

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = '$email' AND usu_senha = '$senha'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if ($result == 1){
        $sql = "SELECT * FROM usuarios WHERE usu_email = '$email' AND usu_senha = '$senha' AND usu_status = 's'";
        $result = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($result)) {
            $_SESSION['idusuario'] = $tbl[0];
            $_SESSION['nomeusuario'] = $tbl[1];
            $_SESSION['sobrenomeusuario'] = $tbl[2];
            $_SESSION['emailusuario'] = $tbl[3];
            $_SESSION['funcaousuario'] = $tbl[5];
        }
        echo "<script>window.location.href='usuario.php';</script>";

    }
    else {
    //* Exibe uma mensagem de alerta se as credenciais do usuário forem inválidas
    echo "<script>window.alert('USUÁRIO OU SENHA INCORRETOS');</script>";
}

}

?>