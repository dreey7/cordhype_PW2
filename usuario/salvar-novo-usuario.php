<?php
require "../conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$dtNasc = $_POST["data"];
$endereco = $_POST["endereco"];
$genero = $_POST["sexo"];
$telefone = $_POST["telefone"];

    
$update = "UPDATE usuario SET Nome = '$nome', email = '$email', CPF = '$cpf', RG = '$rg', DtNasc= '$dtNasc', endereco = '$endereco', genero = '$genero', telefone = '$telefone' WHERE IdUsuario = $id";

$resultado = mysqli_query($conexao, $update);
   
if ($resultado) {
    header("Location: ../index.php");
    die();
} else {
    echo "Deu erro";
}


    ?>