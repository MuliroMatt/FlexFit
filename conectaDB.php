<?php
#CONECTAR COM O XAMPP (SERVIDOR)
$servidor = "localhost";
#NOME DO BANCO
$banco = "FlexFit";
#ADMINISTRADOR
$admin = "root";
#SENHA
$senha = "";
#LINK DE CONEXÃO COM O BANCO
$link = mysqli_connect($servidor, $admin, $senha, $banco);
?>