<?php 
include('../conectaDB.php');
session_start();

if(isset($_POST['alter'])){
    $id = $_SESSION['idusuario']; 
    $nome = $_POST['nome']; 
    $nome = strtolower($nome);
    $nome = ucwords($nome);
    $_SESSION['nomeusuario'] = $nome;
    $sobrenome = $_POST['sobrenome']; 
    $sobrenome = strtolower($sobrenome);
    $sobrenome = ucwords($sobrenome);
    $_SESSION['sobrenomeusuario'] = $sobrenome;
    $email = $_POST['email']; 
    $telefone = $_POST['telefone']; 
    $cpf = $_POST['cpf']; 
    $nasc = $_POST['nasc']; 
    $endereco = $_POST['endereco']; 
    $genero = $_POST['genero'];  

    $sql = "UPDATE usuarios 
            SET usu_nome = '$nome', usu_sobrenome = '$sobrenome', usu_email = '$email'
            WHERE usu_id = $id";
    mysqli_query($link, $sql);

    $sql = "UPDATE alunos 
            SET al_telefone = '$telefone', al_cpf = '$cpf', al_dataNasc = '$nasc',
                al_endereco = '$endereco', al_sexo = '$genero'
            WHERE fk_usu_id = $id";
    mysqli_query($link, $sql);

    echo "<script>window.alert('USUÁRIO ALTERADO COM SUCESSO!');</script>";
    echo "<script>window.location.href='perfil.php';</script>";
    exit();
}

if(isset($_POST['img-btn'])){
    $imagem = $_POST['imagem'];
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
        $tipo = exif_imagetype($_FILES['imagem']['tmp_name']);
    
        if ($tipo !== false){
            // O arquivo é uma imagem
            $imagem_temp = $_FILES['imagem']['tmp_name'];
            $imagem = file_get_contents($imagem_temp);
            $imagem_base64 = base64_encode($imagem);
        } else{
            // O arquivo não é uma imagem
            $imagem = file_get_contents ("..\\img\\alert.png");
            $imagem_base64 = base64_encode($imagem);
        }
    } else{
        // O arquivo não foi enviado
        $imagem = file_get_contents ("..\\img\\alert.png");
        $imagem_base64 = base64_encode($imagem);
    } 
    $sql = "UPDATE usuarios SET usu_img = '$imagem_base64' WHERE usu_id = '$id'";
    $return = mysqli_query($link, $sql);
    // echo "<script>window.location.href='perfil.php';</script>";
}

?>