<?php 
include('usernav.php');

$id = $_GET['id'];

$sql = "SELECT * FROM exercicios WHERE ex_id = $id";
$return = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($return)){
    $nome = $tbl['ex_nome'];
    $video = $tbl['ex_video'];
    $aparelho = $tbl['fk_apa_id'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <script src="https://kit.fontawesome.com/fc1c840fda.js" crossorigin="anonymous"></script>
    <title>FlexFit</title>
</head>
<body>
    <main class="verexercicio-main">

        <iframe width="420" height="315"
        src="<?=$video?>">
        </iframe>
    </main>
</body>
</html>