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

    $insert = "INSERT INTO categoria (Nome) VALUES ('$nome')";

    $resultado = mysqli_query($conexao, $insert);
    if($resultado) {
        header('location:ver-todos-categoria.php');
    }  else {
        echo "Conexão falhou";
   }

?>