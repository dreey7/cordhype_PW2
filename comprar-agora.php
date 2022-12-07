<?php
session_start();
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 

require "conexao.php";
$id = $_GET["id_produto"];
$select = "SELECT * FROM produto WHERE idProduto = '$id'";
$resultado = mysqli_query($conexao, $select);
$codigo = mysqli_fetch_assoc($resultado);

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
    <link rel="stylesheet" href="/cordhype/estilos/style-finalizar-compra.css">
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
            
    <section>
        <div id="produto">
            <img id="foto-produto" src="CordHype/<?=$codigo["Imagem"]?>" alt="">
            <h1 id="titulo-produto"><?=$codigo["Nome"]?></h1>
            <p class="desc"><?=$codigo["Descricao"]?>
            <strong>Cor: </strong> <?=$codigo["Cor"]?> <br>
            <strong>Tamanho:</strong> <?=$codigo["Tamanho"]?> </p>
            <hr>
        </div>
        <div id="info">
            <p id="preco-produto">R$<?=$codigo["VlrVenda"]?></p>
            <p id="entrega"> Entrega: <?=$codigoE["Endereco"]?> </p>
            <a href="#" id="botao-finalizar">FINALIZAR COMPRA</a>
                <div id="form-produto">
                    <form action="#">
                    <input type="radio" name="opcao" id="boleto"><label for="boleto"> Boleto</label>
                    <input type="radio" name="opcao" id="PIX"><label for="PIX"> PIX</label>
                    <input type="radio" name="opcao" id="Cartao"><label for="Cartao"> Cartão</label></form>
                </div>
                    
        </div>
    </section>

    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
