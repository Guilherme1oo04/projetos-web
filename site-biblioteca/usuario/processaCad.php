<?php
    include("conexao.php");

    session_start();

    $nomeCad = $_POST['nome'];
    $emailCad = $_POST['email'];
    $senhaCad = $_POST['senha'];

    if (isset($nomeCad) && isset($senhaCad) && isset($emailCad)){
        $verificaUsuario = "SELECT * FROM cadastro WHERE nome = '$nomeCad' or email = '$emailCad'";
        $requisicao = mysqli_query($conn, $verificaUsuario);
        $usuarios = mysqli_fetch_assoc($requisicao);

        if (!isset($usuarios)){
            $comandoSql = "INSERT INTO cadastro(nome, email, senha) VALUES ('$nomeCad', '$emailCad', '$senhaCad')";
            mysqli_query($conn, $comandoSql);
            $_SESSION['cadastroErro'] = 'Usuário cadastrado com sucesso!';
            header("location: cadastrar.php");
        }
        else{
            if ($usuarios['nome'] == $nomeCad){
                if ($usuarios['email'] == $emailCad){
                    $_SESSION['cadastroErro'] = 'Este Nome e E-mail já estão sendo usados, digite outros!';
                    header("location: cadastrar.php");
                }
                else {
                    $_SESSION['cadastroErro'] = 'Este Nome já está sendo usado, digite outro!';
                    header("location: cadastrar.php");
                }
            }
            else if ($usuarios['email'] == $emailCad){
                $_SESSION['cadastroErro'] = 'Este E-mail já está sendo usado, digite outro!';
                header("location: cadastrar.php");
            }
        }
    }
    else {
        $_SESSION['cadastroErro'] = 'Preencha todos os campos para poder se cadastrar!';
        header("location: cadastrar.php");
    }
?>