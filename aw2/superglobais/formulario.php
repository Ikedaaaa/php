<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobais</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <h1>Matheus Ikeda - 1752545 - 413</h1>
    <div class="formulario">
        <form class="form1">
            <h2>Selecione o método HTTP desejado para envio de dados:</h2>
            <input type="radio" name="metodo" id="get" value="get" checked>
            <label for="get">Método GET</label><br>
            <input type="radio" name="metodo" id="post" value="post">
            <label for="post">Método POST</label><br>
            <button type="button" onclick="metodohttp()">Confirmar</button>
            <!--Defini o método de envio de dados entre GET ou POST, já fazendo um dos dois tipos de requisição-->
        </form>
        <?php
            $metodo = '';
            $changemethod = 0;

            if(isset($_GET['changemethod'])){   //Apenas vem valor se clicar no botão de "Recarregar Página"
                $changemethod = $_GET['changemethod'];
            } elseif(isset($_POST['changemethod'])){
                $changemethod = $_POST['changemethod'];
            }

            if($changemethod){
                refresh();      //Se vier valor, recarrega a página para o segundo formulário sumir
            }

            if(isset($_GET['metodo'])){     //Recebe o método selecionado do primeiro formulário
                $metodo = $_GET['metodo'];
            } elseif(isset($_POST['metodo'])){
                $metodo = $_POST['metodo'];
            }

            if($metodo != ''){      //Monta o segundo formulário com base no método de envio escolhido
                if($metodo == 'get'){
                    echo "<form class=\"form1\" action=\"./superglobais.php\" method=\"get\">";
                } elseif ($metodo == 'post'){
                    echo "<form class=\"form1\" action=\"./superglobais.php\" method=\"post\">";
                }

                echo "<h2>Selecione as variáveis superglobais que devem ser exibidas:</h2>";

                echo "<input class=\"checkbox\" type=\"checkbox\" id=\"selectall\" onClick=\"toggle(this)\"> <label for=\"selectall\">Marcar/Desmarcar Todos</label> <br><br>";

                echo "<input class=\"checkbox\" type=\"checkbox\" name=\"globals\" id=\"globals\"> <label for=\"globals\">\$GLOBALS</label> <br>";

                echo "<input class=\"checkbox\" type=\"checkbox\" name=\"server\" id=\"server\"> <label for=\"server\">\$_SERVER</label> <br>";

                echo "<input class=\"checkbox\" type=\"checkbox\" name=\"request\" id=\"request\"> <label for=\"request\">\$_REQUEST</label> <br>";
            
                echo $metodo == 'get' ?
                "<input class=\"checkbox\" type=\"checkbox\" name=\"method\" id=\"get\"> <label for=\"get\">\$_GET</label> <br>" :
                "<input class=\"checkbox\" type=\"checkbox\" name=\"method\" id=\"post\"> <label for=\"post\">\$_POST</label> <br>";

                echo "<input class=\"checkbox\" type=\"checkbox\" name=\"files\" id=\"files\"> <label for=\"files\">\$_FILES</label> <br>";
                
                echo "<input class=\"checkbox\" type=\"checkbox\" name=\"env\" id=\"env\"> <label for=\"env\">\$_ENV</label> <br>";
                
                echo "<input class=\"checkbox\" type=\"checkbox\" name=\"cookie\" id=\"cookie\"> <label for=\"cookie\">\$_COOKIE</label> <br>";
                
                echo "<input class=\"checkbox\" type=\"checkbox\" name=\"session\" id=\"session\"> <label for=\"session\">\$_SESSION</label> <br>";

                echo "<input class=\"checkbox\" type=\"submit\" value=\"Exibir\">";

                echo "</form>";

                //Terceiro formulário que adiciona apenas um botão de recarregameno da página
                echo "<form class=\"form3\" action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"$metodo\">";
                echo "<input type=\"hidden\" name=\"changemethod\" value=\"1\">";
                echo "<input type=\"submit\" value=\"Recarregar página\">";
                echo "</form>";
                
            }

            function refresh(){ //Função de refresh da página
                header ('Location: '.$_SERVER["PHP_SELF"]);
                exit();
            }
        
        ?>
        
    </div>
    <script>
        //Função em javascript ativada ao clicar no botão do primeiro formulário;
        //É utilizada para que o primeiro formulário ao ser "submetido", já faça uma requisição
        //com o método escolhido, criando o segundo formulário
        function metodohttp(){
            const formulario = document.querySelector(".formulario");

            const metodo = document.getElementById('get').checked ? 'get' : 'post';
            
            const form = document.createElement('form');
            form.method = metodo;
            form.action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>";

            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = 'metodo';
            hiddenField.value = metodo;

            form.appendChild(hiddenField);

            formulario.appendChild(form);
            form.submit();
            formulario.removeChild(form);
            
        }

        //Função em javascript utilizada para ter a opção de selecionar "todos ao mesmo tempo"
        //dentre as checkboxes do segundo formulário
        function toggle(source) {
            checkboxes = document.getElementsByClassName('checkbox');
            for(var i=0; i < checkboxes.length ; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
</body>
</html>

<!--

        if(isset($_GET['metodo']) || isset($_POST['metodo'])){
            $isFormSubmitted -= -2 + (sqrt(pow(1,1024)));      //incrementa de 1 em 1
            
        } else{
            $isFormSubmitted = (pow(24,3) + sqrt(269) - (500 / 100) * (550%8) / (1*2))*0;   //define a variável como 0
        }


-->