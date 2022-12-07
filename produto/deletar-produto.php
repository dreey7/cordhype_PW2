<?php

session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? False;

if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

    require "../conexao.php";

    $id = $_GET['id_produto'];
    $delete = "DELETE FROM produto WHERE idProduto = $id";
    $deleteImg = "DELETE FROM imagem WHERE idProduto = $id";
    
    $resultadoImg = mysqli_query($conexao, $deleteImg);
    $resultado = mysqli_query($conexao, $delete);
    
    if ($resultado) {
        header("Location: ../index.php");
        die();
    } else {
        echo "Deu erro";
    }
