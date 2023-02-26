<?php
    session_start();

    if (!isset($_SESSION['nomeadm']) && !isset($_SESSION['senhaadm'])){
        $_SESSION['loginErro'] = 'Login inválido!';
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
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
            margin: 20px auto;
            text-align: center;
            text-shadow: 1px 1px 2px var(--color1);
        }

        .form-adiciona{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            margin-top: 50px;
            width: 300px;
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

        .botao-enviar{
            background-color: var(--color1);
            width: 100px;
            font-size: 20px;
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

        #id_livro::-webkit-inner-spin-button{
            -webkit-appearance: none;
        }

        .input-capa input[type="file"]{
            display: none;
        }

        .input-capa label{
            background-color: var(--color1);
            width: 100px;
            font-size: 20px;
            text-shadow: 2px 2px 2px var(--color3);
            padding: 8px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
        }

        .input-capa label:hover{
            box-shadow: 0px 0px 8px var(--color1);
        }

        .input-capa #preview-file{
            margin-top: 20px;
            max-width: 250px;
            box-shadow: 0px 0px 10px black;
        }

        .select-gen{
            margin-top: 30px;
        }

        .select-gen input{
            height: 40px;
            width: 400px;
            padding: 0px 5px;
            border-radius: 5px;
            outline: none;
            border: 2px solid var(--color1);
            background-color: var(--color2);
            color: var(--color3);
            font-size: 18px;
        }

        .select-gen input:hover{
            box-shadow: 0px 0px 8px var(--color1);
        }

        .select-gen ::-webkit-input-placeholder{
            color: var(--color1);
            font-size: 18px;
        }

        .select-gen input::-moz-placeholder{
            color: var(--color1);
            font-size: 18px;
        }

        .select-gen .dropDown{
            height: 100px;
            width: 400px;
            margin: auto;
            margin-top: 20px;
            background-color: var(--color2);
            box-shadow: 0px 0px 10px black;
            border-radius: 10px;
            color: white;
            display: none;
            overflow-y: auto;
            position: absolute;
        }

        .select-gen .listDropDown .item{
            font-size: 20px;
            padding: 10px;
            transition: 0.5s;
            cursor: pointer;
            height: 30px;
        }

        .select-gen .listDropDown .item:hover{
            background-color: #213033;
            color: var(--color1);
            padding-left: 15px;
        }

        .mensagem{
            color: var(--color3);
            font-size: 20px;
        }

    </style>
</head>
<body>

    <h1>Adicionar um livro ao acervo</h1>

    <p class="mensagem">
        <?php
            if (isset($_SESSION['mensagemStatus'])){
                echo $_SESSION['mensagemStatus'];
                unset($_SESSION['mensagemStatus']);
            }
            else if (isset($_SESSION['errosImg'])){
                foreach($_SESSION['errosImg'] as $erro){
                    echo $erro;
                    unset($_SESSION['errosImg']);
                }
            }
        ?>
    </p>

    <section class="form-adiciona">

        <form action="processaAddLivro.php" method="POST" enctype="multipart/form-data">

            <section class="inputs">
                <input type="number" name="idLivro" id="id_livro" required onkeypress="idMax()" onpaste="return false" ondrop="return false" placeholder=" " oninput="validity.valid||(value='');">
                <label for="id_livro">Id</label>
            </section>

            <section class="inputs">
                <input type="text" name="nomeLivro" id="nome_livro" required maxlentgh=100 placeholder=" ">
                <label for="nome_livro">Nome</label>
            </section>

            <section class="inputs">
                <input type="text" name="autorLivro" id="autor_livro" required maxlentgh=50 placeholder=" ">
                <label for="autor_livro">Autor</label>
            </section>

            <section class="input-capa">
                <input type="file" name="capaLivro" id="capa_livro" onchange="previewImage()">
                <label for="capa_livro">Escolher capa do livro</label>
                <img src="" id="preview-file">
            </section>

            <section class="select-gen">
                <input type="text" name="genero1" id="genero1" readonly placeholder="Selecione o gênero" onfocus="mostrarOpcoes(0)" onblur="tirarOpcoes(0)">

                <section class="dropDown">
                    <section class="listDropDown">
                        <section class="item" id="gen1-opc1" onmousedown="selecionaItem(1, 1)">Ação</section>
                        <section class="item" id="gen1-opc2" onmousedown="selecionaItem(1, 2)">Romance</section>
                        <section class="item" id="gen1-opc3" onmousedown="selecionaItem(1, 3)">Terror</section>
                    </section>
                </section>
            </section>

            <section class="select-gen">
                <input type="text" name="genero2" id="genero2" readonly placeholder="Segundo gênero (opcional)" onfocus="mostrarOpcoes(1)" onblur="tirarOpcoes(1)">

                <section class="dropDown">
                    <section class="listDropDown">
                        <section class="item" id="gen2-opc1" onmousedown="selecionaItem(2, 1)">Ação</section>
                        <section class="item" id="gen2-opc2" onmousedown="selecionaItem(2, 2)">Romance</section>
                        <section class="item" id="gen2-opc3" onmousedown="selecionaItem(2, 3)">Terror</section>
                    </section>
                </section>
            </section>

            <section class="select-gen">
                <input type="text" name="genero3" id="genero3" readonly placeholder="Terceiro gênero (opcional)" onfocus="mostrarOpcoes(2)" onblur="tirarOpcoes(2)">

                <section class="dropDown">
                    <section class="listDropDown">
                        <section class="item" id="gen3-opc1" onmousedown="selecionaItem(3, 1)">Ação</section>
                        <section class="item" id="gen3-opc2" onmousedown="selecionaItem(3, 2)">Romance</section>
                        <section class="item" id="gen3-opc3" onmousedown="selecionaItem(3, 3)">Terror</section>
                    </section>
                </section>
            </section>
            
            <input type="submit" value="Adicionar" class="botao-enviar">

            <p class="link">
                <a href="adm.php">Voltar</a>
            </p>
        </form>
    </section>

    <script>
        function idMax(){
            let inputNum = document.querySelector('#id_livro');
            let valueNum = inputNum.value;

            if (valueNum.length >= 20){
                    let valueMax = valueNum.substring(0, 19);
                    inputNum.value = valueMax;
                }

            
        }

        function previewImage(){
            let image = document.querySelector('#preview-file');
            image.src = URL.createObjectURL(event.target.files[0]);
        }


        {
            let opcoes = document.querySelectorAll('.dropDown');

        function mostrarOpcoes(n){
            opcoes[n].style.display = 'block';
        }

        function tirarOpcoes(n){
            opcoes[n].style.display = 'none';
        }

        function selecionaItem(n, num){
            let item = document.querySelector(`#gen${n}-opc${num}`);
            let input = document.querySelector(`#genero${n}`);
            input.value = item.innerText;
        }
    }
    </script>
</body>
</html>