<?php

session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? False;

if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

require "../conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$vlrVenda = $_POST["VlrVenda"];
$Tamanho = $_POST["tamanho"];
$Cor = $_POST["Cor"];
$Fornecedor = $_POST["fornecedor"];
$Categoria = $_POST["categoria"];

    
$update = "UPDATE produto SET Nome = '$nome', Descricao = '$descricao', VlrVenda = '$vlrVenda', Tamanho = '$Tamanho', Cor = '$Cor', Fornecedor = '$Fornecedor', categoria = '$Categoria' WHERE 
idProduto = '$id'";

$resultado = mysqli_query($conexao, $update);

if ($resultado) {
    header("Location: ../index.php");
    die();
    
} else {
    echo "Deu erro";
}

?>
