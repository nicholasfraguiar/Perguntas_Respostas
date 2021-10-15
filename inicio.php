<?php include 'database.php'; ?>
<?php
$query = "SELECT * FROM `questoes`";

$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;

?>
