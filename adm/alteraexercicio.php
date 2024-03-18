<?php
include("backnav.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nome = ucwords(strtolower($nome));
    $video = $_POST['video'];
    $aparelho = $_POST['aparelho'];

    $sql = "UPDATE exercicios SET ex_nome = '$nome', ex_video = '$video', fk_apa_id = '$aparelho' WHERE ex_id = '$id'";
    mysqli_query($link, $sql);

    echo "<script>window.alert('Nome alterado com sucesso!');</script>";
    echo "<script>window.location.href='listaexercicio.php';</script>";
}
$id = $_GET['id'];

$sql = "SELECT * FROM exercicios WHERE ex_id = $id;";
$return = mysqli_query($link, $sql);

    while($tbl = mysqli_fetch_array( $return )){
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>FlexFit</title>
</head>
<body>
    <main class="main-novo">
        <header class="lista-header">
            <div class="right">
                <h3>Exercícios</h3>
            </div>
            <div class="left">
                <a href="listaexercicio.php"><i class="bi bi-chevron-left"></i></a>
            </div>
        </header>
        <div class="cadastra-container">
            <form action="alteraexercicio.php" method="post" class="cadastra-form">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?=$nome?>" required>
                </div>
                <div class="input-box">
                    <label>Link Video</label>
                    <input type="url" name="video" value="<?=$video?>">
                </div>
                <div class="input-box">
                    <label>Aparelho</label>
                    <select name="aparelho">
                        <?php 
                        $sql = "SELECT apa_nome FROM aparelhos WHERE apa_id = $aparelho";
                        $return = mysqli_query($link, $sql);
                        while($tbl = mysqli_fetch_array($return)){
                            $nomeaparelho = $tbl['apa_nome'];
                        }
                        ?>
                        <option value="<?=$aparelho?>"><?=$nomeaparelho?></option>
                        <?php 
                        $sql = "SELECT * FROM aparelhos WHERE apa_status = 's'";
                        $return = mysqli_query($link, $sql);
                        while($tbl = mysqli_fetch_array($return)){
                        ?>
                        <option value="<?=$tbl['apa_id']?>"><?=$tbl['apa_nome']?></option>
                        <?php }?>
                    </select>
                </div>

                <button class="cadastrar-btn" type="submit" name="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>