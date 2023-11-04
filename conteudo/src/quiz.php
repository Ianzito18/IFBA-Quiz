<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFBA Quiz</title>

    <link rel="stylesheet" href="../css/quiz.css">
</head>
<body>
    <nav>
        <a href="index.php" class="aBack">
            <ion-icon name="chevron-back-sharp"></ion-icon>
        </a>
        <a href="cadastrarUsuarios.php" class="usuario">
            <span><?php echo $_SESSION["user"]?></span>
            <?php 
                if(glob("../img/*") == null){?>
                    <img class="perfil" src="../admin/placeholder/blank-profile-picture.png" alt="">
            <?php }
                else{?>
                    <img class="perfil" src="../img/<?php echo glob("../img/*")[0]?>" alt="">
            <?php }?>
        </a>
    </nav>
    <h1>IFBA Quiz</h1>


    <?php
        if(isset($_SESSION["perguntas"])){?>
        <h2>Cada resposta correta equivale a 10 pontos</h2>

        <?php
            if(isset($_POST["enviar"])){
                for($i = 0; $i < count($_SESSION["perguntas"]); $i++){
                    $userRespostas[] = $_POST["respostas$i"][0];
                }

                $certo = 0;
                $errado = 0;
                for($i = 0; $i < count($userRespostas); $i++){
                    if($userRespostas[$i] == $_SESSION["corretas"][$i]){
                        $certo++;
                    }
                }

                $score = $certo*10;?>

                <div class="resultados">
                    <h2 class="resTitulo">Resultados de <?php echo $_SESSION["user"]?></h2>
                    <div class="resInfo">
                        <span>Aproveitamento: <?php echo "$certo/".count($userRespostas)." (".$certo/count($userRespostas)*100 ."%)"?></span>
                        <span>Pontuação final: <?php echo "$score pontos"?></span>
                    </div>
                </div>    
        <?php }?>

        <form action="" method="post">
            <div class="quiz"><?php
            for($j = 0; $j < count($_SESSION["perguntas"]); $j++){
                ?>
                <div class="questao"><?php
                echo "<div class='enunciado'><h3>".$_SESSION["perguntas"][$j]."</h3></div>";
                
                for($i = 0; $i < 4; $i++){?>
                    <div class="alternativas">
                        <input type="radio" id="resposta<?php echo $i.$j?>" name="respostas<?php echo $j?>[]" id="" value="<?php echo $i?>" required>
                        <label for="resposta<?php echo $i.$j?>"><?php echo $_SESSION["alternativas"][$j][$i]?></label>
                        <?php echo "<br>"?>
                    </div>
                <?php }
                ?></div><?php
            }?>
            </div>
            <button type="submit" name="enviar" class="botao">Verificar respostas</button>
        </form>
        
        <?php }
        else{?>
            <h3 class="cadastro">Não possui nenhuma pergunta? Cadastre as suas proprias perguntas <a href="cadastrarPerguntas.php">aqui</a></h3><?php
        }
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>