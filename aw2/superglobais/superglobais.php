<?php
    $method  = $_GET ? (isset($_GET["method"]) ? 'get'  : '')  :
    ($_POST ? (isset($_POST["method"]) ? 'post' : '')  : '');

    $globals = $_GET ? isset($_GET["globals"]) : ($_POST ? isset($_POST["globals"]) : '');
    $request = $_GET ? isset($_GET["request"]) : ($_POST ? isset($_POST["request"]) : '');
    $session = $_GET ? isset($_GET["session"]) : ($_POST ? isset($_POST["session"]) : '');
    $cookie  = $_GET ? isset($_GET["cookie"])  : ($_POST ? isset($_POST["cookie"])  : '');
    $server  = $_GET ? isset($_GET["server"])  : ($_POST ? isset($_POST["server"])  : '');
    $files   = $_GET ? isset($_GET["files"])   : ($_POST ? isset($_POST["files"])   : '');
    $env     = $_GET ? isset($_GET["env"])     : ($_POST ? isset($_POST["env"])     : '');

    $superglobals = array();

    //Adiciona as variáveis superglobais ao array, de acordo com o que foi marcado na página anterior
    if($globals){
        $superglobals += array("\$GLOBALS" => $GLOBALS);
    }
    if($server){
        $superglobals += array("\$_SERVER" => $_SERVER);
    }
    if($request){
        $superglobals += array("\$_REQUEST" => $_REQUEST);
    }
    if($method == 'get'){
        $superglobals += array("\$_GET" => $_GET);
    } elseif ($method == 'post'){
        $superglobals += array("\$_POST" => $_POST);
    }
    if($files){
        $superglobals += array("\$_FILES" => $_FILES);
    }
    if($env){
        $superglobals += array("\$_ENV" => $_ENV);
    }
    if($cookie){
        setcookie("Bauduco", "Chocolate", time() + (86400 * 365), "/");
        $superglobals += array("\$_COOKIE" => $_COOKIE);
    }
    if($session){
        session_start();
        $_SESSION["sessaoteste"] = "Nsei-o-que-escrever";
        $superglobals += array("\$_SESSION" => $_SESSION);
    }

?>

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
    <div class="exibir">
        <?php

        //foreach para iterar entre o array associativo, com outros foreach dentro para o valores que também forem arrays associativos
        foreach($superglobals as $chave => $valor){
            echo "<h2 class=\"superglobais\">$chave</h2>";

            if(empty($valor)){
                echo "<p>[$chave] => Não há valor</p><br><br>";

            } elseif (is_array($valor)){

                foreach($valor as $key => $value){
                    echo "<h3>$chave > $key</h3>";

                    if(empty($value)){
                        echo "<p>[$key] => Não há valor</p><br><br>";

                    } elseif(is_array($value)){

                        foreach($value as $subkey => $subval){
                            echo "<h4>$chave > $key > $subkey</h4>";

                            if(empty($subval)){
                                echo "<p>[$subkey] => Não há valor</p><br><br>";

                            } elseif(is_array($subval)){
                                echo "<p>Possível chamada recursiva</p><br><br>";
                                echo "<p>[$subkey] => ".json_encode($subval)."</p><br><br>";
                            }else
                                echo "<p>[$subkey] => $subval</p><br><br>";

                        }
                    } else {
                        echo "<p>[$key] => $value</p><br><br>";
                    }
                }
            }else{
                echo "<p>[$chave] => $valor</p><br><br>";
            }
            echo "<br><br>";
        }
        if(empty($superglobals)){
            echo "<h2>Você não escolheu nenhuma superglobal</h2>";
        }

        ?>
        <a href="./formulario.php">Retornar ao Formulário</a>
    </div>
</body>
</html>