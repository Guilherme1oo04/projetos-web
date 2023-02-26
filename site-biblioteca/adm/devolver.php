<?php
    include("conexao.php");

    session_start();

    $aluno = $_POST['aluno_atual'];

    if (!isset($aluno)){
        header("location: adm.php");
    }

    $comando1 = "UPDATE cadastro SET livro_usando = '' WHERE nome = '$aluno'";
    mysqli_query($conn, $comando1);

    $comando2 = "UPDATE livros SET aluno_usando = '' WHERE aluno_usando = '$aluno'";
    mysqli_query($conn, $comando2);

    header("location: adm.php");
?>