<?php

session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? False;

if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

require "../conexao.php";
$selectFornecedor = "SELECT * FROM fornecedor";
$selectCategoria = "SELECT * FROM categoria";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Cadastrar produto</title>
    <link rel="stylesheet" href="/CordHype/estilos/style-cadastroProduto.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <a href="../dashboard.php"><ion-icon id="seta-voltar" name="arrow-back-circle-outline"></ion-icon></a>

    <h1>CADASTRE SEU PRODUTO</h1>
    <div id="formulario">
        <form action="salvar-produto.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome"> 
            <br>
            <label for="descricao">Descrição:</label><br>
            <textarea rows="2" id="desc" name="descricao"></textarea>
            <br>
            <label for="VlrVenda">Valor:</label><br>
            <input type="text" name="VlrVenda">
            <br>
            <label for="tamanho">Tamanho:</label><br>
            <select name="tamanho">
                <option value="P">P</option>
                <option value="M">M</option>
                <option value="G">G</option>
            </select>
            <br>
            <label for="Cor">Cor:</label><br>
            <input type="text" name="Cor">
            <br>
                <label for="img">Img:</label><br>
                <input type="file" name="imagem" id="img"> 
            <br>
            <label for="fornecedor">Fornecedor:</label><br>
            <select name="fornecedor"> 
            <?php
                $resultadoFornecedor = mysqli_query($conexao, $selectFornecedor);
                while($codigo = mysqli_fetch_assoc($resultadoFornecedor)) : ?>
                    <option value="<?=$codigo["Nome"]?>"><?=$codigo["Nome"]?></option>
                <?php endwhile; ?>
            </select>
            <br>

            <label for="categoria">Categoria:</label><br>
            <select name="categoria"> 
            <?php
                $resultadoCategoria = mysqli_query($conexao, $selectCategoria);
                while($codigo = mysqli_fetch_assoc($resultadoCategoria)) : ?>
                    <option value="<?=$codigo["Nome"]?>"><?=$codigo["Nome"]?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <button>Cadastrar</button>
        </form>
    </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
