<?php

$conexao = mysqli_connect("localhost", "root", "", "cordhype");
    if (!$conexao) {
        echo "A conexão falhou" . mysqli_connect_error();
    }

?>