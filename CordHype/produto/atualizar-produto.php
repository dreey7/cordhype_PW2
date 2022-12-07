<?php
session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? False;

if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Atualizar produto</title>
    <link rel="stylesheet" href="/cordHype/estilos/style-atualizarProduto.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <?php
    require "../conexao.php";
        $id = $_GET['id_produto'];
        $select_u = "SELECT * FROM produto where idProduto = '$id'";
        $resultado_u = mysqli_query($conexao, $select_u);
        $codigo_u = mysqli_fetch_assoc($resultado_u);
        $selectFornecedor = "SELECT * FROM fornecedor";
        $selectCategoria = "SELECT * FROM categoria";
    ?>
    <a href="../index.php"><ion-icon id="seta-voltar" name="arrow-back-circle-outline"></ion-icon></a>
    <h1>ATUALIZAR SEU PRODUTO</h1>
    <div id="formulario">
    <form  action="salvar-novo-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$codigo_u["idProduto"]?>"><br>
        <label for="nome">Nome:</label><br>
            <input type="text" name="nome" value="<?=$codigo_u["Nome"]?>"><br>
        <label for="descricao">Descrição:</label><br>
            <textarea value="<?=$codigo_u["Descricao"]?> rows="2" id="desc" name="descricao"></textarea><br>
        <label for="VlrVenda">Valor:</label><br>
            <input type="text" name="VlrVenda" value="<?=$codigo_u["VlrVenda"]?>"><br>
        <label for="tamanho">Tamanho:</label><br>
            <select name="tamanho">
                <option value="P">P</option>
                <option value="M">M</option>
                <option value="G">G</option>
            </select><br>
        <label for="Cor">Cor:</label><br>
            <input type="text" name="Cor" value="<?=$codigo_u["Cor"]?>"><br>
        <label for="fornecedor">Fornecedor:</label><br>
        <select name="fornecedor"> 
            <?php
                $resultadoFornecedor = mysqli_query($conexao, $selectFornecedor);
                while($codigo = mysqli_fetch_assoc($resultadoFornecedor)) : 
            ?>
                    <option value="<?=$codigo["Nome"]?>"><?=$codigo["Nome"]?></option>
                <?php endwhile; ?>
            </select><br>
        <label for="categoria">Categoria:</label><br>
            <select name="categoria"> 
                <?php
                    $resultadoCategoria = mysqli_query($conexao, $selectCategoria);
                    while($codigo = mysqli_fetch_assoc($resultadoCategoria)) : 
                ?>
                    <option value="<?=$codigo["Nome"]?>"><?=$codigo["Nome"]?></option>
                    <?php endwhile; ?>
        </select><br>
        <button>ATUALIZAR</button>
    </form>
    </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>