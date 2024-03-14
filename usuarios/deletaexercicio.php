<?php 
include("../conectaDB.php");
session_start();
$et_id = $_GET['id'];


$sql = "DELETE FROM exercicios_treino WHERE et_id = '$et_id'";
$return = mysqli_query($link, $sql);

echo "<script>window.alert('Exercício deletado');</script>";
echo "<script>window.location.href='editartreino.php?id={$_SESSION['usu_id']}&dia={$_SESSION['treino_id']}';</script>";
?>