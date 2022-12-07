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
    <title>CORDHYPE - Adicionar imagem </title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
    <style>

h1 {
    text-align: center;
    margin-top: 90px;
    margin-bottom: 10px;
    font-family: Arial, Helvetica, sans-serif;
}

#formulario {
    display: flex;
    justify-content: center;
}

#formulario input, select, option {
    width: 230px;
    height: 20px;
    margin-bottom: 5px;
    border-radius: 0px;
    border-style: solid;
    border-color: black;
    border-width: 1px;
}


#formulario label {
    font-size: 12px;
    font-family: Arial, Helvetica, sans-serif;
}

#formulario button {
    background-color: rgb(0, 0, 0);
    color: white;
    width: 232px;
    height: 50px;
    font-family: Arial, Helvetica, sans-serif;
    cursor: pointer;
}

    </style>
<body>

    <?php
    require "../conexao.php";
        $id = $_GET['id_produto'];
        $select_u = "SELECT * FROM produto where idProduto = '$id'";
        $resultado_u = mysqli_query($conexao, $select_u);
        $codigo_u = mysqli_fetch_assoc($resultado_u);
    ?>
    
    <h1>ADICIONE IMAGEM</h1>
    <div id="formulario">
    <form action="upar-img.php" method="post" enctype="multipart/form-data">
        <label for="img">Img:</label><br>
            <input type="file" multiple="multiple" name="img[]" id="img">  
        <br>
        <input type="hidden" name="id" value="<?=$codigo_u["idProduto"]?>">
        <input type="hidden" name="nome" value="<?=$codigo_u["Nome"]?>">
        <input type="hidden" name="descricao" value="<?=$codigo_u["Descricao"]?>">
        <input type="hidden" name="VlrVenda" value="<?=$codigo_u["VlrVenda"]?>">
        <input type="hidden" name="Cor" value="<?=$codigo_u["Cor"]?>">
        <br>
        <button>ADICIONAR</button>
    </form>
    </div>
</body>
</html>