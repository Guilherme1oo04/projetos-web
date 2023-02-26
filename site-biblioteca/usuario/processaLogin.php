<?php
    include("conexao.php");

    session_start();

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        if (isset($nome) && isset($senha)){
            $loginUsuario = "SELECT * FROM cadastro WHERE nome = '$nome' and senha = '$senha'";
            $requisicao = mysqli_query($conn, $loginUsuario);
            $usuario = mysqli_fetch_assoc($requisicao);

            if (isset($usuario)){
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['senha'] = $usuario['senha'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['livroUsando'] = $usuario['livro_usando'];
                header("location: usuario.php");
            }
            else {
                unset ($_SESSION['nome']);
                unset ($_SESSION['senha']);
                unset ($_SESSION['email']);
                unset ($_SESSION['livroUsando']);
                $_SESSION['loginErro'] = 'Usuário ou senha inválido';
                header("location: index.php");
            }

        }
        else {
            $_SESSION['loginErro'] = 'Usuário ou senha inválido';
            header("location: index.php");
        }

?>