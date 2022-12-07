<?php

session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? False;

if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

require '../conexao.php';

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$vlrVenda = $_POST["VlrVenda"];
$Tamanho = $_POST["tamanho"];
$Cor = $_POST["Cor"];
$Categoria = $_POST["categoria"];
$Fornecedor = $_POST["fornecedor"];

$nomeTMP = $_FILES['imagem']['name'];
$arquivoTMP = $_FILES['imagem']['tmp_name'];
$destino = "../img/img-upload/". $nomeTMP;
move_uploaded_file($arquivoTMP, $destino);

$insert = "INSERT INTO produto (Nome, Descricao, VlrVenda, Tamanho, Cor, imagem, Fornecedor, categoria ) values ('$nome', '$descricao', '$vlrVenda', '$Tamanho', '$Cor', '$destino', '$Fornecedor', '$Categoria')";
$resultado = mysqli_query($conexao, $insert);

/* ----------------------------- MAIS IMAGEM  ---------------------------------- */

foreach($_FILES['img']['name'] as $key=>$val)
    { 
        $fileName = $_FILES['img']['name'][$key];
        $fileTMP = $_FILES['img']['tmp_name'][$key]; 
        $to = "../img/img-upload/" . $fileName;

        move_uploaded_file($fileTMP, $to);

    $insertImagens = "INSERT INTO imagem (caminho, idProduto) VALUES ('$to', '$id')";
    $queryImagens = mysqli_query($conexao, $insertImagens);
}

if ($resultado) {
    header("Location: ../index.php");
    die();
    
} else {
    echo "Deu erro";
}

?>