<?php 
include ('backnav.php');
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
        <div class="cadastra-container">
            <form action="novoaluno.php" method="post" class="cadastra-form">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="input-box">
                    <label>E-mail</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-box">
                        <label>CPF</label>
                        <input type="text" name="cpf" required>
                    </div>
                    <div class="input-box">
                        <label>Nascimento</label>
                        <input type="date" name="nasc" required>
                    </div>
                    <div class="input-box">
                        <label>Telefone</label>
                        <input type="text" name="telefone" required>
                    </div>
                    <div class="input-box">
                        <label>Gênero</label>
                        <select name="genero" id="genero" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label>Endereço</label>
                        <input type="text" name="endereco" required>
                    </div>
                <div class="input-box">
                    <label>Senha</label>
                    <input type="password" name="senha" required>
                </div>
                <button class="cadastrar-btn" type="submit" name="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>