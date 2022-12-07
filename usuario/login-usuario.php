
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cordhype/estilos/style-login.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <title>CORDHYPE - Realizar login</title>
</head>
<body>
    <a href="../index.php"><ion-icon id="seta-voltar" name="arrow-back-circle-outline"></ion-icon></a>
    
    <img id="img-logo" src="../img/logo.png" alt="logo do site">
    <h1>FAÇA SEU LOGIN</h1>
    <div id="formulario">
    <form action="verificar-usuario.php" method="post">
        <label for="email">Email</label> <br>
        <input type="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>  <br>
        <input type="password" id="senha" name="senha" required> 
        <span class="ver"><ion-icon name="eye-outline"></ion-icon></span> 
        <br> 
        <button>LOGIN</button>
    </form>
    </div>
    <footer>
        <h4>TODOS OS DIREITOS RESERVADOS | CordHype © 2022</h4>
    </footer>
</body>
</html>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
<script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
<script>
    let btn = document.querySelector('.ver');
    btn.addEventListener('click', function() {
    let input = document.querySelector('#senha');
    if(input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
    } else {
        input.setAttribute('type', 'password');
    }
})
</script>