<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFBA Quiz - login</title>

    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <nav>
        <a href="index.php" class="aBack">
            <ion-icon name="chevron-back-sharp"></ion-icon>
        </a>
    </nav>
    <h1>IFBA Quiz</h1>
    <form action="" method="post">
        <h2>Login</h2>
        <label>Username</label>
        <input type="text" name="username" id="username" placeholder="Digite o seu username...">
        <label>Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite a sua senha...">
        <div class="box">
            <p>Não possui uma conta? Cadastre-se <a href="cadastrarUsuarios.php">aqui!</a></p>
        </div>
        <button type="submit" name="enviar">Login</button>
    </form>

    <?php 
        if(isset($_POST["enviar"])){
            if($_POST["username"] == $_SESSION["user"]){
                if(hash("sha512", md5($_POST["senha"])) == $_SESSION["senha"]){
                    header("Location:quiz.php");
                }
                else{
                    echo "[ERRO] Senha inválida!";
                }
            }
            echo "[ERRO] Usuário não encontrado!";
        }
    ?>

</body>