<?php

    function redirect(){
        header ('Location: ./cadastro.php');
        exit();
    }

    session_start();

    if(isset($_POST["endsession"])){
        session_unset();
        session_destroy();
        redirect();
    } elseif(isset($_POST["delete"])){
        $email = $_POST["delete"];
        unset($_SESSION[$email]);
    } elseif(isset($_POST["email"])){

        $nome  = $_POST["nome"];
        $idade = $_POST["idade"];
        $email = $_POST["email"];

        $_SESSION["$email"] = array("nome" => $nome, "idade" => $idade, "email" => $email);

    } else{
        redirect();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

    <div class="usuarios" id="usuarios">
    <h1>Matheus Ikeda - 1752545 - 413</h1>
        <?php
            $id = 0;
            $usr = '';
            echo "<table>";
            foreach($_SESSION as $key => $value){
                if(is_array($value)){
                    $id++;
                    $usr = 'usr' . $id;
                    echo "<tr class='usuario' id='$usr'>";
                    foreach($value as $chave => $valor){
                        echo "<td><p class='linha'>".ucfirst($chave).":</p> <p class='valor linha' name='$chave'>$valor</p></td>";
                    }
                    echo "<td><a href='#' onclick='createForm($usr)'>Alterar</a> <a href='#' onclick='deleteUser($usr)'>Deletar</a></td>";
                    echo "</tr>";
                }
                
            }
            echo "</table>";
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="endsession" value="1">
            <input type="submit" value="Finalizar Sessão">
        </form>

        <br>
        <a href="./cadastro.php">Voltar à página de cadastro</a>

    </div>
    <div id="form-popup"></div>
    <script src="./scripts/scripts.js"></script>

</body>
</html>

<!--
    echo "<div class='form-popup' id='$id'>
            <form action='/action_page.php' class='form-container'>
                <h1>Login</h1>
    
                <label for='email'><b>Email</b></label>
                <input type='text' placeholder='Enter Email' name='email'>
            
                <label for='psw'><b>Password</b></label>
                <input type='password' placeholder='Enter Password' name='psw'>
            
                <button type='submit' class='btn'>Login</button>
                <button type='button' class='btn cancel' onclick='closeForm($id)'>Close</button>
            </form>
        </div>";

-->
