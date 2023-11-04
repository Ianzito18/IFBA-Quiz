<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFBA Quiz - Cadastrar-se</title>

    <link rel="stylesheet" href="../css/cadastrarUsuarios.css">
</head>
<body>
    <nav>
        <a href="index.php" class="aBack">
            <ion-icon name="chevron-back-sharp"></ion-icon>
        </a>
    </nav>

    <h1>IFBA Quiz</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Cadastrar-se</h2>

        <label>Username</label>
        <input type="text" name="username" id="username" placeholder="Digite o seu username...">

        <label>Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite a sua senha...">

        <label>Foto do perfil</label>
        <div class="box">
            <div class="pfpbox">
                <input class="arq" type="file" name="pfp" id="pfp">
                <?php 
                    if(glob("../img/*") == null){?>
                        <img class="perfil" src="../admin/placeholder/blank-profile-picture.png" alt="">
                    <?php }
                    else{?>
                        <img class="perfil" src="../img/<?php echo glob("../img/*")[0]?>" alt="">
                    <?php }?>

                    <?php 
                        if(isset($_POST["validarPfp"])){
                            if(glob("../img/*") != null){
                                $perfil = glob("../img/*")[0];
                                unlink($perfil);
                            }
                            $dir = "../img/";
                            $file = $_FILES["pfp"];

                            if(move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])){
                                header("Location:cadastrarUsuarios.php");
                            } else {
                                echo "<p>Não foi possível enviar o aquivo</p>";
                            }
                        }
                    ?>

            </div>
            <div class="buttonBox">
                <button class="validaFoto" name="validarPfp">Validar foto</button>
            </div>
        </div>
                

        <button type="submit" name="enviar">Cadastrar-se</button>
    
        <?php 
            if(isset($_POST["enviar"])){
                $_SESSION["user"] = $_POST["username"];
                $_SESSION["senha"] = hash("sha512", md5($_POST["senha"]));
                header("Location:index.php");
            }
        ?>
    </form>


    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>