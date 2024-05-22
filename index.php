<?php

const API_URL = "https://dev.whenisthenextmcufilm.com/api";

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

//var_dump($data);


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
        <h3><?=$data["title"];?> days until release: <?=$data["days_until"]?></h3>
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