<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:36
 */

function procesar_post(){
    $request = obtener_request();
    if ($request == null) {
        echo 'POST: mala info';
    } else if (count($request) == 1) {
        if ($request[0] == 'LocalBusiness') {
            echo 'POST: Informacion de los LocalBussines';
        } else if ($request[0] == 'FoodEstablishment') {
            echo 'POST: Informacion de los FoodEstablishment';
        } else {
            echo 'POST: Mala info';
        }

    } else {
        echo "Error demasiados argumentos";
    }
}