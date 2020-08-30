<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste</title>
    </head>
    <body>
        <?php
            include "funcoes.php";
            /**
             * require: precisa do arquivo, para se não encontrar
             * include: se não encontar, vida q segue
             * include_once/require_once: Carrega apenas uma vez
             */
            echo "<h1>Testando novas funcoes</h1>";
            ola();
            mostraValor(4);
            
        ?>

    </body>
</html>