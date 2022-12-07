<?php

session_start();

if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}

//verificar se está logado
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 
    
    require "../conexao.php";
    
    $nome = $_POST["nome"];
    $id = $_POST["id"];
    $update = "UPDATE fornecedor SET Nome='$nome' WHERE idFornecedor = $id";

    $resultado = mysqli_query($conexao, $update);
    if($resultado) {
        header("Location: ver-todos-fornecedor.php");
    }  else {
        echo "Conexão falhou";
   }

?>