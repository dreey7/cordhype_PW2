<?php
session_start(); 
if(!isset($_SESSION['email'])) {
    echo "é necessario logar em sua conta!";
    die();
} 
if($_SESSION['email'] !='adm@gmail.com') {
    echo "Você não tem permissão!";
    die();
}
    
    require "../conexao.php";
    
    $nome = $_POST["nome"];
    $id = $_POST["id"];

    $update = "UPDATE categoria SET Nome='$nome' WHERE idCategoria = $id";

    $resultado = mysqli_query($conexao, $update);
    if($resultado) {
        header('location:ver-todos-categoria.php');
    }  else {
        echo "Conexão falhou";
   }

?>