<?php
session_start(); 
$_SESSION['logado'] = False;
require "../conexao.php";

$email = $_POST["email"];
$senha = $_POST["senha"];



$select = "SELECT * FROM usuario where email = '$email' && senha = '$senha'";
$resultado = mysqli_query($conexao, $select);
$codigo = mysqli_fetch_assoc($resultado);

if($email == $codigo["email"] && $senha == $codigo["senha"]) {
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
    header("location:ver-usuario.php");
} else {
    header("location:login-usuario.php");
}