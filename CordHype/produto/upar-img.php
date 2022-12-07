<?php

session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? False;

if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

require "../conexao.php";


$imagem = array_filter($_FILES['img']);
$idProduto = $_POST['id'];
$id = mysqli_insert_id($conexao);

foreach($_FILES['img']['name'] as $key=>$val)
    { 
        $fileName = $_FILES['img']['name'][$key];
        $fileTMP = $_FILES['img']['tmp_name'][$key]; 
        $to = "../img/img-upload/" . $fileName;
        move_uploaded_file($fileTMP, $to);

    $insertImagens = "INSERT INTO imagem (caminho, idProduto) VALUES ('$to', '$idProduto')";
    $queryImagens = mysqli_query($conexao, $insertImagens);
}   




if ($queryImagens) {
    header("Location: ../index.php");
    die();
    
} else {
    echo "Deu erro";
}