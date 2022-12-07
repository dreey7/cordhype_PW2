<?php
session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? False;

if(!isset($_SESSION['email'])) {
    header("Location: login-usuario.php");
    die();
}

require "../conexao.php";

$email = $_SESSION['email'];
$select = "SELECT * FROM usuario WHERE email = '$email'";

$resultado = mysqli_query($conexao, $select);
$codigo = mysqli_fetch_assoc($resultado);
$id = $codigo['IdUsuario'];
$_SESSION['id'] = $id;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Seu perfil</title>
    <link rel="stylesheet" href="/cordhype/estilos/usuario.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
<body>
    <header>
        <div id="cabecalho">
        <a href="../index.php"><img src="../img/logo.png" alt="logo"></a>
            <div id="pesquisa">
                <form method="POST" action="ver-pesquisa.php">
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
                       echo "<a href='usuario/cadastrar-usuario.html'>Cadastrar</a>";
                       echo "<a href='usuario/login-usuario.php'>Login</a>";
                    } else {
                        ?><a href='carrinho.php'>Carrinho</a>
                        <a href='ver-usuario.php'>Meu perfil</a><?php
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
    </header><?php
    if($codigo['Imagem'] == "../img/img-upload/") {
        ?><img id="img" src="../img/usuario-padrao.png" alt=""><?php
    }
    else {
        ?><img id="img" src="<?=$codigo['Imagem']?>" alt=""><?php
    }
    ?>
    <div id="infos1">
       <h1 id="nome1"><?=$codigo["Nome"]?></h1>
       <h1 id="email1"><?=$codigo["email"]?></h1> 
    </div>
    <div id="botoes">
    <a class="botao editar" href="atualizar-usuario.php?id_usuario=<?=$codigo['IdUsuario']?>">EDITAR</a>
    <a class="botao sair" href='deslogar.php'>SAIR</a>
    <?php
    if($codigo["email"] == 'adm@gmail.com') {
        ?><a class="botao dash" href="../dashboard.php">DASHBOARD</a><?php
    } ?>
    </div>
<hr>
        <h1 id="titulo1">DADOS PESSOAIS</h1>
        <div id="infos2">
            <p><strong>Nome: </strong><?=$codigo['Nome']?></p>
            <p><strong>Data de nascimento: </strong> <?=$codigo['DtNasc']?></p>
            <p><strong>CPF: </strong><?=$codigo['CPF']?></p>
            <p><strong>RG: </strong><?=$codigo['RG']?></p>
            <p><strong>CPF: </strong><?=$codigo['CPF']?></p>
            <p><strong>Telefone: </strong><?=$codigo['telefone']?></p>
            <p><strong>Email: </strong><?=$codigo['email']?></p>
            <p><strong>Endereço: </strong><?=$codigo['Endereco']?></p>
            <p><strong>Gênero: </strong><?=$codigo['genero']?></p>
        </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
 <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
