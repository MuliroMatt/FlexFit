<?php 
include("../conectaDB.php");
session_start();
$tr_id = $_GET['id'];

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $sql = "DELETE FROM exercicios_treino WHERE fk_tr_id = '$tr_id'";
    $return = mysqli_query($link, $sql);

    $sql = "DELETE FROM treinos WHERE tr_id = '$tr_id'";
    $return = mysqli_query($link, $sql);

    echo "<script>window.alert('Treino deletado');</script>";
    echo "<script>window.location.href='editartreino.php?id={$_SESSION['usu_id']}';</script>";
} else {
    // Display confirmation dialog
    echo "<script>
          var confirmDelete = confirm('Tem certeza que deseja deletar o treino?');
          if (confirmDelete) {
              window.location.href='deletatreino.php?id=$tr_id&confirm=yes';
          } else {
              window.location.href='editartreino.php?id={$_SESSION['usu_id']}';
          }
          </script>";
}