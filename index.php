<?php

declare(strict_types=1); //php declarará los tipos como estrictos, por lo que no hará conversiones (como de string a int). Esto funciona a nivel de archivo y arriba del todo 
const API_URL = "https://dev.whenisthenextmcufilm.com/api";

#funcion que se encarga de llamar a la api. Usando ch se pueden hacer cualquier tipo de peticiones
function get_api_content(){ 
    
    #incio de sesión de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    
    #indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    #ejecutar la peticion
    $result = curl_exec($ch);
    $data = json_decode($result, true);
    curl_close($ch);
    return $data;
}

/*
    opcion alternativa por si SOLO necesitas hacer un GET:
    $result = file_get_contents(API_URL);
    $data = json_decode($result, true);
*/

function get_until_message(int $days) : string{
    return match(true){
        $days === 0 => "Premiere today!",
        $days === 1 => "Premiere tomorrow!",
        $days < 7   => "Premiere this week!",
        $days < 30  => "Premiere this month!",
        default     => "$days days until release.",
    };
}

$data = get_api_content(API_URL); //guardamos el resultado de la funcion en $data
$untilMessage = get_until_message($data["days_until"]); //guardamos el resultado de get_until_message en funcion del valor days_until guardado en la API

?>

<head>
    <meta charset="UTF-8"/>
    <title>Next Marvel movie</title>
    <meta name="desc" content="Next Marvel movie"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Fluid viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.fluid.classless.min.css"
/>
</head>

<main>
    <section>
        <img src="<?=$data["poster_url"];?>" width="300" alt="movie image" style="border-radius: 16px">
    </section>

    <hgroup>
        <h3><?=$data["title"];?> - <?=$untilMessage?></h3>
        <p>Release date: <?=$data["release_date"]?></p>
        <link>Next movie is: <?=$data["following_production"]["title"]?></link>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: auto;
    }
</style>