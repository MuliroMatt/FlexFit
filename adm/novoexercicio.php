<?php 
include('backnav.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $nome = ucwords(strtolower($nome));
    $video = $_POST['video'];
    $aparelho = $_POST['aparelho'];

    $sql = "SELECT COUNT(ex_id) FROM exercicios WHERE ex_nome = '$nome'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result) [0];

    if($result >= 1){
        echo "<script>window.alert('Exercício já cadastrado');</script>";
        echo "<script>window.location.href='novoexercicio.php';</script>";
    }
    else{
        $sql = "INSERT INTO exercicios(ex_nome, ex_video, fk_apa_id) 
                VALUES('$nome', '$video', '$aparelho')";
        $resultado = mysqli_query($link, $sql);

        echo "<script>window.alert('Exercício cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='listaexercicio.php';</script>";
    }

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
            <form action="novoexercicio.php" method="post" class="cadastra-form">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="input-box">
                    <label>Link Video</label>
                    <input type="url" name="video">
                </div>
                <div class="input-box">
                    <label>Aparelho</label>
                    <select name="aparelho">
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