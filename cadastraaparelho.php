<?php
//início de sessão
session_start();
include("conectaDB.php");
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $nome = ucfirst(strtolower($nome));
    $categoria = mysqli_real_escape_string($link, $_POST['categoria']);
    $nivel = mysqli_real_escape_string($link, $_POST['nivel']);
    $quantidade = mysqli_real_escape_string($link, $_POST['qtd']);
 
    // Instrução ao SQL
    $sql = "SELECT COUNT(apa_id) FROM aparelhos WHERE apa_nome = '$nome'
    AND apa_categoria = '$categoria' AND apa_nivel = '$nivel' AND apa_quantidade = '$quantidade'";
    $resultado = mysqli_query($link, $sql);

    $resultado = mysqli_fetch_array($resultado)[0];
 
    if($resultado >= 1){
        echo "<script>window.alert('Aparelho já cadastrado!');</script>";
        echo "<script>window.location.href='adm/listaaparelhos.php';</script>";
    } else{
        $sql = "INSERT INTO aparelhos (apa_nome, apa_categoria, apa_nivel, apa_quantidade, apa_status)
        VALUES('$nome', '$categoria','$nivel', '$quantidade', 's')";
        $resultado = mysqli_query($link, $sql);
 
        echo "<script>window.alert('Aparelho cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='adm/listaaparelhos.php';</script>";
    }
}
?>
 