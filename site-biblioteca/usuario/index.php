<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            flex-direction: column;
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

        h1{
            color: var(--color3);
            margin: 10px auto;
            text-align: center;
            text-shadow: 1px 1px 2px var(--color1);
        }

        .login{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            width: 300px;
            height: 350px;
            text-align: center;
        }


        .inputs{
            position: relative;
            width: 300px;
            margin: 0 auto;
            display: flex;
        }

        .inputs input{
            border: 2px solid var(--color1);
            outline: none;
            width: 300px;
            height: 40px;
            font-size: 22px;
            background-color: transparent;
            color: white;
            border-radius: 10px;
            margin-bottom: 40px;
            padding: 5px;
            position: relative;
        }
        .inputs input:hover{
            box-shadow: 0px 0px 12px var(--color1);
        }
        .inputs input:focus ~ label, .inputs input:not(:placeholder-shown) ~ label{
            margin-top: -15px;
            margin-left: 10px;
            padding: 2px;
            border-radius: 2px;
            font-size: 15px;
            font-weight: 800;
            background-color: var(--color1);
            color: var(--color2);
        }
        .inputs label{
            position: absolute;
            left: 0;
            top: 0;
            margin-left: 5px;
            margin-top: 10px;
            font-size: 25px;
            color: var(--color1);
            transition: 0.5s;
            pointer-events: none;
        }

        .view{
            height: 50px;
            padding-left: 10px;
            cursor: pointer;
            transition: 0.5s;
        }

        .botao-enviar{
            background-color: var(--color1);
            width: 100px;
            font-size: 20px;
            color: var(--color4);
            text-shadow: 2px 2px 2px var(--color3);
            padding: 10px;
            border-radius: 20px;
            border: none;
            margin: 30px auto;
            cursor: pointer;
        }

        .botao-enviar:hover{
            box-shadow: 0px 0px 8px var(--color1);
        }

        .link{
            color: var(--color1);
        }

        .link a{
            color: var(--color3);
        }

        .mensagem{
            color: var(--color3);
            margin: 10px auto;
        }
    </style>
</head>
<body>
    <h1>Biblioteca MCPF</h1>

    <section class="login">
        <form method="POST" action="processaLogin.php">
            <section class="inputs">
                <input type="text" id="nome" name="nome" maxlength=50 required placeholder=" ">
                <label for="nome">Nome</label>
            </section>

            <section class="inputs">
                <input type="password" id="senha" name="senha" maxlength=50 required placeholder=" ">
                <label for="senha">Senha</label>
                <img src="assets/view.png" class="view" onclick="revela()">
            </section>

            <input type="submit" value="Entrar" class="botao-enviar">

            <p class="mensagem">
                <?php
                    if (isset($_SESSION['loginErro'])){
                        echo $_SESSION['loginErro'];
                        unset ($_SESSION['loginErro']);
                    }
                ?>
            </p>
            <p class="link">Não tem uma conta? <a href="cadastrar.php">Cadastre-se</a></p>
        </form>
    </section>

    <script>

        function revela(){
            let senha = document.querySelector("#senha");
            let imgSenha = document.querySelector(".view");

            let senhaValue = senha.value;

            if (senha.type == "password"){
                senha.setAttribute("type", "text");
                senha.value = senhaValue;
                imgSenha.src = "assets/notview.png";
            } 
            else{
                senha.setAttribute("type", "password");
                senha.value = senhaValue;
                imgSenha.src = "assets/view.png";
            }
        }
    </script>
</body>
</html>