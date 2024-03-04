<?php
//início de sessão
session_start();
include("conectaDB.php");
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nomeaparelho']);
    $categoria = mysqli_real_escape_string($link, $_POST['categorias']);
    $nivel = mysqli_real_escape_string($link, $_POST['nivel']);
    $quantidade = mysqli_real_escape_string($link, $_POST['quantidade']);
 
    // Instrução ao SQL
    $sql = "SELECT COUNT(apa_id) FROM aparelhos WHERE apa_nome = '$nome'
    AND apa_categoria = '$categoria' AND apa_nivel = '$nivel' AND apa_quantidade = '$quantidade'";
    $resultado = mysqli_query($link, $sql);
 
    if(!$resultado){
        die('Erro de consulta SQL: ' . mysqli_error($link));
    }
    $resultado = mysqli_fetch_array($resultado)[0];
 
    if($resultado >= 1){
        echo "<script>window.alert('Aparelho já cadastrado!');</script>";
        echo "<script>window.location.href='cadastraaparelho.php';</script>";
    } else{
        $sql = "INSERT INTO aparelhos (apa_nome, apa_categoria, apa_nivel, apa_quantidade, apa_status)
        VALUES('$nome', '$categoria','$nivel', '$quantidade', 's')";
 
        if (!mysqli_query($link, $sql)) {
            die('Erro na inserção de aparelho: ' . mysqli_error($link));
        }
        echo "<script>window.alert('Aparelho cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='cadastraaparelho.php';</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Cadastro aparelho</title>
</head>
<body>
    <div id="container">
        <form action="cadastro_aparelho.php" method="post">
            <!-- FORMULÁRIO PARA CADASTRO DOS APARELHOS -->
            <label for="">Nome:</label>
            <input type="text" name="nomeaparelho" id="nomeaparelho" placeholder="Nome do aparelho" required>
            <br>
            <label for="">Categoria:</label>
            <input type="checkbox" name="categorias" class="checkbox" <?= $categoria == 'Cardio' ? "checked" : ""?>> Cardio
            <input type="checkbox" name="categorias" class="checkbox" <?= $categoria == 'Abdômen e Lombar' ? "checked" : ""?>> Abdômen e Lombar
            <input type="checkbox" name="categorias" class="checkbox" <?= $categoria == 'Superiores' ? "checked" : ""?>> Superiores
            <input type="checkbox" name="categorias" class="checkbox" <?= $categoria == 'Inferiores' ? "checked" : ""?>> Inferiores
            <br>
            <label for="">Nivel:</label>
            <input type="checkbox" name="nivel" class="checkbox" <?= $nivel == 'Básico' ? "checked" : ""?>> Básico
            <input type="checkbox" name="nivel" class="checkbox" <?= $nivel == 'Intermediário' ? "checked" : ""?>>Intermediário
            <input type="checkbox" name="nivel" class="checkbox" <?= $nivel == 'Avançado' ? "checked" : ""?>>Avançado
            <br>
            <label for="">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" required>
            <input type="submit" value="SALVAR" required>
        </form>
    </div>
</body>
</html>