<?php
session_start(); 
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 
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
    <title>CORDHYPE - Ver categorias</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>

<style>

    h1 {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }

    #container {
        display: flex;
        justify-content: center;
    }

    a {
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        color: black;
    }

    a.link  {
    position: absolute;
    margin-top: 10px;
    margin-left: 15px;
    text-align: center;
    
    }

    a.dois {
        position: absolute;
        margin-top: 35px;
    }

    a:hover {
        text-decoration: underline;
    }

</style>
<body>
<?php

require "../conexao.php";

    $select = "SELECT * FROM categoria";
    $resultado = mysqli_query($conexao, $select);
    ?>
    <h1>TODAS CATEGORIAS</h1>
    <div id="container">
        
        <div>
            <table border='1'>
                <tr>
                    <td>Nome</td>
                    <td>Opção</td>
                </tr>
    
    <?php while($codigo = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?=$codigo["Nome"]?></h3></td>
                <td><a href="deletar-categoria.php?id_categoria=<?=$codigo['idCategoria']?>">Deletar</a> |
                <a href="atualizar-categoria.php?id_categoria=<?=$codigo['idCategoria']?>">Atualizar</a></td>
            </tr>
<?php endwhile; ?>
            </table>
            <a class="link" href='cadastrar-categoria.php'>Voltar para o formulário</a>
            <a class="link dois" href='../dashboard.php'>Voltar para o dashboard</a>
        </div>
    </div>
   <br> 
</body>
</html>
