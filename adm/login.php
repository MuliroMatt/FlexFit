<?php 
include('../conectaDB.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT COUNT(adm_id) FROM administradores WHERE adm_email = '$email' AND adm_senha = '$senha'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if ($result == 1){
        $sql = "SELECT * FROM administradores WHERE adm_email = '$email' AND adm_senha = '$senha' AND adm_status = 's'";
        $result = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($result)) {
            $_SESSION['idadmin'] = $tbl[0];
            $_SESSION['nomeadmin'] = $tbl[1];
            $_SESSION['sobrenomeadmin'] = $tbl[1];
            $_SESSION['emailadmin'] = $tbl[2];
        }
        echo "<script>window.location.href='backoffice.php';</script>";

    }
    else {
    //* Exibe uma mensagem de alerta se as credenciais do usuário forem inválidas
    echo "<script>window.alert('USUÁRIO OU SENHA INCORRETOS');</script>";
}

}

?>