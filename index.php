<?php

require_once "consts.php";
require_once 'functions.php';

$data = get_api_content(API_URL); //guardamos el resultado de la funcion en $data
$until_message = get_until_message($data["days_until"]); //guardamos el resultado de get_until_message en funcion del valor days_until guardado en la API

?>

<?php render_template("head", $data);?>

<?php render_template("main", array_merge( //mergeo el array a data para acceder a until_message
    $data, ["until_message" => $until_message]
));?>

<?php render_template("styles");?>