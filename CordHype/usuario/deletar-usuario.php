<?php
    require "../conexao.php";

    $id = $_GET["id_usuario"];

    $delete = "DELETE FROM usuario WHERE IdUsuario = $id";
    $resultado = mysqli_query($conexao, $delete);

    if ($resultado) {
        header("Location: ../dashboard.php");
        die();
    } else {
        echo "Deu erro";
    }
