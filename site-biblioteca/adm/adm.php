<?php
    include("conexao.php");

    session_start();

    if (!isset($_SESSION['nomeadm']) && !isset($_SESSION['senhaadm'])){
        $_SESSION['loginErro'] = 'Login inválido!';
        header("location: index.php");
    }

    $comandoSql = "SELECT * FROM cadastro WHERE livro_usando != ''";
    $requisicao = mysqli_query($conn, $comandoSql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
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
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            background-color: var(--color2);
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

        table{
            border: 1px solid var(--color3);
            border-collapse: collapse;
            text-align: center;
            margin: auto;
        }

        table td{
            padding: 10px;
            border: 1px solid var(--color3);
            width: 200px;
            text-align: center;
            font-size: 18px;
            color: var(--color3);
        }

        h1{
            color: var(--color3);
            margin: 10px auto;
            text-align: center;
            text-shadow: 1px 1px 2px var(--color1);
        }

        .link{
            margin: 30px auto;
            text-align: center;
        }

        .link a {
            text-decoration: none;
            background-color: var(--color1);
            color: black;
            font-size: 20px;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            margin: 0 20px;
        }

        .link a:hover{
            box-shadow: 0px 0px 8px var(--color1);
        }

        .botao-devolver{
            text-decoration: none;
            background-color: var(--color1);
            color: black;
            font-size: 16px;
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
        }

        .botao-devolver:hover{
            box-shadow: 0px 0px 8px var(--color1);
        }

    </style>
</head>
<body>
    <p class="link">
        <a href="sair.php">Sair</a>
        <a href="adicionaLivro.php">Adicionar livro</a>
    </p>
    <h1>Relação dos alunos que pegaram livros</h1>
    <table>
        <tr>
            <td><strong>Nome</strong></td>
            <td><strong>E-mail</strong></td>
            <td><strong>Livro emprestado</strong></td>
            <td></td>
        </tr>


        <?php
            while ($row_aluno = mysqli_fetch_assoc($requisicao)){
                echo "<tr>
                        <td>" . $row_aluno['nome'] . "</td>
                        <td>" . $row_aluno['email'] . "</td>
                        <td>" . $row_aluno['livro_usando'] . "</td>
                        <td>
                            <form action='devolver.php' method='POST'>
                                <input type='hidden' name='aluno_atual' value = '" . $row_aluno['nome'] . "'>
                                <input type='submit' value='Devolveu' class='botao-devolver'>
                            </form>
                        </td>
                    </tr>";
            }
        ?>

    </table>
</body>
</html>