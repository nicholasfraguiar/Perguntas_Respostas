<?php include 'database.php'; ?>
<?php 
    if (isset($_POST['submit'])) {
        $numero_questao = $_POST['numero_questao'];
        $texto = $_POST['texto'];
        $alternativa_correta = $_POST['a_correta'];


        $alternativas = array();
        $alternativas[1] = $_POST['alternativa1'];
        $alternativas[2] = $_POST['alternativa2'];
        $alternativas[3] = $_POST['alternativa3'];
        $alternativas[4] = $_POST['alternativa4'];
        $alternativas[5] = $_POST['alternativa5'];

        $query = "INSERT INTO `questoes` (numero_questao, texto) VALUES ('$numero_questao', '$texto')";

        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

        if ($insert_row) {
            foreach ($alternativas as $alternativa => $value) {
                if ($value != '') {
                    if ($alternativa_correta == $alternativa) {
                        $a_correta = 1;
                    } else {
                        $a_correta = 0;
                    }

                    $query = "INSERT INTO `alternativas` (numero_questao, a_correta, texto) VALUES ('$numero_questao', '$a_correta', '$value')";

                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    if ($insert_row) {
                        continue;
                    } else {
                        die ('ERROR: ('.$mysqli->error . ') '. $mysqli->error);
                    }
                }
            }

            $msg = 'Questão Adicionada';
        }
    }

    $query = "SELECT * FROM `questoes`";

    $questoes = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $questoes->num_rows;
    $next = $total+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Perguntas Aleatórias </title>
</head>
<body>
    <header>
        <div class="container">
            <h1> Perguntas e Respostas </h1>
        </div>
    </header>

    <main>
        <div class="container">
            <h2> Adicionar questões </h2>
            <?php
                if (isset($msg)) {
                    echo '<p>'.$msg.'</p>';
                }
            
            ?>
            <form method="post" action="add.php">
                <p>
                    <label> Número da Questão: </label>
                    <input type="number" value="<?php echo $next; ?>" name="numero_questao" />
                </p>
                <p>
                    <label> Texto da questão </label>
                    <input type="text" name="texto" />
                </p>


                <p>
                    <label> Alternativa 1: </label>
                    <input type="text" name="alternativa1" />
                </p>


                <p>
                    <label> Alternativa 2: </label>
                    <input type="text" name="alternativa2" />
                </p>


                <p>
                    <label> Alternativa 3: </label>
                    <input type="text" name="alternativa3" />
                </p>


                <p>
                    <label> Alternativa 4: </label>
                    <input type="text" name="alternativa4" />
                </p>


                <p>
                    <label> Alternativa 5: </label>
                    <input type="text" name="alternativa5" />
                </p>

                <p>
                    <label> Número da alternativa correta: </label>
                    <input type="number" name="a_correta" />
                </p>

                <p>
                    <input type="submit" name="submit" value="Submit" />
                </p>

                <a href="index.php" class="start">Voltar</a>


            </form>
        </div>
    
     </main>

    <?php?>
    
</body>
</html>

<?php


?>