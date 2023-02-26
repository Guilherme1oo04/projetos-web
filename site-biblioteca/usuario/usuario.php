<?php 
    include("conexao.php");

    session_start();

    if (!isset($_SESSION['nome']) && !isset($_SESSION['senha'])){
        header("location: index.php");
    }

    $nome = $_SESSION['nome'];
    $senha = $_SESSION['senha'];

    $loginUsuario = "SELECT * FROM cadastro WHERE nome = '$nome' and senha = '$senha'";
    $requisicao = mysqli_query($conn, $loginUsuario);
    $usuario = mysqli_fetch_assoc($requisicao);
    $_SESSION['livroUsando'] = $usuario['livro_usando'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');

       :root{
           --color1: #00ffa2;
           --color2: #1d2a2d;
           --color3: #f4f4f4;

           --font1: 'Nunito Sans', sans-serif;
       }

       *{
           margin: 0;
           padding: 0;
       }

       body{
            background-color: var(--color2);
            min-height: 100vh;
            font-family: var(--font1);
        }

        ::-webkit-scrollbar{
            background-color: var(--color2);
            width: 10px;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb{
            background-color: var(--color3);
            border-radius: 10px;
        }

        header nav{
            background-color: var(--color2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            box-shadow: 0px 0px 10px var(--color1);
        }
        
        header nav .links{
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 60vw;
        }

        header nav .icon{
            max-width: 100px;
        }

        header nav a{
            color: var(--color3);
            text-decoration: none;
            font-size: 22px;
            font-weight: 900;
            transition: 1s;
            border-bottom: 3px solid var(--color2);
            cursor: pointer;
        }

        header nav a:hover{
            border-bottom: 3px solid var(--color3);
        }

        header nav .generos p{
            color: var(--color3);
            font-size: 22px;
            font-weight: 900;
            transition: 1s;
            border-bottom: 3px solid var(--color2);
            cursor: pointer;
            width: 90px;
            text-align: center;
        }

        header nav .generos .links-generos{
            position: fixed;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            height: 200px;
            background-color: var(--color2);
            width: 120px;
            padding: 10px;
            margin-top: 35px;
            border-radius: 10px;
            margin-left: -20px;
            box-shadow: 0px 0px 10px var(--color1);
            transition: 1s;
        }

        #none{
            display: none;
        }

        header nav .generos p:hover{
            border-bottom: 3px solid var(--color3);
        }

        h1{
            color: var(--color3);
            margin-top: 40px;
            text-align: center;
            text-shadow: 1px 1px 2px var(--color1);
        }

        h2{
            color: var(--color3);
            margin-top: 40px;
            text-align: center;
            text-shadow: 1px 1px 2px var(--color1);
        }

        .div_livro{
            max-width: 280px;
            text-align: center;
            padding: 10px;
            box-shadow: 0px 0px 10px black;
            color: white;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        .div_livro img{
            max-width: 250px;
        }

        .div_livro h2{
            margin-top: 5px;
            text-shadow: none;
            color: var(--color3);
        }

        .div_livro h3{
            margin-top: 5px;
        }
   </style>
</head>
<body>
    <header>
        <nav>
            <img src="assets/icon-biblioteca.png" class="icon">
            <section class="links">
                <a href="usuario.php">Início</a>
                <section class="generos">
                    <p onclick="mostraLinks()">Gêneros</p>
                    <section class="links-generos" id="none">
                        <section><a href="acao.php">Ação</a></section>
                        <section><a href="romance.php">Romance</a></section>
                        <section><a href="terror.php">Terror</a></section>
                    </section>
                </section>
                <a href="sair.php">Sair</a>
            </section>
        </nav>
    </header>

    <h1>Bem vindo <?php echo $_SESSION['nome'];?> </h1>

    <?php
        if ($_SESSION['livroUsando'] == ''){
            echo "<h2>Você não está com nenhum livro no momento, dê uma olhada nos gêneros disponíveis!</h2>";
        }
        else{
            $nomeLivroAtual = $_SESSION['livroUsando'];
            $livroLendo = "SELECT * FROM livros WHERE nome = '$nomeLivroAtual'";
            $requisicao = mysqli_query($conn, $livroLendo);
            $livroAtual = mysqli_fetch_assoc($requisicao);

            echo "<h2>Este é o livro que você está lendo no momento!</h2>";
            echo "<div class='div_livro'>
                    <img src='assets/". $livroAtual['nome'] .".png'>
                    <h2>" . $livroAtual['nome'] . "</h2>
                    <h3>" . $livroAtual['autor'] . "</h3>
                </div>";
        }
    ?>

    

    <script>
        function mostraLinks(){
            let linksGeneros = document.querySelector('.links-generos');
            
            if (linksGeneros.id == ''){
                linksGeneros.setAttribute('id', 'none');
            }
            else{
                linksGeneros.setAttribute('id', '');
            }
        }
    </script>
</body>
</html>