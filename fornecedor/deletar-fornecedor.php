<?php

session_start();
if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

//verificar se está logado
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 

    require "../conexao.php";

    $id = $_GET["id_fornecedor"];

    $delete = "DELETE FROM fornecedor WHERE idFornecedor = $id";
    
    $resultado = mysqli_query($conexao, $delete);
   
    if ($resultado) {
        header("Location: ver-todos-fornecedor.php");
        die();
    } else {
        echo "Deu erro";
    }
