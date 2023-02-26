<?php
    include("conexao.php");

    session_start();

    if (!isset($_SESSION['nome']) && !isset($_SESSION['senha'])){
        header("location: index.php");
    }

    $nomeLivro = $_POST['livro_atual'];
    $pessoaPegar = $_SESSION['nome'];

    $comando1 = "SELECT * FROM cadastro WHERE nome = '$pessoaPegar'";
    $requisicao = mysqli_query($conn, $comando1);
    $pessoa = mysqli_fetch_assoc($requisicao);


    if ($pessoa['livro_usando'] != ''){
        header("location: usuario.php");
    }
    else{
        $comando2 = "UPDATE cadastro SET livro_usando = '$nomeLivro' WHERE nome = '$pessoaPegar'";
        mysqli_query($conn, $comando2);

        $comando3 = "UPDATE livros SET aluno_usando = '$pessoaPegar' WHERE nome = '$nomeLivro'";
        mysqli_query($conn, $comando3);
        $_SESSION['livroUsando'] = $nomeLivro;
        header("location: usuario.php");
    }
?>