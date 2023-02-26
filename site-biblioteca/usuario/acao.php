<?php
    include("conexao.php");

    session_start();

    if (!isset($_SESSION['nome']) && !isset($_SESSION['senha'])){
        header("location: index.php");
    }

    $result = "SELECT * FROM livros WHERE genero1 = 'Ação' or genero2 = 'Ação' or genero3 = 'Ação'";
    $query_result = mysqli_query($conn, $result); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ação</title>
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

        main{
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        main h1{
            color: var(--color3);
            margin-top: 30px;
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
        }

        .div_livro img{
            max-width: 250px;
        }

        .div_livro h2{
            margin-top: 5px;
        }

        .div_livro h3{
            margin-top: 5px;
        }

        .div_livro .botao-enviar{
            background-color: var(--color1);
            width: 140px;
            font-size: 15px;
            color: var(--color2);
            text-shadow: 2px 2px 2px var(--color3);
            padding: 10px;
            border-radius: 20px;
            border: none;
            margin: 15px auto;
            cursor: pointer;
        }

        .div_livro .botao-enviar:hover{
            box-shadow: 0px 0px 8px var(--color1);
        }

        .mensagem{
            color: var(--color3);
            margin: 10px auto;
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


    <main>
        <h1>Ação</h1>
        <?php
        
            while ($row_livro = mysqli_fetch_assoc($query_result)) {
                if ($row_livro['aluno_usando'] == ''){
                    $statusLivro = "<form action='reserva.php' method='POST'>
                                    <input type='hidden' name='livro_atual' value='" . $row_livro['nome'] . "'>
                                    <input type='submit' value='Pegar emprestado' class='botao-enviar'>
                                </form>";
                }
                else{
                    $statusLivro = "<p class='mensagem'>Emprestado</p>";
                }
                echo "<div class='div_livro'>
                        <img src='assets/". $row_livro['nome'] .".png'>
                        <h2>" . $row_livro['nome'] . "</h2>
                        <h3>" . $row_livro['autor'] . "</h3>
                        " . $statusLivro . "
                    </div>";
            }
        
        ?>
    </main>

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

