<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <div class="resposta">
        <?php
            $space = $time = $form = $massa = $tempmax = $tempamb = $calor = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if($_POST["formtype"] === "Vm"){
                    $space = $_POST["space"];
                    $time = $_POST["time"];
                    $form = isset($_POST["form"])?$_POST["form"]:"";

                    if (($space == 12) && ($time == 6) && ($form == 1)){
                        echo "<p>Vm = ∆s / ∆t</p><br>";
                        echo "<p>Vm = $space metros / $time segundos</p><br>";
                        echo "<p>Vm = ".$space/$time." m/s</p>";
                        echo "<br><p><strong>Parabéns, você acertou<strong></p>";
                    } elseif ($form == 1){
                        echo "<p>Vm = ∆s / ∆t</p><br>";
                        echo "<p>Vm = $space metros / $time segundos</p><br>";
                        echo "<p>Vm = ".number_format($space/$time,2)." m/s</p>";
                        echo "<br><p><strong>Que pena, você errou<strong></p>";
                    } elseif ($form == 2){
                        echo "<p>∆s = Vm x ∆t</p><br>";
                        echo "<p>$space metros = Vm x $time segundos</p>";
                        echo "<br><p><strong>Que pena, você errou pois escolheu a fórmula errada<strong></p>";
                    } elseif ($form == 3){
                        echo "<p>∆t = ∆s / Vm</p><br>";
                        echo "<p>$time = $space / Vm</p>";
                        echo "<br><p><strong>Que pena, você errou pois escolheu a fórmula errada<strong></p>";
                    }
                    echo "<a href='formulario.html'>Retornar ao formulário</a>";
                } elseif ($_POST["formtype"] === "Q"){
                    $massa = $_POST["massa"];
                    $tempmax = $_POST["tempmax"];
                    $tempamb = $_POST["tempamb"];
                    $calor = $_POST["calor"];
                    $form = isset($_POST["form"])?$_POST["form"]:"";

                    if (($massa == 1) && ($tempmax == 1000) && ($tempamb == 20) && ($calor == "4.3" ) && ($form == 3)){
                        echo "<p>Q = m . c . Δθ</p><br>";
                        echo "<p>Q = $massa kg . $calor J/kg.°C . ($tempmax - $tempamb)</p><br>";
                        echo "<p>Q = ".$massa * $calor * ($tempmax - $tempamb)." J</p><br>";
                        echo "<p>Q ≅ ".number_format(($massa * $calor * ($tempmax - $tempamb))*0.239,2)." cal</p>";
                        echo "<br><p><strong>Parabéns, você acertou<strong></p>";
                    } elseif ($form == 3){
                        echo "<p>Q = m . c . Δθ</p><br>";
                        echo "<p>Q = $massa kg . $calor J/kg.°C . ($tempmax - $tempamb)</p><br>";
                        echo "<p>Q = ".$massa * $calor * ($tempmax - $tempamb)."</p><br>";
                        echo "<p>Q ≅ ".number_format(($massa * $calor * ($tempmax - $tempamb))*0.239,2)." cal</p>";
                        echo "<br><p><strong>Que pena, você errou<strong></p>";
                    } elseif ($form == 2){
                        echo "<p>Q = m . L</p><br>";
                        echo "<p>Q = $massa kg x L</p>";
                        echo "<br><p><strong>Que pena, você errou pois escolheu a fórmula errada<strong></p>";
                    } elseif ($form == 1){
                        echo "<p>C = Q / Δθ = m . c</p><br>";
                        echo "<p>C = Q / ($tempmax - $tempamb) = $massa . $calor</p>";
                        echo "<br><p><strong>Que pena, você errou pois escolheu a fórmula errada<strong></p>";
                    }
                    echo "<a href='formulario.html'>Retornar ao formulário</a>";
                }
            } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
                if($_GET["formtype"] === "demografia"){
                    $form = isset($_GET["form"])?$_GET["form"]:"";

                    echo "<p>Dizer que um local possui uma população total em elevado grau é o mesmo que dizer que esse local é populoso.

                    Locais onde os recursos existentes não são suficientes para atender a população ou estão mal distribuídos são locais superpovoados.
                    
                    Quantidade de habitante por m² é o mesmo que densidade demográfica.</p>";

                    if($form == 2){
                        echo "<br><p><strong>Você acertou! A alternativa \"b) populoso, superpovoado, densamente povoado\" é a alternativa correta.</strong></p>";
                    } else {
                        echo "<br><p>Que pena, você errou. Tente novamente</p>";
                    }
                    echo "<a href='formulario.html'>Retornar ao formulário</a>";
                } elseif($_GET["formtype"] === "imigracao"){
                    $form = isset($_GET["form"])?$_GET["form"]:"";

                    echo "<p>A chegada dos haitianos no Brasil no início da década atual ocorreu,
                    principalmente, pelas fronteiras brasileiras na região da floresta amazônica, sobretudo no estado do Acre.</p>";

                    if($form == 4){
                        echo "<br><p><strong>Você acertou! A alternativa \"d) em rotas de imigração na fronteira amazônica\" é a alternativa correta.</strong></p>";
                    } else {
                        echo "<br><p>Que pena, você errou. Tente novamente</p>";
                    }
                    echo "<a href='formulario.html'>Retornar ao formulário</a>";
                }
            }

        ?>
    </div>
</body>
</html>