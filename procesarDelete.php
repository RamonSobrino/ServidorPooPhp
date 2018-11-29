<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:43
 */

function procesar_delete(){
    $request = obtener_request();
    if ($request == null) {
        echo 'DELETE: mala info';
    } else if (count($request) == 2) {
        if ($request[0] == 'LocalBusiness') {
            echo $request[1];
            $objetos = obtener_objetos();
            


        } else if ($request[0] == 'FoodEstablishment') {
            echo 'DELETE: Informacion de los FoodEstablishment';
            echo 'con el id';
            echo $request[1];
        } else {
            echo 'DELETE: Mala info';
        }
    } else {
        echo "DELETE: Error demasiados argumentos";
    }
}