<?php
session_start();


//verificar se está logado
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Cadastrar fornecedor</title>
    <link rel="stylesheet" href="/CordHype/estilos/style-cadastrarFornecedor.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>
    <a href="../dashboard.php"><ion-icon id="seta-voltar" name="arrow-back-circle-outline"></ion-icon></a>
    <div id="container">
        <div id="formulario">
            <h1>Cadastrar Fornecedor</h1>
            <form action="salvar-fornecedor.php" method="post">
                <label for="nome">Fornecedor:</label>
                <br>
                <input type="text" name="nome">
                <br>
                <button>CADASTRAR</button> 
            </form>
        </div>
        <div id="link">
            <img src="../img/caminhao.png" alt="">
            <br>
            <a href="ver-todos-fornecedor.php">Ver todos fornecedores</a>
        </div>
    </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>