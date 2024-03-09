<?php 
include ('backnav.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = mysqli_real_escape_string($link, $_POST['nome']);
    $nome = strtolower($nome);
    $nome = ucwords($nome);
    $sobrenome = mysqli_real_escape_string($link, $_POST['sobrenome']);
    $sobrenome = strtolower($sobrenome);
    $sobrenome = ucwords($sobrenome);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $email = strtolower($email);
    $senha = mysqli_real_escape_string($link, $_POST['senha']);
    $cpf = mysqli_real_escape_string($link, $_POST['cpf']);
    $dataNascimento = mysqli_real_escape_string($link, $_POST['nasc']);
    $genero = mysqli_real_escape_string($link, $_POST['genero']);
    $endereco = mysqli_real_escape_string($link, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($link, $_POST['telefone']);
    $usu_id = null;
    $instr_id = $_POST['instrutor'];

    //Instruções ao  banco de dados
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = '$email'";
    $resultado = mysqli_query($link, $sql);
    
    $resultado = mysqli_fetch_array($resultado) [0];

    //Verificação de usuário
    if($resultado >= 1){
        echo "<script>window.alert('Aluno já cadastrado!');</script>";
        echo "<script>window.location.href='listaaluno.php';</script>";
    } else {
        $sql = "INSERT INTO usuarios(usu_nome, usu_sobrenome, usu_email, usu_senha, usu_funcao) 
                VALUES('$nome', '$sobrenome', '$email', '$senha', 'a')";
        $resultado = mysqli_query($link, $sql);

        $sql = "SELECT * FROM usuarios WHERE usu_email = '$email'";
        $resultado = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($resultado)){
            $usu_id = $tbl[0];
        }

        $sql = "INSERT INTO alunos (al_cpf, al_dataNasc, al_sexo, al_endereco, al_telefone, al_status, fk_usu_id, fk_instr_id)
                VALUES ('$cpf', '$dataNascimento', '$genero', '$endereco', '$telefone', 's', '$usu_id', '$instr_id')";
        $resultado = mysqli_query($link, $sql);
        
        echo "<script>window.alert('Bem Vindo a FlexFit!');</script>";
        echo "<script>window.location.href='listaaluno.php';</script>";
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
    <title>Document</title>
</head>
<body>
    <main class="main-novo aluno">
        <header class="lista-header">
            <div class="right">
                <h3>Alunos</h3>
            </div>
            <div class="left">
                <a href="listaaluno.php"><i class="bi bi-chevron-left"></i></a>
            </div>
        </header>
        <div class="cadastra-container">
            <form action="novoaluno.php" method="post" class="cadastra-form">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="input-box">
                    <label>Sobrenome</label>
                    <input type="text" name="sobrenome" required>
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
                        <label>Instrutor</label>
                        <select name="instrutor" id="instrutor" required>
                            <option value="A definir">A definir</option>
                        <?php
                            //* Consulta SQL para obter os registros da tabela 'fornecedores'
                            $sql = "SELECT usuarios.usu_nome, instrutores.instr_id
                                    FROM usuarios
                                    INNER JOIN instrutores 
                                    ON usuarios.usu_id = instrutores.fk_usu_id;";
                            
                            //* Executa a consulta e obtém o resultado
                            $retorno = mysqli_query($link, $sql);

                            //* Itera sobre os registros retornados e cria opções para o elemento select
                            while($tbl = mysqli_fetch_array($retorno)){
                        ?>
                            <option value="<?=$tbl[1]?>"><?=$tbl[0]?></option>
                        <?php
                            }
                        ?>
                        </select>
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