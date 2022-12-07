<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Feminino </title>
    <link rel="stylesheet" href="/cordhype/estilos/style-masculino.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    
</head>
<body>
    <header>
        <div id="cabecalho">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
            <div id="pesquisar">
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
 
    <!-------------------------------- PHP = Aparecer produto ------------------------------------->
    <div class="p-flex">
      <?php
        require "conexao.php";
            $select = "SELECT * FROM produto where categoria = 'feminino'";
            $resultado = mysqli_query($conexao, $select);
                    while($codigo = mysqli_fetch_assoc ($resultado)): ?>
                        <div>
                            <img id="img-p" src="CordHype/<?=$codigo["Imagem"]?>" alt="">
                            <h3 id="nome-p"><?=$codigo["Nome"]?></h3>
                            <h3 id="preco-p">R$<?=$codigo["VlrVenda"]?></h3>
                            <a id="link-p" href="produto/ver-produto.php?id_produto=<?=$codigo['idProduto']?>"><button id="botao-p">COMPRAR</button></a>
                        </div>  
        <?php endwhile; 
        ?> 
    </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
