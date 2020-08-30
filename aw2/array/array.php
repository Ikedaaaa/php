<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Matheus Ikeda - 1752545 - 413</h1>
    <h2>Tentei deixar bonito mas não consegui</h2>
    <div class="arrays">
        <div id="index" class="array">
            <h3>Array Indexado</h3>
            <div class="content">
                <?php
                    $index = array();
                    for($i = 0; $i < 10; $i++){ 
                        array_push($index, rand(1,100)); //gera números aleatórios para adicionar ao array
                    }
                    sort($index);   //ordena
                    for($i = 0; $i < count($index); $i++){
                        echo $index[$i]."<br>"; //imprime array ordenado
                    }
                ?>
            </div>
        </div>

        <div id="assoc" class="array">
            <h3>Array Associativo</h3>    
            <div class="content">
                <?php
                    $assoc = array();
                    for($i = 0; $i < 10; $i++){ //gera números aleatórios
                        $assoc += array($i => rand(1,100)); //adiciona cada número com uma chave ao array
                    }
                    asort($assoc);  //ordena o array associativo pelo valor, não pela chave
                    foreach($assoc as $chave => $valor){
                        echo "[$chave] = $valor<br>";       //imprime cada chave e valor do array
                    }
                ?>
            </div>
        </div>

        <div id="multi" class="array">
            <h3>Array Multidimensional</h3>
            <div class="content">
                <?php
                    $multi = array();
                    for($i = 0; $i < 10; $i++){
                        array_push($multi, array(   //cada vez que passa, vai adicionar um array ao array
                            $i, rand(1,100), rand(101, 500), rand(501, 999))    //gera 3 sequências de números aleatórios
                        );
                    }
                    for($i = 0; $i < count($multi); $i++){          //laço for nos itens do array
                        for($j = 0; $j < count($multi[$i]); $j++){  //laço for nor itens de cada item do array
                            echo $multi[$i][$j]." ";        //imprime o array multidimensional,
                        }
                        echo "<br>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>