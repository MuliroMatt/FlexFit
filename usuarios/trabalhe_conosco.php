<?php
    include('cabecalho.php');
    if(!isset($nome)){
        echo "<script>window.location.href='loginusuario.php';</script>";
    } 
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>Document</title>
</head>
<body> 
    <main class="main-cadastraaluno">
        <div class="wrapper">
            <section class="cadastra-container">
                <form action="../cadastrainstrutor.php" method="post" class="cadastra-form">
                    <div class="input-box">
                        <label>CPF</label>
                        <input type="text" name="cpf" required>
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
                        <label>Turno</label>
                        <select name="turno" id="turno" required>
                            <option value="Manhã">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                        </select>
                    </div>
                    
                    <button class="cadastrar-btn" type="submit" name="submit">Cadastrar-se</button>
                </form>
            </section>
        </div>
    </main>
<?php include('../footer.php');?>
</body>
</html>