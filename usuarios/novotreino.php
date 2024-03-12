<?php 
include('../conectaDB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usu_id = $_POST['usu_id'];
    $instr_id = $_POST['instr_id'];
    $al_id = $_POST['al_id'];
    $novotreino = $_POST['novotreino'];


    $sql = "SELECT COUNT(tr_id) FROM treinos WHERE tr_dia = '$novotreino' AND fk_al_id = '$al_id'";
    $return = mysqli_query($link, $sql);
    $return = mysqli_fetch_array($return) [0];

    if($return >= 1){
        echo "<script>window.alert('Treino já criado');</script>";
        echo "<script>window.location.href='editartreino.php?id=$usu_id' ;</script>";
    }
    else{
        $sql = "INSERT INTO treinos (tr_dia, fk_instr_id, fk_al_id)
                VALUES ('$novotreino', '$instr_id', '$al_id')";
        $return = mysqli_query($link, $sql);
    
        echo "<script>window.alert('Treino criado com sucesso!');</script>";
        echo "<script>window.location.href='editartreino.php?id=$usu_id' ;</script>";
    }

}
?>