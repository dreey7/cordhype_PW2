<?php
session_start();
require 'conexao.php';

//verificar se está logado
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Atualizar categoria</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>

    <?php
    require "../conexao.php";

        $id = $_GET["id_categoria"];
        $select_f = "SELECT * FROM categoria where idCategoria = $id";
        $resultado_f = mysqli_query($conexao, $select_f);
        $codigo_f = mysqli_fetch_assoc($resultado_f);
    ?>

    <h1>Atualizar categoria</h1>
        <form action="salvar-novo-categoria.php" method="post">
            <input type="hidden" name="id" value="<?=$codigo_f["idCategoria"]?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value= "<?=$codigo_f["Nome"]?>">
            <br>
            <button>ATUALIZAR</button> 
        </form>
