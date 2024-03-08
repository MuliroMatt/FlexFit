<?php 
include ('backnav.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //* Obtém os dados do formulário 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $nivel = $_POST['nivel'];
    $quantidade = $_POST['quantidade'];
    $status = $_POST['status'];

    $sql = "UPDATE aparelhos SET apa_nome = '$nome', apa_categoria = '$categoria', apa_nivel = '$nivel', 
                   apa_quantidade = '$quantidade', apa_status = '$status' 
            WHERE apa_id = '$id'";
    mysqli_query($link, $sql);

    echo "<script>window.alert('Aparelho alterado com sucesso!');</script>";
    echo "<script>window.location.href='listaaparelhos.php';</script>";
}

$id = $_GET['id'];

$sql = "SELECT * FROM aparelhos WHERE apa_id = $id;";
$return = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($return)){
    $nome = $tbl['apa_nome'];
    $categoria = $tbl['apa_categoria'];
    $nivel = $tbl['apa_nivel'];
    $quantidade = $tbl['apa_quantidade'];
    $status = $tbl['apa_status'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <main class="main-novo aluno">
        <header class="lista-header">
            <div class="right">
                <h3>Aparelhos</h3>
            </div>
            <div class="left">
                <a href="listaaparelhos.php"><i class="bi bi-chevron-left"></i></a>
            </div>
        </header>
        <div class="cadastra-container">
            <form action="alteraaparelho.php" method="post" class="cadastra-form">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?=$nome?>" required>
                </div>
                <div class="input-box">
                    <label>Categoria</label>
                    <select name="categoria">
                        <option value="<?=$categoria?>"><?=$categoria?></option>
                        <option value="Cardio">Cardio</option>
                        <option value="Abdômen e Lombar">Abdômen e Lombar</option>
                        <option value="Superiores">Superiores</option>
                        <option value="Inferiores">Inferiores</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Nível</label>
                    <select name="nivel">
                        <option value="<?=$nivel?>"><?=$nivel?></option>
                        <option value="Básico">Básico</option>
                        <option value="Intermediário">Intermediário</option>
                        <option value="Avançado">Avançado</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" value="<?=$quantidade?>" required>
                </div>
                <div class="input-box">
                    <label>Status</label>
                    <select name="status" required>
                        <option value="s">Ativo</option>
                        <option value="n">Inativo</option>
                    </select>
                </div>
                <button class="cadastrar-btn" type="submit" name="submit">Alterar</button>
            </form>
        </div>
    </main>
</body>
</html>