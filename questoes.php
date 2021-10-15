<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
$number = (int) $_GET['n'];


$query = "SELECT * FROM `questoes`";

$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;

$query = "SELECT * FROM `questoes` WHERE numero_questao = $number";

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$questao = $result->fetch_assoc();


$query = "SELECT * FROM `alternativas` WHERE numero_questao = $number";

$alternativas = $mysqli->query($query) or die($mysqli->error.__LINE__);
 
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
            <div class=atual> Questão <?php echo $questao['numero_questao']; ?> de <?php echo $total; ?></div>
            <p class=question>
                <?php echo $questao['texto'] ; ?>
            </p>
            <form method="post" action="processo.php">
                <ul class="alternativas">
                    <?php while($row = $alternativas->fetch_assoc()): ?>
                        <li><input name="alternativa" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['texto']; ?></li>
                    <?php endwhile; ?>

                </ul>
                <input type="submit" value="Próxima" />
                <input type='hidden' name='number' value="<?php echo $number; ?>"  />
                <input type="button" value='Voltar' onClick="history.go(-1)"  />
            </form>
        </div>
    </main>
    
</body>
</html>

<?php


?>