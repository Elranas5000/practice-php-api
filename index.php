<?php

require_once "consts.php";
require_once 'functions.php';

$data = get_api_content(API_URL); //guardamos el resultado de la funcion en $data
$untilMessage = get_until_message($data["days_until"]); //guardamos el resultado de get_until_message en funcion del valor days_until guardado en la API

?>

<?php require "sections/head.php";?>
<?php require "sections/main.php";?>
<?php require "sections/styles.php";?>