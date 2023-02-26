<?php
    include("conexao.php");

    session_start();

    if (!isset($_SESSION['nomeadm']) && !isset($_SESSION['senhaadm'])){
        $_SESSION['loginErro'] = 'Login inválido!';
        header("location: index.php");
    }


    if (isset($_POST['idLivro']) && isset($_POST['nomeLivro']) && isset($_POST['autorLivro'])){

        $idLivro = $_POST['idLivro'];
        $nomeLivro = $_POST['nomeLivro'];
        $autorLivro = $_POST['autorLivro'];
        $genero1 = $_POST['genero1'];
        $genero2 = $_POST['genero2'];
        $genero3 = $_POST['genero3'];

        if($genero1 == ''){
            $_SESSION['mensagemStatus'] = 'Todos os campos, exceto os marcados como opcionais, são obrigatórios!';
            header("location: adicionaLivro.php");
        }
        
        $capaLivro = $_FILES['capaLivro'];
        $nomeCapa = $capaLivro['name'];
        $tipoCapa = $capaLivro['type'];
        $extensaoCapa = pathinfo($nomeCapa, PATHINFO_EXTENSION);
        $nomeTempCapa = $capaLivro['tmp_name'];
        $tamanhoCapa = $capaLivro['size'];
        $errosImg = array();
        $tamanhoMaximo = 1024 * 1024 * 3;

        if ($nomeCapa == ''){
            $_SESSION['mensagemStatus'] = 'Todos os campos, exceto os marcados como opcionais, são obrigatórios!';
            header("location: adicionaLivro.php");
        }

        if ($tamanhoMaximo < $tamanhoCapa){
            $errosImg[] = 'Tamanho do arquivo excede o tamanho máximo, máximo: 3MB <br>';
        }

        if ($extensaoCapa != 'png' || $tipoCapa != 'image/png'){
            $errosImg[] = 'Permitido somente imagens do tipo PNG <br>';
        }

        if (!empty($errosImg)){
            $_SESSION['errosImg'] = $errosImg;
            header("location: adicionaLivro.php");
        }

        $verificaLivro = "SELECT * FROM livros WHERE id_livro = '$idLivro' or nome = '$nomeLivro'";
        $requisicaoVerifica = mysqli_query($conn, $verificaLivro);
        $livrosAchados = mysqli_fetch_assoc($requisicaoVerifica);

        if (!isset($livrosAchados)){
            $caminhoSalvarImg = "../usuario/assets/";
            move_uploaded_file($nomeTempCapa, $caminhoSalvarImg.$nomeLivro.".png");

            $comandoSql1 = "INSERT INTO livros(id_livro, nome, autor, genero1, genero2, genero3) VALUES ('$idLivro', '$nomeLivro', '$autorLivro', '$genero1', '$genero2', '$genero3')";
            mysqli_query($conn, $comandoSql1);

            $_SESSION['mensagemStatus'] = 'Livro cadastrado com sucesso!';
            header("location: adicionaLivro.php");
        }
        else{
            if($livrosAchados['id_livro'] == $idLivro){
                if($livrosAchados['nome'] == $nomeLivro){
                    $_SESSION['mensagemStatus'] = 'Um livro já possui esse Id <br>
                                                    Um livro já possui esse nome';
                    header("location: adicionaLivro.php");
                }
                else{
                    $_SESSION['mensagemStatus'] = 'Um livro já possui esse Id';
                    header("location: adicionaLivro.php");
                }
            }
            else if($livrosAchados['nome'] == $nomeLivro){
                $_SESSION['mensagemStatus'] = 'Um livro já possui esse Nome';
                header("location: adicionaLivro.php");
            }
        }

    }
    else{
        $_SESSION['mensagemStatus'] = 'Todos os campos, exceto os marcados como opcionais, são obrigatórios!';
        header("location: adicionaLivro.php");
    }

    
?>