<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste</title>
        <?php
        $txt = isset($_GET["t"]) ? $_GET["t"] : "Hello World";
        $tam = isset($_GET["tam"]) ? $_GET["tam"] : "12pt";
        $cor = isset($_GET["cor"]) ? $_GET["cor"] : "#000000";
        
        ?>
        <style>
            span.texto{
                font-size: <?php echo $tam;?>;
                color: <?php echo $cor;?>;
            }
        </style>
    </head>
    <body>
        <?php
            echo "<span class='texto'>$txt</span>";
        ?>
        <br>
        <a href="teste.html">Voltar</a>

    </body>
</html>