<?php 
include ('backnav.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //* Obtém os dados do formulário 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];
    $img = $_POST['img'];
    $cpf = $_POST['cpf'];
    $nasc = $_POST['nasc'];
    $genero = $_POST['genero'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $instrutor = $_POST['instrutor'];
    $status = $_POST['status'];

    $sql = "UPDATE usuarios SET usu_nome = '$nome', usu_sobrenome = '$sobrenome', usu_email = '$email', 
                   usu_senha = '$senha',  usu_funcao = '$funcao' 
            WHERE usu_id = '$id'";
    mysqli_query($link, $sql);

    $sql = "UPDATE alunos SET al_cpf = '$cpf', al_dataNasc = '$nasc', al_sexo = '$genero', al_endereco = '$endereco', 
                   al_telefone = '$telefone', fk_instr_id = '$instrutor', al_status = '$status'
            WHERE fk_usu_id = '$id'";
    mysqli_query($link, $sql);

    echo "<script>window.alert('Usuário alterado com sucesso!');</script>";
    echo "<script>window.location.href='listaaluno.php';</script>";
}

$id = $_GET['id'];

$sql = "SELECT *
        FROM usuarios u
        JOIN alunos a ON u.usu_id = a.fk_usu_id
        WHERE u.usu_id = $id;";
$return = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($return)){
    $nome = $tbl['usu_nome'];
    $sobrenome = $tbl['usu_sobrenome'];
    $email = $tbl['usu_email'];
    $senha = $tbl['usu_senha'];
    $funcao = $tbl['usu_funcao'];
    $img = $tbl['usu_img'];
    $cpf = $tbl['al_cpf'];
    $nasc = $tbl['al_dataNasc'];
    $genero = $tbl['al_sexo'];
    $endereco = $tbl['al_endereco'];
    $telefone = $tbl['al_telefone'];
    $instrutor = $tbl['fk_instr_id'];
    $status = $tbl['al_status'];
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
            <form action="alteraaluno.php" method="post" class="cadastra-form">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="input-box">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?=$nome?>" required>
                </div>
                <div class="input-box">
                    <label>Sobrenome</label>
                    <input type="text" name="sobrenome" value="<?=$sobrenome?>" required>
                </div>
                <div class="input-box">
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?=$email?>" required>
                </div>
                <div class="input-box">
                    <label>Função</label>
                    <select name="funcao" id="funcao" required>
                        <!-- <option value="<?=$funcao?>"><?=$funcao?></option> -->
                        <option value="a">Aluno</option>
                        <option value="i">Instrutor</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>CPF</label>
                    <input type="text" name="cpf" value="<?=$cpf?>" required>
                </div>
                <div class="input-box">
                    <label>Nascimento</label>
                    <input type="date" name="nasc" value="<?=$nasc?>" required>
                </div>
                <div class="input-box">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?=$telefone?>" required>
                </div>
                <div class="input-box">
                    <label>Gênero</label>
                    <select name="genero" id="genero" required>
                        <option value="<?=$genero?>"><?=$genero?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Endereço</label>
                    <input type="text" name="endereco" value="<?=$endereco?>" required>
                </div>
                <div class="input-box">
                    <label>Instrutor</label>
                    <select name="instrutor" id="instrutor" required>
                    <?php 
                        $sql = "SELECT usuarios.usu_nome
                                FROM usuarios
                                INNER JOIN instrutores 
                                ON usuarios.usu_id = instrutores.fk_usu_id
                                WHERE instr_id = '$instrutor';";
                
                        $retorno = mysqli_query($link, $sql);

                        while($tbl = mysqli_fetch_array($retorno)){
                            $instrutor = $tbl[0];
                        }
                    ?>
                        <option value="<?=$instrutor?>"><?=$instrutor?></option>
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
                    <label>Status</label>
                    <select name="status" required>
                        <option value="s">Ativo</option>
                        <option value="n">Inativo</option>
                    </select>
                </div>
                <div class="input-box">
                    <label>Senha</label>
                    <input type="password" name="senha" value="<?=$senha?>" required>
                </div>
                <button class="cadastrar-btn" type="submit" name="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>