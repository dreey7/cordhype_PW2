<?php
session_start();
require 'conexao.php';

//verificar se está logado
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 

//Pega o email da pessoa que está logada
$email = $_SESSION['email'];
$selectE = "SELECT * FROM usuario WHERE email = '$email'";
$resultadoE = mysqli_query($conexao, $selectE);
$codigoE = mysqli_fetch_assoc($resultadoE);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Finalizar compra </title> 
    <link rel="stylesheet" href="/cordhype/estilos/style-carrinho.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
</head>
<body>
<header>
        <div id="cabecalho">
        <a href="index.php"><img src="img/logo.png" alt="logo"></a>
        <div id="pesquisa">
                <form method="POST" action="ver-pesquisa.php">
                    <input type="text" id="barra-p" name="pesquisar" placeholder="Pesquisar">
                    <button><ion-icon name="search-outline"></ion-icon></button>
                </form>
            </div>
            <div id="lo-ca">
                <?php 
                require "conexao.php";
                 $selectU = "SELECT * FROM usuario";
                 $resultadoU = mysqli_query($conexao, $selectU);
                 $codigoU = mysqli_fetch_assoc ($resultadoU);
                 if(!isset($_SESSION['email'])) {
                    echo "<a href='usuario/cadastrar-usuario.html'>Cadastrar</a>";
                    echo "<a href='usuario/login-usuario.php'>Login</a>";
                 } else {
                     ?><a href='carrinho.php'>Carrinho</a>
                     <a href='usuario/ver-usuario.php'>Meu perfil</a><?php
                 }
             ?>
            </div>
        </div>
        <div>
        <nav class="nav-header">
            <a href="masculino.php">MASCULINO</a>
            <a href="feminino.php">FEMININO</a>
            <a href="infantil.php">INFANTIL</a>
        </nav>
        </div>
    </header>
    <?php

//Iniciar valor
$totalValor = 0;

//Iniciar carrinho
if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

if(isset($_GET['acao'])) {
    //Adicionar item
    if ($_GET['acao'] == 'add') {
    $id = intval($_GET['id_produto']);
        if(!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
            header("Location: carrinho.php");
        } else {
            $_SESSION['carrinho'][$id] += 1;
            header("Location: carrinho.php");
        }
    }

    //Remover item
    if($_GET['acao'] == 'del') {
        $id = intval($_GET['id_produto']);
        if(isset($_SESSION['carrinho'][$id])){
            unset($_SESSION['carrinho'][$id]);
            $totalValor = $totalValor - ($qtd * $preco);
            header("Location: carrinho.php");
        }
    }

}

if(count($_SESSION['carrinho']) == 0 ) {        //Caso esteja vazio
    echo "<h1 id='vazio'>Carrinho vazio :(</h1>";
    ?>

    <style> 
        #vazio {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 40px;
        }

        footer {
        background-color: rgb(0, 0, 0);
        width: 100%;
        height: 50px;
        position: relative;
        top: 386px;
        bottom: 0;
        } 
    </style>
<?php
} else {                                        //Caso esteja com item
    foreach($_SESSION['carrinho'] as $id => $qtd) {
        $select = "SELECT * FROM produto WHERE idProduto = '$id'";
        $resultado = mysqli_query($conexao, $select);
        while($codigo = mysqli_fetch_assoc($resultado)):

        $imagem = $codigo['Imagem'];
        $endereco = $codigoE['Endereco'];
        $tamanho = $codigo['Tamanho'];
        $cor = $codigo['Cor'];
        $desc = $codigo['Descricao'];
        $nome = $codigo['Nome'];
        $preco = $codigo['VlrVenda'];
        $totalValor = $totalValor + ($qtd * $preco);
        ?>
<!--SECTION DOS ITEMS!--->
<section>
        <div id="produto">
            <img id="foto-produto" src="CordHype/<?=$imagem?>" alt="">
            <h1 id="titulo-produto"><?=$nome?></h1>
            <p class="desc"> <?=$desc?> </p>
            <p class="desc2"> <strong>Cor: </strong> <?=$cor?> </p>
            <p class="desc3 "> <strong>Tamanho:</strong> <?=$tamanho?> </p>
            <p id="preco-produto">R$<?=$preco?> </p>
            <p id="qnt-produto"> <?=$qtd?> </p><?php
            echo '<a id="remover" href="?acao=del&id_produto='.$id.'">Remover</a><br>';?>
            <hr>
<?php endwhile;
            }
        }
if(!count($_SESSION['carrinho']) == 0 ) {        //Caso esteja vazio
        ?> </div>
        <div id="info">
            <p id="total-preco">R$<?=$totalValor?></p>
            <p id="entrega"> Entrega: <?=$endereco?> </p>
            <a href="#" id="botao-finalizar">FINALIZAR COMPRA</a>
                <div id="form-produto">
                    <form action="#">
                    <input type="radio" name="opcao" id="boleto"><label for="boleto"> Boleto</label>
                    <input type="radio" name="opcao" id="PIX"><label for="PIX"> PIX</label>
                    <input type="radio" name="opcao" id="Cartao"><label for="Cartao"> Cartão</label></form>
                </div>      
        </div>
    </section>
    <?php
    }
    if(count($_SESSION['carrinho']) == 1 ) {  
    ?>
    <style>
            footer {
            background-color: black;
            width: 100%;
            height: 50px;
            position: relative;
            top:257px;
            bottom: 0;
            }
    </style>
    <?php
    }
    ?>
       
  <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>

    