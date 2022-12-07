<?php

session_start();

//verificar se está logado
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 


    require "../conexao.php";

    $id = $_GET["id_categoria"];

    $delete = "DELETE FROM categoria WHERE idCategoria = $id";
    
    $resultado = mysqli_query($conexao, $delete);
   
    if ($resultado) {
        header("Location: ver-todos-categoria.php");
        die();
    } else {
        echo "Deu erro";
    }
