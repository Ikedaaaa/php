<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste</title>
    </head>
    <body>
        <?php
            function soma(){
                $p = func_get_args();
                $s = 0;
                for($i = 0; $i < func_num_args(); $i++){
                    $s += $p[$i];
                }
                echo "Soma: $s<br>";
            }

            function ref(&$x){
                $x += 2;
                echo "<br><p> O valor de X é $x</p>";
            }
            
            soma(3,4);
            soma(3,5,6,7,2,4,9);
            soma(54,76,93);
            soma(12,45,67,34,56,89,34,12);
            soma(1,6,9,4);

            $a = 3;
            ref($a);
            echo "<p> O valor de A é $a</p>";
            //echo "$x + $y = $z";
        ?>

    </body>
</html>