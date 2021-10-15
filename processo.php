<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if ($_POST) {
    $number = $_POST['number'];
    $selecionar_alternativa = $_POST['alternativa'];
    $next = $number+1;


    $query = "SELECT * FROM `questoes`";

    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    $query = "SELECT * FROM `alternativas`
        WHERE numero_questao = $number AND a_correta = 1";

    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $row = $result->fetch_assoc();

    $alternativa_correta = $row['id'];

    if ($alternativa_correta == $selecionar_alternativa) {
        $_SESSION['score']++;
    }
    

    if ($number == $total) {
        header("Location: final.php");
        exit();
    } else {
        header("Location: questoes.php?n=".$next);
    }





}


?>