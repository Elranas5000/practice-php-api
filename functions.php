<?php

declare(strict_types=1); //php declarará los tipos como estrictos, por lo que no hará conversiones (como de string a int). Esto funciona a nivel de archivo y arriba del todo 


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
