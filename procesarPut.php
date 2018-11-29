<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:35
 */

function procesar_put(){
    $request = obtener_request();
    echo "PUT";
    echo count($request);

    if ($request == null) {
        echo 'PUT: mala info';
    } else if (count($request) == 2) {
        if ($request[0] == 'LocalBusiness') {
            echo 'PUT: Informacion de los LocalBussines';
            echo 'con el id';
            echo $request[1];
        } else if ($request[0] == 'FoodEstablishment') {
            echo 'PUT: Informacion de los FoodEstablishment';
            echo 'con el id';
            echo $request[1];
        } else {
            echo 'GET: Mala info';
        }
    } else {
        echo "Error demasiados argumentos";
    }
}