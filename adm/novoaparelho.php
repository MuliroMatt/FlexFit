<?php 
include('backnav.php');
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
                <h3>Aparelhos</h3>
            </div>
            <div class="left">
                <a href="listaaparelhos.php"><i class="bi bi-chevron-left"></i></a>
            </div>
        </header>
        <div class="cadastra-container">
            <form action="../cadastraaparelho.php" method="post" class="cadastra-form">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="input-box">
                    <label>Categoria</label>
                    <select name="categoria">
                        <option value="Cardio">Cardio</option>
                        <option value="Abdômen e Lombar">Abdômen e Lombar</option>
                        <option value="Superiores">Superiores</option>
                        <option value="Inferiores">Inferiores</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Nível</label>
                    <select name="nivel">
                        <option value="Básico">Básico</option>
                        <option value="Intermediário">Intermediário</option>
                        <option value="Avançado">Avançado</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Quantidade</label>
                    <input type="number" name="qtd" required>
                </div>
                <button class="cadastrar-btn" type="submit" name="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>