<?php 
    declare (strict_types=1);

    class SuperHero{
        //funcion constructora que me permitirá "pasar" o construir en este caso el superheroe con los params en la invocacion (ver linea 16)
        public function __construct( //promoted properties --> PHP 8 || readonly para hacerlos de solo lectura
            readonly public string $name,
            readonly public array $powers,
            readonly public string $planet
        ){
        }

        public function description(){
            $powers = implode(", ",$this->powers); //convierte arrays en cadena de texto
            return "$this->name is a superhero who comes from $this->planet and has the following powers: $powers";
        }
    }

    $hero = new SuperHero("Batman", ["Strength", "Intelligence", "Technology"], "Earth");
    echo $hero->description();

?>