<?php include 'database.php'; ?>
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
            <h2>Está Pronto ?</h2>
            <p>Perguntas sobre assusntos variados.</p>
            <ul>
                <li><strong>Quantidade de Questões:</strong> <?php echo $total; ?> </li>
                <li><strong>Apenas múltipla escolha.</strong></li>
            </ul>
            <a href="questoes.php?n=1" class="start">Iniciar</a>
            <a href="add.php" class="start">Adicionar Questões</a>
        </div>
    </main>

    
</body>
</html>

