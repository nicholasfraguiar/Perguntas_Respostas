<?php include 'processo.php'?>
<?php

$query = "SELECT * FROM `questoes`";

    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Perguntas Aleatórias </title>
</head>
<body>
    <header>
        <div class="container">
            <h1>Perguntas e Respostas</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Parabéns por terminar o Quiz!!</h2>
            <p>Obrigado por testar esta aplicação!!</p>
            <p>Você acertou: <?php echo $_SESSION['score']; ?></p>
            <p> <?php echo ($_SESSION["score"]/$total * 100); ?> % das questões.</p>
            <a href="questoes.php?n=1" class="start">Tente Novamente</a>
        </div>
    </main>


    <?php?>
    
</body>
</html>

