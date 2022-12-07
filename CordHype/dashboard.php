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
    <title>CORDHYPE - Dashboard </title>
    <link rel="stylesheet" href="/cordhype/estilos/style-dashboard.css">
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
        </div>
        <div>
            <nav class="nav-header">
            <a href="masculino.php">MASCULINO</a>
            <a href="feminino.php">FEMININO</a>
            <a href="infantil.php">INFANTIL</a>
        </nav>
        </div>
    </header>
    <h1 id="titulo-dash">OPÇÕES: </h1>
        <div id="dash-container">
            <a href="fornecedor/cadastrar-fornecedor.php"><div class="img fornecedor">
                <img src="img/caminhao.png" alt="caminhao fornecedor">
                <h3>Fornecedor</h3>
            </div></a>
            <a href="categoria/cadastrar-categoria.php"><div class="img categoria">
                <img src="img/etiqueta.png" alt="etiqueta categoria">
                <h3>Categoria</h3>
            </div></a>
            <a href="produto/cadastrar-produto.php"><div class="img produto">
                <img src="img/camiseta.png" alt="camiseta produto">
                <h3>Produto</h3>
            </div></a>
        </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>