<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFBA Quiz - Cadastrar perguntas</title>

    <link rel="stylesheet" href="../css/cadastrarPerguntas.css">
</head>
<body>
    <nav>
        <a href="quiz.php" class="aBack">
            <ion-icon name="chevron-back-sharp"></ion-icon>
        </a>
        <a href="cadastrarUsuarios.php" class="usuario">
            <span><?php echo $_SESSION["user"]?></span>
            <?php 
                if(glob("../img/*") == null){?>
                    <img class="perfil" src="../img/placeholder/blank-profile-picture.png" alt="">
            <?php }
                else{?>
                    <img class="perfil" src="../img/<?php echo glob("../img/*")[0]?>" alt="">
            <?php }?>
        </a>
    </nav>
    <h1>Cadastrar Novas Perguntas</h1>
    <form action="" method="get">
        <div class="caixaPergunta">
            <h3>Pergunta</h3>
            <input type="text" name="pergunta" id="pergunta" placeholder="Digite aqui sua pergunta...">
        </div>
        <div class="caixaOpcoes">
            <h3>Opções</h3>
            <input type="text" name="opcao[]" id="opcao" placeholder="Digite aqui a opção 1...">
            <input type="text" name="opcao[]" id="opcao" placeholder="Digite aqui a opção 2...">
            <input type="text" name="opcao[]" id="opcao" placeholder="Digite aqui a opção 3...">
            <input type="text" name="opcao[]" id="opcao" placeholder="Digite aqui a opção 4...">

            <label for="correta">Qual a opção correta?</label>
            <select name="correta" id="correta">
                <option value="0">A</option>
                <option value="1">B</option>
                <option value="2">C</option>
                <option value="3">D</option>
            </select>
        </div>
        <button type="submit" name="enviar">Enviar pergunta</button>
    </form>

    <?php 
    
        if(isset($_GET["enviar"])){
            $_SESSION["perguntas"][] = $_GET["pergunta"];

            $_SESSION["alternativas"][] = $_GET["opcao"];  

            $_SESSION["corretas"][] = $_GET["correta"];
        }
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>