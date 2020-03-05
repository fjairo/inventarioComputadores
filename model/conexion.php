<?php

class conexion
{
    public function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=bdinventario", "root", "");
        return $link;
    }
}
