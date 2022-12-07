<?php

require "../conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$dtNasc = $_POST["data"];
$endereco = $_POST["endereco"];
$genero = $_POST["sexo"];
$senha = $_POST["senha"];
$telefone = $_POST["telefone"];

if ($genero == 'M') {
    
}

$nomeTMP = $_FILES['img']['name'];
$arquivoTMP = $_FILES['img']['tmp_name'];
$destino = "../img/img-upload/". $nomeTMP;
move_uploaded_file($arquivoTMP, $destino);

$insert = "INSERT INTO usuario (Nome, email, CPF, RG, DtNasc, Endereco, genero, senha, telefone, Imagem) values ('$nome', '$email', '$cpf', '$rg', '$dtNasc', '$endereco', '$genero', '$senha', '$telefone', '$destino')";
$resultado = mysqli_query($conexao, $insert);

if ($resultado) {
    header("Location: ../index.php");
    die();
} else {
    echo "Deu erro";
}

?>