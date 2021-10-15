<?php

$db_host = 'localhost';
$db_name = 'id17764885_bancoquiz';
$db_user = 'id17764885_nicholasfreire';
$db_pass = 'Aguiar$36563292';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


if($mysqli -> connect_error) {
    printf ("connect failet: %s/n", $mysqli->connect_error);
    exit();
}


?>