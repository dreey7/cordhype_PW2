<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDHYPE - Atualizar usuario</title>
    <link rel="stylesheet" href="/Cordhype/estilos/style-atualizarUsuario.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>
<body>

    <?php
    require "../conexao.php";
    $id = $_GET["id_usuario"];
        $select_u = "SELECT * FROM usuario where  IdUsuario = $id";
        $resultado_u = mysqli_query($conexao, $select_u);
        $codigo_u = mysqli_fetch_assoc($resultado_u)
    ?>

<a href="ver-usuario.php"><ion-icon id="seta-voltar" name="arrow-back-circle-outline"></ion-icon></a>
<img id="img-logo" src="/Cordhype/img/logo.png" alt="logo do site">
<h1>ATUALIZE SEU CADASTRO</h1>

<div id="formulario">
    <form action="salvar-novo-usuario.php" method="post">

        <input type="hidden" name="id" value="<?=$codigo_u["IdUsuario"]?>">

        <label for="nome">Nome:</label> <br>
        <input type="text" name="nome" value="<?=$codigo_u["Nome"]?>">
        <br>
        <label for="email">Email:</label> <br> 
        <input type="email" name="email" value="<?=$codigo_u["email"]?>">
        <br>
        <label for="cpf">CPF:</label> <br>
        <input type="text" name="cpf" value="<?=$codigo_u["CPF"]?>">
        <br>
        <label for="rg">Rg:</label> <br>
        <input type="text" name="rg" value="<?=$codigo_u["RG"]?>">
        <br>
        <label for="telefone">Telefone:</label> <br>
        <input type="text" name="telefone" value="<?=$codigo_u["telefone"]?>">
        <br>
        <label for="data">Data de Nascimento:</label> <br>
        <input type="date" name="data" value="<?=$codigo_u["DtNasc"]?>">
        <br>
        <label for="endereco">Endereço:</label> <br>
        <input type="text" name="endereco" value="<?=$codigo_u["Endereco"]?>">
        <br>
        <label for="sexo">Sexo:</label> <br>
        <select name="sexo">
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
            <option value="Outro">Outro</option>
        </select>
        <br>       
        <button>Cadastrar</button>
    </form>
    </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</body>
</html>
<script>
    let btn = document.querySelector('.ver');
    btn.addEventListener('click', function() {
    let input = document.querySelector('#senha');
    if(input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
    } else {
        input.setAttribute('type', 'password');
    }
});
</script>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>