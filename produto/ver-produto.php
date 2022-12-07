<?php
session_start();
if(!isset($_SESSION['email'])) {
    $_SESSION['email'] = null;
}
require "../conexao.php";
$id = $_GET["id_produto"];
$select = "SELECT * FROM produto WHERE idProduto = '$id'";
$resultado = mysqli_query($conexao, $select);
$codigo = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - <?=$codigo["Nome"];?></title> 
    <link rel="stylesheet" href="/cordhype/estilos/style-produto.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
<header>
        <div id="cabecalho">
        <a href="../index.php"><img src="../img/logo.png" alt="logo"></a>
        <div id="pesquisa">
                <form method="POST" action="../ver-pesquisa.php">
                    <input type="text" id="barra-p" name="pesquisar" placeholder="Pesquisar">
                    <button><ion-icon name="search-outline"></ion-icon></button>
                </form>
            </div>
            <div id="lo-ca">
                <?php 
                require "../conexao.php";
                 $selectU = "SELECT * FROM usuario";
                 $resultadoU = mysqli_query($conexao, $selectU);
                 $codigoU = mysqli_fetch_assoc ($resultadoU);
                 if(!isset($_SESSION['email'])) {
                    echo "<a href='../usuario/cadastrar-usuario.html'>Cadastrar</a>";
                    echo "<a href='../usuario/login-usuario.php'>Login</a>";
                 } else {
                     ?><a href='../carrinho.php'>Carrinho</a>
                     <a href='../usuario/ver-usuario.php'>Meu perfil</a><?php
                 }
             ?>
            </div>
        </div>
        <div>
        <nav class="nav-header">
            <a href="../masculino.php">MASCULINO</a>
            <a href="../feminino.php">FEMININO</a>
            <a href="../infantil.php">INFANTIL</a>
        </nav>
        </div>
    </header>
        <div id="descricao-produto">
            <img id="foto-produto" src="<?=$codigo["Imagem"]?>" alt="">
            <h1 id="titulo-produto"><?=$codigo["Nome"]?></h1>
                <p id="desc-produto">
                    <?=$codigo["Descricao"]?><br>
                    <strong>CATEGORIA: </strong><?=$codigo["categoria"]?><br>
                    <strong>TAMANHO: </strong>
                    <?=$codigo["Tamanho"]?><br>
                    <strong>COR: </strong><?=$codigo["Cor"]?>
                </p>
                <p id="preco-produto">R$<?=$codigo["VlrVenda"]?></p>
                    <div id="botoes">
                        <a href="../comprar-agora.php?id_produto=<?=$codigo["idProduto"]?>"><button id="mandar-carrinho">COMPRAR AGORA</button></a>
                        <a href="../carrinho.php?acao=add&id_produto=<?=$codigo["idProduto"]?>"><button id="comprar-agr">ADICIONAR NO CARRINHO</button></a>
                        <p id="fornecedor-p">Produto fornecido por <strong><?=$codigo["Fornecedor"]?></strong></p>
                        <img src="../img/bandeira-de-cartão.png" alt="">
                    </div>
                    <h1 id="titulo-mais">MAIS IMAGENS:</h1>
                    <div id="mais-imagem">      
                        <?php
                            $selectImg = "SELECT produto.Nome, produto.VlrVenda, produto.idProduto, imagem.caminho, imagem.idImagem FROM produto inner join imagem on imagem.idProduto = produto.idProduto where produto.idProduto = $id";
                            $resultadoImg = mysqli_query($conexao, $selectImg);
                                while($codigo_img = mysqli_fetch_assoc($resultadoImg)): ?>
                                    <div id="img-p2">
                                        <img src="<?=$codigo_img["caminho"]?>" alt="">
                                    </div>
                                <?php endwhile; 
                        ?>
                </div> 
            </div>
        </div>
<?php
    if($_SESSION['email'] == 'adm@gmail.com') {
        ?>
        <div id="opcao-dash">
            <a class="dash-o adicionar"  href="adicionar-mais-imagem.php?id_produto=<?=$codigo["idProduto"]?>">Adicionar imagem</a>
            <a class="dash-o atualizar"  href="atualizar-produto.php?id_produto=<?=$codigo['idProduto']?>">Atualizar item</a>
            <a class="dash-o deletar" href="deletar-produto.php?id_produto=<?=$codigo['idProduto']?>">Deletar item</a>
            </div>
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
